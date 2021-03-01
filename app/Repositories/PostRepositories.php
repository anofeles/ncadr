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
}
