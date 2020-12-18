<?php


namespace App\Click\Repositories\Eloquent;


use App\Click\Models\BadDomain;
use App\Click\Repositories\BadDomainRepositoryInterface;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\DB;

class BadDomainRepository extends AbstractEloquentRepository implements BadDomainRepositoryInterface
{
    protected $model = BadDomain::class;

    public function getModel() : string
    {
        return $this->model;
    }

    public function findByName(string $name) : iterable
    {
        return BadDomain::where('name', $name)
            ->orWhereRaw("? LIKE CONCAT('%.', name)", [$name])
            ->get();
    }
}
