<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\MenuToAny;

class MenuToAnyRepositories extends Repository
{
    public function model()
    {
        return MenuToAny::class;// TODO: Implement model() method.
    }
}
