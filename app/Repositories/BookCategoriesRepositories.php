<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\bookCategories;

class BookCategoriesRepositories extends Repository
{
    public function model()
    {
     return bookCategories::class;   // TODO: Implement model() method.
    }

}
