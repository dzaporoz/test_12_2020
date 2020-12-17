<?php


namespace App\Click\Repositories\Eloquent;


use App\Click\Models\BadDomain;
use App\Click\Repositories\BadDomainRepositoryInterface;

class BadDomainRepository extends AbstractEloquentRepository implements BadDomainRepositoryInterface
{
    protected $model = BadDomain::class;

    public function getModel() : string
    {
        return $this->model;
    }
}
