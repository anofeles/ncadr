<?php


namespace App\Repositories;


use App\Http\Core\Database\Repository;
use App\Models\Media;

class MediaRepositories extends Repository
{
    public function model()
    {
        return Media::class;// TODO: Implement model() method.
    }
}
