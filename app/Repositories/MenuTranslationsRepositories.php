<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\MenuTranslation;

class MenuTranslationsRepositories extends Repository
{
    public function model()
    {
        return MenuTranslation::class;// TODO: Implement model() method.
    }
}
