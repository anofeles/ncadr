<?php


namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\frontend\traits\searchlibrari;
use App\Mail\OrderShipped;
use App\Repositories\PostRepositories;
use App\Repositories\LocaleRepositories;
use App\Repositories\MenuRepositories;
use App\Repositories\GaleryRepositories;
use App\Repositories\MediaRepositories;
use App\Repositories\MenuToAnyRepositories;
use App\Repositories\SubscribeRepositories;
use App\Repositories\MediaToAnyRepositories;
use App\Repositories\BooksRepositories;
use App\Repositories\LanguagesRepositories;
use App\Repositories\BookCategoriesRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;


class HomeController extends Controller
{
    use searchlibrari;

    protected $PostRepositories, $LocaleRepositories, $MenuRepositories, $GaleryRepositories, $MediaRepositories,
        $MenuToAnyRepositories, $SubscribeRepositories, $MediaToAnyRepositories, $BooksRepositories,
        $LanguagesRepositories, $BookCategoriesRepositories;

    public function __construct(
        PostRepositories $PostRepositories,
        LocaleRepositories $LocaleRepositories,
        MenuRepositories $MenuRepositories,
        GaleryRepositories $GaleryRepositories,
        MediaRepositories $MediaRepositories,
        MenuToAnyRepositories $MenuToAnyRepositories,
        SubscribeRepositories $SubscribeRepositories,
        MediaToAnyRepositories $MediaToAnyRepositories,
        BooksRepositories $BooksRepositories,
        LanguagesRepositories $LanguagesRepositories,
        BookCategoriesRepositories $BookCategoriesRepositories
    )
    {
        $this->PostRepositories = $PostRepositories;
        $this->LocaleRepositories = $LocaleRepositories;
        $this->MenuRepositories = $MenuRepositories;
        $this->GaleryRepositories = $GaleryRepositories;
        $this->MediaRepositories = $MediaRepositories;
        $this->MenuToAnyRepositories = $MenuToAnyRepositories;
        $this->SubscribeRepositories = $SubscribeRepositories;
        $this->MediaToAnyRepositories = $MediaToAnyRepositories;
        $this->LanguagesRepositories = $LanguagesRepositories;
        $this->BookCategoriesRepositories = $BookCategoriesRepositories;
        $this->BooksRepositories = $BooksRepositories;
        view()->share('local', $this->LocaleRepositories->all());
        view()->share('dam_seting', $this->MenuRepositories->menu_dam()->get());
        view()->share('menu', $this->MenuRepositories->whereNull('menu_dam_id')->orderby('sort')->get());
        view()->share('menuDam', $this->MenuRepositories->where('menu_dam_id', '!=', null)->get());
    }

    public function index($locale = 'ka')
    {
        App::setLocale($locale);

        $post = $this->PostRepositories
            ->where('mtav', '=', 1)
            ->where('active', '=', 1)
            ->where('type', '=', 'POST')
            ->orderBy('sort', 'desc')
            ->first();
        $news = $this->PostRepositories
            ->where('mtav', '=', 1)
            ->where('active', '=', 1)
            ->where('type', '=', 'NEWS')
            ->orderBy('sort', 'desc')
            ->limit(3)
            ->get();
        $blog = $this->PostRepositories
            ->where('mtav', '=', 1)
            ->where('active', '=', 1)
            ->where('type', '=', 'BLOG')
            ->orderBy('sort', 'desc')
            ->first();
        return view('front.page.home', compact('post', 'news', 'locale', 'blog'));
    }

