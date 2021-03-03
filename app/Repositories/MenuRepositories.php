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

    public function menu_to_any(){
        $foo = new Menu();
        return $foo->menu_to_any();
    }

    public function menu_dam(){
        $foo = new Menu();
        return $foo->menu_dam();
    }
}
