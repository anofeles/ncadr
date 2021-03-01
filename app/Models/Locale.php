<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $table = 'locale';
    protected $fillable = [
        'uuid',
        'title',
        'url'
    ];

}
