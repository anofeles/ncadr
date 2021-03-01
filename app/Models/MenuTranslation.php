<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    protected $table = 'menu_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'slug'];
}
