<?php


namespace App\Click\Repositories\Eloquent;


use App\Click\Models\Click;
use App\Click\Repositories\ClickRepositoryInterface;

class ClickRepository extends AbstractEloquentRepository implements ClickRepositoryInterface
{
    protected $model = Click::class;

    public function getModel() : string
    {
        return $this->model;
    }
}
