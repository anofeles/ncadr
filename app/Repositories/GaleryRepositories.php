<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\Galery;

class GaleryRepositories extends Repository
{
    public function model()
    {
        return Galery::class;// TODO: Implement model() method.
    }

}
