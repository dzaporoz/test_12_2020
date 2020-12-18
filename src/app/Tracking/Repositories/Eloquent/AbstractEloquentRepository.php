<?php


namespace App\Tracking\Repositories\Eloquent;


use App\Tracking\Exceptions\ModelNotFoundException;
use App\Tracking\Repositories\RepositoryInterface;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Query\Builder;

abstract class AbstractEloquentRepository implements RepositoryInterface
{
    abstract public function getModel() : string;

    protected $selectedRows = 0;

    public function getSelectAllRowsCount() : int
    {
        return $this->selectedRows;
    }

    public function all(int $limit, int $offset, string $sort_by = null, string $order = null, array $filters = []) : iterable {
        /** @var Builder $query */
        $query = $this->getModel()::query()
            ->when(! empty($filters), function ($q) use ($filters) {
                foreach ($filters as $column => $value) {
                    $q->where($column, 'like', "%$value%");
                }
                return $q;
            });

        $this->selectedRows = $query->count();

        $query->limit($limit)
            ->offset($offset)
            ->when($sort_by && $order, function ($q) use ($sort_by, $order) {
                return $q->orderBy($sort_by, $order);
            });

        return $query->get();
    }

    public function find($id) : Jsonable {
        $model = $this->getModel()::findOrFail($id);

        return $model;
    }

    public function create(array $data) : Jsonable {
        return $this->getModel()::create($data);
    }

    public function update($id, array $data) : Jsonable {
        $model = $this->getModel()::findOrFail($id);

        $model->update($data);

        return $model;
    }

    public function delete($id) {
        $model = $this->getModel()::findOrFail($id);

        $model->delete();
    }

}
