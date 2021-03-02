<?php


namespace App\Http\Controllers\admin\kodex;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

use App\Repositories\PostRepositories;
use App\Repositories\LocaleRepositories;
use App\Repositories\MenuRepositories;
use App\Repositories\MenuToAnyRepositories;

class KodexController extends Controller
{
    protected $PostRepositories, $LocaleRepositories, $MenuRepositories, $MenuToAnyRepositories;

    public function __construct(
        PostRepositories $PostRepositories,
        LocaleRepositories $LocaleRepositories,
        MenuRepositories $MenuRepositories,
        MenuToAnyRepositories $MenuToAnyRepositories
    )
    {
        $this->PostRepositories = $PostRepositories;
        $this->MenuRepositories = $MenuRepositories;
        $this->LocaleRepositories = $LocaleRepositories;
        $this->MenuToAnyRepositories = $MenuToAnyRepositories;
        $this->middleware('auth');
        view()->share('local',$this->LocaleRepositories->all());
    }


    public function postindex($locale = 'ka')
    {
        App::setLocale($locale);
            $post = $this->PostRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('type','=','CODEX')->get();
        return view('admin.page.kodex', compact('post', 'locale'));
    }

    public function addpost($locale = 'ka', Request $request)
    {
        App::setLocale($locale);
            $aboutMenu = $this->MenuRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('active','=', 1)->where('type','=','CODEX')->get();
        if ($request->method() == 'POST') {
            $validData = $request->validate([
                'title' => 'required|max:255',
                'sort' => 'required|numeric',
                'text' => 'required',

            ],
                [
                    'title.required' => 'გთხოვთ შეავსოთ',
                    'title.max' => 'მაქსიმალური სირძე 255',
                    'sort.required' => 'გთხოვთ შეავსოთ',
                    'text.required' => 'გთხოვთ შეავსოთ',
                    'sort.numeric' => 'შეიყვანეთ ციფრები',

                ]);

            $menuuuid = $this->MenuRepositories->findOrFail($request->menu_id);

            $data = [
                'uuid' => Uuid::uuid6(),
                'type' => 'CODEX',
                'active' => $request->active == 'on' ? 1 : 0,
                'mtav' => $request->mtav == 'on' ? 1 : 0,
                'sort' => $validData['sort'],
                $locale => [
                    'title' => $validData['title'],
                    'text' => str_replace('../../../source','/public/js/source',$validData['text']),
                ]
            ];
            $add_menu = $this->PostRepositories->create($data);
            $menutoany = [
                'menu_uuid'=>$menuuuid->uuid,
                'row_uuid'=>$add_menu->uuid
            ];
            $this->MenuToAnyRepositories->create($menutoany);
        }

        return view('admin.page.kodex.add', compact('aboutMenu', 'locale'));
    }

    public function editpost($postid = 0, $locale = 'ka', Request $request)
    {
        App::setLocale($locale);
            $aboutMenu = $this->MenuRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('active', 1)->where('type','=','CODEX')->get();
        $postEdit = $this->PostRepositories->findOrFail($postid);

        $menutoany = $this->MenuToAnyRepositories->where('row_uuid','=',$postEdit->uuid)->first();
        $menuedit = $this->MenuRepositories->where('uuid','=',isset($menutoany->menu_uuid) ? $menutoany->menu_uuid : null)->first();
        if ($request->method() == 'POST') {
            $validData = $request->validate([
                'title' => 'required|max:255',
                'sort' => 'required|numeric',
                'text' => 'required',
            ],
                [
                    'title.required' => 'გთხოვთ შეავსოთ',
                    'title.max' => 'მაქსიმალური სირძე 255',
                    'sort.required' => 'გთხოვთ შეავსოთ',
                    'text.required' => 'გთხოვთ შეავსოთ',
                    'sort.numeric' => 'შეიყვანეთ ციფრები',
                ]);

            $menuuuid = $this->MenuRepositories->findOrFail($request->menu_id);
            $data = [
                'type' => 'CODEX',
                'active' => $request->active == 'on' ? 1 : 0,
                'mtav' => $request->mtav == 'on' ? 1 : 0,
                'sort' => $validData['sort'],
                $locale => [
                    'title' => $validData['title'],
                    'text' => str_replace('../../../../source','/public/js/source',$validData['text']),
                ]
            ];
            $add_menu = $this->PostRepositories->updateOrCreate($postid > 0 ? ['id' => $postid] : ['id' => null],$data);
            $this->MenuToAnyRepositories->where('row_uuid','=',$add_menu->uuid)->delete();
            $menutoany = [
                'menu_uuid'=>$menuuuid->uuid,
                'row_uuid'=>$add_menu->uuid
            ];

            $this->MenuToAnyRepositories->updateOrCreate(isset($menutoany->id) && $menutoany->id > 0 ? ['id' => $menutoany->id] : ['id' => null],$menutoany);
            return back();
        }
        return view('admin.page.kodex.edit', compact('aboutMenu', 'locale','postEdit','menuedit'));
    }

    public function deletepost($postid = 0, $locale = 'ka')
    {
        $delete_postid = $this->PostRepositories->findOrFail($postid);
        $this->MenuToAnyRepositories->where('row_uuid','=',$delete_postid->uuid)->delete();
        $delete_post = $this->PostRepositories->where('id','=',$delete_postid->id)->delete();
        if($delete_post){
            return redirect(route('admin.kodex',['locale'=>$locale]));
        }
    }

}
