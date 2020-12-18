<?php


namespace App\Tracking;


use App\Tracking\Models\Click;
use Illuminate\Contracts\Support\Jsonable;

interface TrackingServiceInterface
{
    public function TrackClick(array $data) : array;
}
