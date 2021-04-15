<?php


namespace App\Http\Controllers\admin\biblioteka\trite;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

trait Lamguage
{
    public function lamguageIndex($locale='ka'){
        App::setLocale($locale);
        $language = $this->LanguagesRepositories->all();
        return view('admin.page.biblioteka.languages.index',compact('language','locale'));
    }
    public function addlamguage($locale='ka'){
        App::setLocale($locale);
    }
    public function editlamguage(Request $request,$postid=0,$locale='ka'){
        App::setLocale($locale);
    }
    public function deletelamguage($postid=0,$locale='ka'){

    }
}
