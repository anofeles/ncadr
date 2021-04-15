<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\Subscribe;

class SubscribeRepositories extends Repository
{
    public function model()
    {
        return Subscribe::class;// TODO: Implement model() method.
    }

}
