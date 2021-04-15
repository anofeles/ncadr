<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class languages extends Model
{
    protected $table = 'languages';
    protected $fillable = [
        'langIdPrimary',
        'langName'
    ];
    public $timestamps = false;
}
