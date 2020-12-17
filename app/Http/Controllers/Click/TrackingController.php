<?php

namespace App\Http\Controllers\Click;

use App\Click\ClickServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

    /** @var ClickServiceInterface */
    protected $service;

    public function __construct(ClickServiceInterface $s)
    {
        $this->service = $s;
    }

    public function track(Request $request)
    {
        return view('tracking.admin');
        $clickParams = [
            'ip'    => $this->getVisitorIp() ?: $request->ip(),
            'ua'    => $request->userAgent(),
            'ref'   => $request->headers->get('referer'),
            'param1'=> $request->input('param1'),
            'param2'=> $request->input('param2')
        ];

        return $this->service->TrackClick($clickParams);
    }

    protected function getVisitorIp() : ?string {
        foreach (self::IP_SOURCES as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip);
                    if (filter_var(
                        $ip,
                        FILTER_VALIDATE_IP,
                        FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
                        ) !== false){
                        return $ip;
                    }
                }
            }
        }

        return null;
    }
}
