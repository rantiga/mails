<?php


namespace App\Repositories;

use App\Models\Action as Model;

class ActionsRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAction($id)
    {
        return $this->startConditions()->find($id);
    }
}
