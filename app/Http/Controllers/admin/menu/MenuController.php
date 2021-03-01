<?php


namespace App\Http\Controllers\admin\menu;


use App\Http\Controllers\Controller;
use App\Repositories\LocaleRepositories;
use App\Repositories\MenuRepositories;
use App\Repositories\MenuToAnyRepositories;
use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $LocaleRepositories, $MenuRepositories, $MenuToAnyRepositories;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        LocaleRepositories $LocaleRepositories,
        MenuRepositories $MenuRepositories,
        MenuToAnyRepositories $MenuToAnyRepositories
    )
    {
        $this->LocaleRepositories = $LocaleRepositories;
        $this->MenuRepositories = $MenuRepositories;
        $this->MenuToAnyRepositories = $MenuToAnyRepositories;
        $this->middleware('auth');
        view()->share('local',$this->LocaleRepositories->all());
    }

    public function menuindex($locale = 'ka')
    {
        App::setLocale($locale);
            $menu = $this->MenuRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->get();
        return view('admin.page.menu', compact('menu', 'locale'));
    }

    public function addmenu($locale = 'ka', Request $request)
    {
        App::setLocale($locale);
        $aboutMenu = $this->MenuRepositories->where('type','!=','NEWS')->whereHas('translations', function ($query) use ($locale) {
            $query
                ->where('locale', $locale);
        })->where('active', 1)->get();
        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'sort' => 'required|numeric',
                'slug' => 'required|max:255',
            ],
                [
                    'title.required' => 'გთხოვთ შეავსოთ',
                    'title.max' => 'მაქსიმალური სირძე 255',
                    'slug.required' => 'გთხოვთ შეავსოთ',
                    'slug.max' => 'მაქსიმალური სირძე 255',
                    'sort.required' => 'გთხოვთ შეავსოთ',
                    'sort.numeric' => 'შეიყვანეთ ციფრები',
                ]);
            $data = [
                'uuid' => Uuid::uuid6(),
                'type' => $request->type,
                'active' => $request->active == 'on' ? 1 : 0,
                'menu_dam_id' => $request->menu_id > 0 ? $request->menu_id : null ,
                'sort' => $validatedData['sort'],
                $locale => [
                    'title' => $validatedData['title'],
                    'slug' => str_replace(' ', '-', $validatedData['slug']),
                ]
            ];

            $add_menu = $this->MenuRepositories->create($data);
        }
        return view('admin.page.menu.add', compact('aboutMenu', 'locale'));
    }

    public function editmenu($postid = 0, $locale = 'ka', Request $request)
    {
        App::setLocale($locale);
        $aboutMenu = $this->MenuRepositories->where('type','!=','NEWS')->whereHas('translations', function ($query) use ($locale) {
            $query
                ->where('locale', $locale);
        })->where('active', 1)->get();
        if (intval($postid) > 0) {
            $menuedit = $this->MenuRepositories->findOrFail($postid);
            if ($request->method() == 'POST') {
                $validatedData = $request->validate([
                    'title' => 'required|max:255',
                    'sort' => 'required|numeric',
                    'slug' => 'required|max:255',
                ],
                    [
                        'title.required' => 'გთხოვთ შეავსოთ',
                        'title.max' => 'მაქსიმალური სირძე 255',
                        'slug.required' => 'გთხოვთ შეავსოთ',
                        'slug.max' => 'მაქსიმალური სირძე 255',
                        'sort.required' => 'გთხოვთ შეავსოთ',
                        'sort.numeric' => 'შეიყვანეთ ციფრები',
                    ]);
                $data = [
                    'type' => $request->type,
                    'active' => $request->active == 'on' ? 1 : 0,
                    'arqive' => 0,
                    'sort' => $validatedData['sort'],
                    'menu_id' => $request->menu_id > 0 ? $request->menu_id : null ,
                    $locale => [
                        'title' => $validatedData['title'],
                        'slug' => str_replace(' ', '-', $validatedData['slug']),
                    ]
                ];
                $edit_menu = $this->MenuRepositories->updateOrCreate($postid > 0 ? ['id' => $postid] : ['id' => null],$data);
                if(isset($edit_menu->id)){
                    return redirect(route('admin.menu',['locale'=>$locale]));
                }
            }
            return view('admin.page.menu.edit', compact('postid', 'locale', 'menuedit', 'aboutMenu'));
        } else {
            return view('admin.page.menu.add', compact('aboutMenu', 'locale'));
        }

    }

    public function deletemenu($postid = 0, $locale = 'ka'){
        $delete_menuid = $this->MenuRepositories->findOrFail($postid);
        $this->MenuToAnyRepositories->where('menu_uuid','=',$delete_menuid->uuid)->delete();
//        dd($delete_menuid->id);
        $delete_menu = $this->MenuRepositories->where('id','=',$delete_menuid->id)->delete();;
        if($delete_menu){
            return redirect(route('admin.menu',['locale'=>$locale]));
        }
    }

}
