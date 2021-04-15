<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\languages;

class LanguagesRepositories extends Repository
{
    public function model()
    {
     return languages::class;   // TODO: Implement model() method.
    }

}
