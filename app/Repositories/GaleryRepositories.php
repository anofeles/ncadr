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

    public function galeri_to_any(){
        $foo = new Galery();
        return $foo->galeri_to_any();
    }

    public function menu_to_any(){
        $foo = new Galery();
        return $foo->menu_to_any();
    }
}
