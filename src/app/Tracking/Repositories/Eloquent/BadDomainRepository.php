<?php


namespace App\Tracking\Repositories\Eloquent;


use App\Tracking\Models\BadDomain;
use App\Tracking\Repositories\BadDomainRepositoryInterface;
use Illuminate\Support\Collection;

class BadDomainRepository extends AbstractEloquentRepository implements BadDomainRepositoryInterface
{
    protected $model = BadDomain::class;

    public function getModel() : string
    {
        return $this->model;
    }

    public function findBySubdomain(string $name) : Collection
    {
        return BadDomain::where('name', $name)
            ->orWhereRaw("? LIKE CONCAT('%.', name)", [$name])
            ->get();
    }
}
