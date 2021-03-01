<?php


namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title', 'slug'];
    protected $table = 'menu';
    protected $fillable = [
        'uuid',
        'type',
        'active',
        'sort',
        'menu_dam_id'
    ];
}
