<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\books;

class BooksRepositories extends Repository
{
    public function model()
    {
     return books::class;   // TODO: Implement model() method.
    }

}
