<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\PostTranslation;

class PostTranslationsRepositories extends Repository
{
    public function model()
    {
        return PostTranslation::class;// TODO: Implement model() method.
    }
}
