<?php


namespace App\Click\Repositories\Eloquent;


use App\Click\Exceptions\ModelNotFoundException;
use App\Click\Repositories\RepositoryInterface;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Query\Builder;

abstract class AbstractEloquentRepository implements RepositoryInterface
{
    abstract public function getModel() : string;

    public function all(int $limit, int $offset, string $sort_by = "", string $order = "desc", array $filters = []) : iterable {
        /** @var Builder $query */
        $query = $this->getModel()::query();

        $query->limit($limit)
            ->offset($offset)
            ->when($sort_by && $order, function ($q) use ($sort_by, $order) {
                return $q->orderBy($sort_by, $order);
            })
            ->when(! empty($filters), function ($q) use ($filters) {
                foreach ($filters as $filter) {
                    $q->where($filter['field'], 'like', "%${filter['value']}%");
                }
                return $q;
            });

        return $query->get();
    }

    public function find(int $id) : Jsonable {
        $model = $this->getModel()::find($id);

        if (! $model) {
            throw new ModelNotFoundException();
        }

        return $model;
    }

    public function create(array $data) : Jsonable {
        return $this->getModel()::create($data);
    }

    public function update(int $id, array $data) : Jsonable {
        $model = $this->getModel()::find($id);

        if (! $model) {
            throw new ModelNotFoundException();
        }

        $model->update($data);

        return $model;
    }

    public function delete(int $id) {
        $model = $this->getModel()::find($id);

        if (! $model) {
            throw (new ModelNotFoundException())->setModel($this->getModel());
        }

        $model->delete();
    }

}
