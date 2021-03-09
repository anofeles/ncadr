<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class GaleryTranslation extends Model
{
    protected $table = 'galery_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'img','locale'];
}
