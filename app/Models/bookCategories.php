<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class bookCategories extends Model
{
    protected $table = 'book_categories';
    protected $fillable = [
        'bookCatIdPrimary',
        'bookCatNameGeo',
        'bookCatNameEng',
        'bookCatNameGer',
        'bookCatNameRus',
        'code',
        'creationDate'
    ];
    public $timestamps = false;
}
