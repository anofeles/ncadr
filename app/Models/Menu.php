<?php


namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use DB;
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

    public function menu_to_any(){
        return $this->belongsToMany(Menu::class,'menu_to_any','deleted_at','menu_uuid','uuid','uuid')
            ->withPivot('row_uuid','menu_uuid');

    }

    public function menu_dam(){
        return DB::table('menu AS m')
            ->join('menu AS s', 'm.id', '=', 's.menu_dam_id')
            ->select('m.id')
            ->groupBy('m.id');

    }
}
