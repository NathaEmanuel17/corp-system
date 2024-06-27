<?php

namespace App\Repositories;

class BaseRepository
{
    protected function __construct(protected object $obj)
    {
        $this->obj = $obj;
    }

    public function all(array $withRelations = []): object
    {
        if (!empty($withRelations)) {
            return $this->obj->with($withRelations)->get();
        }

        return $this->obj->all();
    }

    public function find(int $id, array $withRelations = [], bool $withTrashed = false): ?object
    {
        $query = $withTrashed ? $this->obj->withTrashed() : $this->obj;

        if (!empty($withRelations)) {
            $query = $query->with($withRelations);
        }

        return $query->find($id);
    }
    
    public function findByColumn(string $column, $value): object
    {
        return $this->obj->where($column, $value)->get();
    }

    public function paginate(int $perPage, array $filters = [], array $withRelations = [], bool $withTrashed = false): object
    {
        $query = $this->obj;

        if (!empty($withRelations)) {
            $query = $query->with($withRelations);
        }

        foreach ($filters as $field => $value) {
            if ($field === 'blocked_at') {
                if ($value === 'true') {
                    $query = $query->whereNotNull('blocked_at');
                } elseif ($value === 'false') {
                    $query = $query->whereNull('blocked_at');
                }
            } else {
                $query = $query->where($field, 'LIKE', "%$value%");
            }
        }

        if ($withTrashed) {
            $query = $query->withTrashed();
        }

        return $query->paginate($perPage);
    }
    
    public function store(array $attributes): object
    {
        return $this->obj->create($attributes);
    }

    public function update(int $id, array $attributes)
    {
        return $this->obj->find($id)->update($attributes);
    }

    public function delete(int $id): bool
    {
        return $this->obj->find($id)->delete();
    }
}
