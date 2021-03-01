<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    protected $table = 'post_translations';
    public $timestamps = false;
    protected $fillable = [
        'locale',
        'author',
        'title',
        'desc',
        'text',
        'img',
        'file',
    ];
}
