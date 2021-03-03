<?php


namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepositories;
use App\Repositories\LocaleRepositories;
use App\Repositories\MenuRepositories;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;


class HomeController extends Controller
{

    protected $PostRepositories, $LocaleRepositories;

    public function __construct(
        PostRepositories $PostRepositories,
        LocaleRepositories $LocaleRepositories,
        MenuRepositories $MenuRepositories
    )
    {
        $this->PostRepositories = $PostRepositories;
        $this->LocaleRepositories = $LocaleRepositories;
        $this->MenuRepositories = $MenuRepositories;
        view()->share('local',$this->LocaleRepositories->all());
        view()->share('dam_seting',$this->MenuRepositories->menu_dam()->get());
        view()->share('menu',$this->MenuRepositories->whereNull('menu_dam_id')->get());
        view()->share('menuDam',$this->MenuRepositories->where('menu_dam_id','!=',null)->get());
    }
    public function index($locale = 'ka'){
        App::setLocale($locale);
        return view('front.page.home');
    }

    public function new(){

        return view('front.page.new');
    }

    public function them(){

        return view('front.page.them');
    }

    public function kodex(){

        return view('front.page.kodex');
    }

    public function fullthem(){

        return view('front.page.full_them');
    }
}