    public function post($locale = 'ka', $type = 'home', $mid = 0, $slug = '')
    {
        App::setLocale($locale);
        $str = mb_strtolower($type);
        if ($str == 'librari') {
            return redirect(route('home.searchlibrari', ['locale' => $locale]));
        }
        $menu = $this->MenuRepositories->findOrFail($mid);
        view()->share('navigacia', $this->navigacia($mid));
        if ($menu->menu_dam_id != null) {
            $d2avmenu = $this->MenuRepositories->where('id', '=', $mid)->first();
            $d1avmenu = $this->MenuRepositories->where('id', '=', $d2avmenu->menu_dam_id)->first();
            if ($d1avmenu->menu_dam_id == null) {
                view()->share('dam_menu', $this->MenuRepositories->where('menu_dam_id', '=', $mid)->get());
            } else {
                view()->share('dam_menu', $this->MenuRepositories->where('menu_dam_id', '=', $d1avmenu->id)->get());
            }

        }
        if ($str != 'galeri') {
            $post = $this->PostRepositories->startCounditions()
                ->menu_to_any()
                ->wherePivot('menu_uuid', $menu->uuid)
                ->where('active', '=', 1)
                ->orderby('sort', 'DESC')
                ->paginate(9);
        } else {
            $post = $this->GaleryRepositories->menu_to_any()
                ->wherePivot('menu_uuid', $menu->uuid)
                ->where('active', '=', 1)
                ->orderby('sort', 'ASC')
                ->paginate(9);
        }
//        dd($post);
        return view('front.page.' . $str . '', compact('post', 'locale'));
    }

    public function full($locale = 'ka', $postid = 0)
    {

        App::setLocale($locale);
        $post = $this->PostRepositories->where('active', '=', 1)->where('id', '=', $postid)->first();
        if (isset($post->uuid)) {
            $menutoany = $this->MenuToAnyRepositories->where('row_uuid', '=', $post->uuid)->first();

            $mid = $this->MenuRepositories->where('uuid', '=', $menutoany->menu_uuid)->first();
            view()->share('navigacia', $this->navigacia($mid->id));
            return view('front.page.full_them', compact('post', 'locale'));
        }
        return redirect(route('home'));
    }

    public function galfull($locale = 'ka', $postid = 0)
    {
        App::setLocale($locale);
        $galeri = $this->GaleryRepositories->findOrFail($postid);
        $menutoany = $this->MenuToAnyRepositories->where('row_uuid', '=', $galeri->uuid)->first();
//        dd($menutoany->media_uuid);
        $mid = $this->MenuRepositories->where('uuid', '=', $menutoany->menu_uuid)->first();
//        dd($mid);
        view()->share('navigacia', $this->navigacia($mid->id));
        $media = $this->GaleryRepositories->galeri_to_any()->wherePivot('row_uuid', $galeri->uuid)->paginate(10);
        foreach ($media as $mediaitem) {
            $galmedia[] = $this->MediaRepositories
                ->where('uuid', '=', $mediaitem->pivot->media_uuid)
                ->where('locale', '=', $locale)
                ->first();
        }
        return view('front.page.fill_galeri', compact('galmedia', 'locale'));
    }

    public function search(Request $request)
    {
        App::setLocale($request->input('locale'));
        $search = $request->input('search');
        $locale = $request->input('locale');
        $search = $this->PostRepositories->whereHas('translations', function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%');
            $q->orWhere('desc', 'like', '%' . $search . '%');
            $q->orWhere('text', 'like', '%' . $search . '%');
            $q->orWhere('author', 'like', '%' . $search . '%');
        })->where('active', '=', 1)->get();

        return view('front.page.search', compact('search', 'locale'));
    }

    public function navigacia($id)
    {
//        dd($id);
        $menu[] = $this->MenuRepositories->findOrFail($id);
        if ($menu[0]->menu_dam_id != null) {
            $menu[] = $this->navigacia($menu[0]->menu_dam_id);
        }
        return $menu;
    }

    public function subscribe(Request $request)
    {
        $validData = $request->validate([
            'subscribe' => 'email|required|unique:subscribe,email|max:255',
        ]);
        $data = [
            'email' => $validData['subscribe'],
            'active' => 1,
            'uuid' => Uuid::uuid6()
        ];

        $this->SubscribeRepositories->create($data);
        return back();
    }

    public function removesubscriber($uuid)
    {
        $data = [
            'active' => 0
        ];
        $this->SubscribeRepositories->updateOrCreate(['uuid' => $uuid], $data);
        return redirect(route('home'));
    }

    public function contaqtncadr(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'email|required|max:255',
            'text' => 'required|max:255',
        ]);
        $data = [
            'name' => $validData['name'],
            'email' => $validData['email'],
            'text' => $validData['text']
        ];
        Mail::to('kaxam1@gmail.com')->send(new OrderShipped($data));
        return back();
    }

}
