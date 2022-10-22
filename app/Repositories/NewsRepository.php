<?php

namespace App\Repositories;

use App\Models\News as Model;


class NewsRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllPublished()
    {
        $columns = [
            'id',
            'category_id',
            'title',
            'is_published',
            'published_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['category:id,name'])
            ->whereNotnull('published_at')
            ->get();

        return $result;
    }

    public function getAll()
    {
        $columns = [
            'id',
            'category_id',
            'title',
            'is_published',
            'published_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['category:id,name'])
            ->get();

        return $result;
    }


    public function getNewsItem($id)
    {
        return $this->startConditions()->find($id);
    }
}
