<?php

namespace App\Http\Controllers\Click;

use App\Click\ClickServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    /** @var ClickServiceInterface */
    protected $service;

    public function __construct(ClickServiceInterface $s)
    {
        $this->service = $s;
    }

    public function index(Request $request)
    {
    }
}
