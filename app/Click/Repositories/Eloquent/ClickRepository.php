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

    public function findByField(string $field, string $value) {

    }

    public function create(array $data) : Click {
        return Click::create($data);
    }

    public function update(int $id, array $data) : Click {
        $model = Click::findOrFail($id);
        $model->update($data);
    }

    public function delete(int $id) {
        $model = Click::find($id);
        $model->delete();
    }
}
