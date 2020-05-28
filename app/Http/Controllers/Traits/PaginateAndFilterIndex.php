<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait PaginateAndFilterIndex
{
    public function list(Request $request, $model)
    {   
        $model = new $model;

        $limit = $request->all()['limit'] ?? 20;

        $order = $request->all()['order'] ?? null;
        if ($order !== null) {
            $order = explode(',', $order);
        }
        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'asc';

        $where = $request->all()['where'] ?? [];

        $like = $request->all()['like'] ?? null;
        if ($like) {
            $like = explode(',', $like);
            $like[1] = '%' . $like[1] . '%';
        }

        $result = $model->orderBy($order[0], $order[1])
            ->where(function ($query) use ($like) {
                if ($like) {
                    return $query->where($like[0], 'like', $like[1]);
                }
                return $query;
            })
            ->where($where)
            ->with($this->relationships())
            ->paginate($limit);

        return $result;
    }

    public function relationShips()
    {

        if (isset($this->relationShip)) {
            return $this->relationShip;
        }

        return [];
    }
}
