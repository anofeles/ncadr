<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class bookSubcategories extends Model
{
    protected $table = 'book_subcategories';
    protected $fillable = [
      'bookSubCatIdPrimary',
      'bookSubCatNameGeo',
      'bookSubCatNameEng',
      'bookSubCatNameGer',
      'bookSubCatNameRus',
      'code',
      'bookCatId',
      'creationDate',
    ];
    public $timestamps = false;
}
