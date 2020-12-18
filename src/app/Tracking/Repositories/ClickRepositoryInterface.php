<?php


namespace App\Tracking\Repositories;


use Illuminate\Database\Eloquent\Model;

interface ClickRepositoryInterface extends RepositoryInterface
{
    public function searchForDuplicate(?string $ip, ?string $ua, ?string $ref, ?string $param1): ?Model;

    public function save($click);
}
