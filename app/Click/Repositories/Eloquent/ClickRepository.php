<?php


namespace App\Click\Repositories\Eloquent;


use App\Click\Exceptions\EntryAlreadyExistsException;
use App\Click\Models\Click;
use App\Click\Repositories\ClickRepositoryInterface;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\QueryException;

class ClickRepository extends AbstractEloquentRepository implements ClickRepositoryInterface
{
    protected $model = Click::class;

    public function getModel() : string
    {
        return $this->model;
    }

    public function create(array $data) : Jsonable {
        return $this->getModel()::create($data);
    }

    public function searchForDuplicate(?string $ip, ?string $ua, ?string $ref) : ?Jsonable {
        return $this->getModel()::where('ip', $ip)
            ->where('ua', $ua)
            ->where('ref', $ref)
            ->first();
    }

    public function save($click)
    {
        $click->save();
    }
}
