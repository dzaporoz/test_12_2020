<?php


namespace App\Tracking\Repositories;


use Illuminate\Contracts\Support\Jsonable;

interface ClickRepositoryInterface extends RepositoryInterface
{
    public function searchForDuplicate(?string $ip, ?string $ua, ?string $ref, ?string $param1) : ?Jsonable;

    public function save($click);
}
