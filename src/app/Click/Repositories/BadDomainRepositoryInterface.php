<?php


namespace App\Click\Repositories;


use Illuminate\Contracts\Support\Jsonable;

interface BadDomainRepositoryInterface extends RepositoryInterface
{
    public function findByName(string $name) : iterable;
}
