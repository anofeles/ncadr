<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\MediaToAny;

class MediaToAnyRepositories extends Repository
{
    public function model()
    {
        return MediaToAny::class;// TODO: Implement model() method.
    }
}
