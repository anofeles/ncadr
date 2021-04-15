<?php


namespace App\Models;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = [
        'author',
        'enploi',
        'title',
        'desc',
        'text',
        'img',
        'file',
        'locale'
    ];
    protected $table = 'post';
    protected $fillable = [
        'uuid',
        'type',
        'active',
        'mtav',
        'sort'
    ];

    public function menu_to_any(){
        return $this->belongsToMany(Post::class,'menu_to_any','deleted_at','row_uuid','uuid','uuid')
            ->withPivot('row_uuid','menu_uuid');

    }
}
