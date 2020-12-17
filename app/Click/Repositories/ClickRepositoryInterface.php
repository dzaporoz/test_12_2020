<?php


namespace App\Click\Repositories;


use Illuminate\Contracts\Support\Jsonable;

interface ClickRepositoryInterface extends RepositoryInterface
{
    public function searchForDuplicate(?string $ip, ?string $ua, ?string $ref) : ?Jsonable;

    public function save($click);
}
