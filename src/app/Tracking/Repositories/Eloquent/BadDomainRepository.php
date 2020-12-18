<?php


namespace App\Tracking\Repositories\Eloquent;


use App\Tracking\Models\BadDomain;
use App\Tracking\Repositories\BadDomainRepositoryInterface;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\DB;

class BadDomainRepository extends AbstractEloquentRepository implements BadDomainRepositoryInterface
{
    protected $model = BadDomain::class;

    public function getModel() : string
    {
        return $this->model;
    }

    public function findBySubdomain(string $name) : iterable
    {
        return BadDomain::where('name', $name)
            ->orWhereRaw("? LIKE CONCAT('%.', name)", [$name])
            ->get();
    }
}
