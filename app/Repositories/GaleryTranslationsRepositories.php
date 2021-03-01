<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\GaleryTranslation;

class GaleryTranslationsRepositories extends Repository
{
    public function model()
    {
        return GaleryTranslation::class;// TODO: Implement model() method.
    }

}
