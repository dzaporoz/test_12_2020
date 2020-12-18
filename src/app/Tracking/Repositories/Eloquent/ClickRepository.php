<?php


namespace App\Tracking\Repositories\Eloquent;


use App\Tracking\Models\Click;
use App\Tracking\Repositories\ClickRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ClickRepository extends AbstractEloquentRepository implements ClickRepositoryInterface
{
    protected $model = Click::class;

    public function getModel() : string
    {
        return $this->model;
    }

    public function create(array $data) : Model {
        $model = $this->getModel()::make($data);
        $model->id = Uuid::uuid4();
        $model->save();

        return $model;
    }

    public function searchForDuplicate(?string $ip, ?string $ua, ?string $ref, ?string $param1) : ?Model {
        return $this->getModel()::where('ip', $ip)
            ->where('ua', $ua)
            ->where('ref', $ref)
            ->where('param1', $param1)
            ->first();
    }

    public function save($click)
    {
        $click->save();
    }
}
