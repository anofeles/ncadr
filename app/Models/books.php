<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'bookIdPrimary',
        'title',
        'author',
        'pub_year',
        'publication',
        'pub_place',
        'pub_company',
        'isbn_issn',
        'pages',
        'quantity',
        'location',
        'add_info',
        'language',
        'category',
        'subCategory',
        'price',
        'creationDate',
        'registrator'
    ];
    public $timestamps = false;
}
