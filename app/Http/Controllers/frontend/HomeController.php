<?php


namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepositories;
use App\Repositories\LocaleRepositories;
use App\Repositories\MenuRepositories;
use App\Repositories\GaleryRepositories;
use App\Repositories\MediaRepositories;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;


class HomeController extends Controller
{

    protected $PostRepositories, $LocaleRepositories, $MenuRepositories, $GaleryRepositories, $MediaRepositories;

    public function __construct(
        PostRepositories $PostRepositories,
        LocaleRepositories $LocaleRepositories,
        MenuRepositories $MenuRepositories,
        GaleryRepositories $GaleryRepositories,
        MediaRepositories $MediaRepositories
    )
    {
        $this->PostRepositories = $PostRepositories;
        $this->LocaleRepositories = $LocaleRepositories;
        $this->MenuRepositories = $MenuRepositories;
        $this->GaleryRepositories = $GaleryRepositories;
        $this->MediaRepositories = $MediaRepositories;
        view()->share('local',$this->LocaleRepositories->all());
        view()->share('dam_seting',$this->MenuRepositories->menu_dam()->get());
        view()->share('menu',$this->MenuRepositories->whereNull('menu_dam_id')->get());
        view()->share('menuDam',$this->MenuRepositories->where('menu_dam_id','!=',null)->get());
    }
    public function index($locale = 'ka'){
        App::setLocale($locale);
        return view('front.page.home');
    }

    public function post($locale='ka',$type='home',$mid=0,$slug=''){
        App::setLocale($locale);
        $str = mb_strtolower($type);
        $menu = $this->MenuRepositories->findOrFail($mid);
        if($menu->menu_dam_id != null){
          view()->share('dam_menu',$this->MenuRepositories->where('menu_dam_id','=',$mid)->get());
        }
        if($str != 'galeri')
        {
            $post = $this->PostRepositories->menu_to_any()->wherePivot('menu_uuid',$menu->uuid)->paginate(10);
        }else{
            $post = $this->GaleryRepositories->menu_to_any()->wherePivot('menu_uuid',$menu->uuid)->paginate(10);
        }
        return view('front.page.'.$str.'',compact('post'));
    }

    public function full($locale='ka',$postid=0){
        App::setLocale($locale);
        $post = $this->PostRepositories->findOrFail($postid);
        return view('front.page.full_them',compact('post'));
    }

    public function galfull($locale='ka',$postid=0){
        App::setLocale($locale);
        $galeri = $this->GaleryRepositories->findOrFail($postid);
        $media = $this->GaleryRepositories->galeri_to_any()->wherePivot('row_uuid',$galeri->uuid)->paginate(10);
        foreach ($media as $mediaitem){
            $galmedia[] = $this->MediaRepositories
                ->where('uuid','=',$mediaitem->pivot->media_uuid)
                ->where('locale','=',$locale)
                ->first();
        }

         return view('front.page.fill_galeri',compact('galmedia'));
    }

}
