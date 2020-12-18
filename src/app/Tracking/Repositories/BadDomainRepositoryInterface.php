<?php


namespace App\Tracking\Repositories;


use Illuminate\Support\Collection;

interface BadDomainRepositoryInterface extends RepositoryInterface
{
    /**
     * Returns a collection of bad domains for given subdomain name
     * @param string $name
     * @return Collection
     */
    public function findBySubdomain(string $name): Collection;
}
