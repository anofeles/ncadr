<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\bookSubcategories;

class BookSubcategoriesRepositories extends Repository
{
    public function model()
    {
    return bookSubcategories::class;    // TODO: Implement model() method.
    }


}
