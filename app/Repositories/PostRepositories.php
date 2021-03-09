<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\Post;

class PostRepositories extends Repository
{
    public function model()
    {
        return Post::class;// TODO: Implement model() method.
    }

    public function menu_to_any(){
        $foo = new Post();
        return $foo->menu_to_any();
    }
}
