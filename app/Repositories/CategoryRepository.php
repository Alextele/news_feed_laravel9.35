<?php

namespace App\Repositories;

use App\Models\NewsCategory as Model;


class CategoryRepository extends CoreRepository {

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getForCombobox(){
        $result = $this ->startConditions()
                        ->select('id','name')
                        ->toBase()
                        ->get();
        return $result;
    }

}
