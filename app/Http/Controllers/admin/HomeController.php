<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\Repositories\LocaleRepositories;
use App\Repositories\PostRepositories;

class HomeController extends Controller
{
    protected $LocaleRepositories, $PostRepositories;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        LocaleRepositories $LocaleRepositories,
        PostRepositories $PostRepositories
    )
    {
        $this->LocaleRepositories = $LocaleRepositories;
        $this->PostRepositories = $PostRepositories;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale = 'ka')
    {
        App::setLocale($locale);
        $local = $this->LocaleRepositories->all();
        $post = $this->PostRepositories->whereHas('translations', function ($query) use ($locale) {
            $query->where('locale', $locale);
        })->limit(3)->get();
        return view('admin.home',compact('locale','local','post'));
    }
}
