<?php


namespace App\Repositories;

use App\Models\User as Model;

class UsersRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getOnceAuthorizedUsersId()
    {
        $result = $this->startConditions()
            ->select()
            ->whereIn('id', function ($query){
                $query->select(['user_id'])
                    ->from('login_source')
                    ->groupBy(['user_id']);
            })
            ->get();

        return $result;
    }

    public function getMoreTwoAuthorizedUsersId()
    {
        $result = $this->startConditions()
            ->select()
            ->where(function ($query){
                $query->select()
                    ->from('login_source')
                    ->where('user_id', '=', 2)
                    ->count();
            }, '>', '2')
            ->get();

        return $result;
    }

    public function getNotAugustActionUsersId()
    {
        $result = $this->startConditions()
            ->select()
            ->whereIn('id', function ($query){
                $query->select(['user_id'])
                ->from('login_source')
                ->where('tms', '>=', '2020-02-01 00:00:00')
                ->where('tms', '<=', '2020-02-29 00:00:00');
            })
            ->whereIn('id', function ($query){
                $query->select(['user_id'])
                    ->from('login_source')
                    ->where('tms', '>=', '2019-08-28 00:00:00')
                    ->where('tms', '<=', '2019-09-05 00:00:00');
            })
            ->get();

        return $result;
    }
}
