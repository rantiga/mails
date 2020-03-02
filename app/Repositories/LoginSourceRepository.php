<?php


namespace App\Repositories;

use App\Models\LoginSource as Model;

class LoginSourceRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getOnceAuthorizedUsersId()
    {
        $result = $this->startConditions()
            ->select('user_id')
            ->groupBy('user_id')
            ->get();

        return $result;
    }

    public function getLastMonthAuthorizedUsersId()
    {
        $result = $this->startConditions()
            ->select()
            ->where('tms', '>=', '2020-02-20 00:00:00')
            ->where('tms', '<=', '2020-02-29 00:00:00')
            ->get();

        return $result;
    }
}
