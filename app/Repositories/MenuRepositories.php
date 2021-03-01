<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\Menu;

class MenuRepositories extends Repository
{
    public function model()
    {
        return Menu::class;// TODO: Implement model() method.
    }
}
