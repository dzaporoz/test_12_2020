<?php

namespace App\Http\Controllers\Click;

use App\Click\ClickServiceInterface;
use App\Click\Repositories\BadDomainRepositoryInterface;
use App\Click\Repositories\ClickRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
