<?php


namespace App\Repositories;



use App\Http\Core\Database\Repository;
use App\Models\Locale;

class LocaleRepositories extends Repository
{
    public function model()
    {
        return Locale::class;// TODO: Implement model() method.
    }
}
