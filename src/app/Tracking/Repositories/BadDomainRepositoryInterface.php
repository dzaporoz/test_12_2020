<?php


namespace App\Tracking\Repositories;


use Illuminate\Contracts\Support\Jsonable;

interface BadDomainRepositoryInterface extends RepositoryInterface
{
    public function findBySubdomain(string $name) : iterable;
}
