<?php


namespace App\Tracking\Repositories;


interface BadDomainRepositoryInterface extends RepositoryInterface
{
    public function findBySubdomain(string $name): iterable;
}
