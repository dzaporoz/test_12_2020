<?php


namespace App\Tracking;


interface TrackingServiceInterface
{
    public function TrackClick(array $data): array;
}
