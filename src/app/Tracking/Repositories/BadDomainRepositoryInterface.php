<?php


namespace App\Tracking\Repositories;


use Illuminate\Support\Collection;

interface BadDomainRepositoryInterface extends RepositoryInterface
{
    public function findBySubdomain(string $name): Collection;
}
