<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MediaToAny extends Model
{
    protected $table = 'media_to_any';
    protected $fillable = [
        'media_uuid',
        'row_uuid',
        'type'
    ];

}
