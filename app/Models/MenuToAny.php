<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuToAny extends Model
{
    protected $table = 'menu_to_any';
    protected $fillable = [
        'menu_uuid',
        'row_uuid'
    ];
}
