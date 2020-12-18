<?php

namespace App\Http\Controllers\Tracking;

use App\Tracking\TrackingServiceInterface;
use App\Tracking\Repositories\ClickRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    const IP_SOURCES = [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
    ];

    /** @var TrackingServiceInterface */
    protected $service;

    /** @var ClickRepositoryInterface */
    protected $repository;

    public function __construct(TrackingServiceInterface $s, ClickRepositoryInterface $r)
    {
        $this->service = $s;
        $this->repository = $r;
    }

    public function error($id)
    {
        $data = [
            'click' => $this->repository->find($id)
        ];
        return view('tracking.show-click', $data);
    }

    public function success($id)
    {
        $data = [
            'click' => $this->repository->find($id)
        ];
        return view('tracking.show-click', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function track(Request $request): RedirectResponse
    {
        $clickParams = [
            'ip' => $this->getVisitorIp($request) ?: $request->ip(),
            'ua' => $request->userAgent(),
            'ref' => $request->server('HTTP_REFERER'),
            'param1' => $request->input('param1'),
            'param2' => $request->input('param2')
        ];

        $result = $this->service->TrackClick($clickParams);

        if (!empty($result['redirect'])) {
            $request->session()->flash('redirect', $result['redirect']);
        }

        if (!empty($result['error'])) {
            $request->session()->flash('error', $result['error']);
            return redirect()->route('click.error', ['id' => $result['id']]);
        } else {
            return redirect()->route('click.success', ['id' => $result['id']]);
        }
    }

    protected function getVisitorIp(Request $request): ?string
    {
        foreach (self::IP_SOURCES as $key) {
            $ips = $request->server($key);
            if ($ips !== null) {
                foreach (explode(',', $ips) as $ip) {
                    $ip = trim($ip);
                    if (filter_var(
                            $ip,
                            FILTER_VALIDATE_IP,
                            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
                        ) !== false) {
                        return $ip;
                    }
                }
            }
        }

        return null;
    }
}
