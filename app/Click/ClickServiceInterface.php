<?php


namespace App\Click;


use App\Click\Models\Click;
use Illuminate\Contracts\Support\Jsonable;

interface ClickServiceInterface
{
    public function TrackClick(array $data) : String;
}
