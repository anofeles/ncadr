<?php


namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title', 'img','locale'];
    protected $table = 'galery';
    protected $fillable = [
        'uuid',
        'type',
        'active',
        'sort'
    ];

    public function galeri_to_any(){
        return $this->belongsToMany(Galery::class,'media_to_any','deleted_at','row_uuid','uuid','uuid')
            ->withPivot('row_uuid','media_uuid');

    }

    public function menu_to_any(){
        return $this->belongsToMany(Galery::class,'menu_to_any','deleted_at','row_uuid','uuid','uuid')
            ->withPivot('row_uuid','menu_uuid');

    }
}
