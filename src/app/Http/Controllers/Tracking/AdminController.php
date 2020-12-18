<?php

namespace App\Http\Controllers\Tracking;

use App\Tracking\Repositories\BadDomainRepositoryInterface;
use App\Tracking\Repositories\ClickRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /** @var ClickRepositoryInterface */
    protected $clickRepository;

    /** @var BadDomainRepositoryInterface */
    protected $badDomainsRepository;

    public function __construct(ClickRepositoryInterface $cr, BadDomainRepositoryInterface $br)
    {
        $this->clickRepository = $cr;
        $this->badDomainsRepository = $br;
    }

    public function index(Request $request)
    {
        $data = [
            'clicks' => $this->clickRepository->all(51, 0),
            'domains'=> $this->badDomainsRepository->all(51, 0),
        ];

        return view('tracking.admin', $data);
    }
}
