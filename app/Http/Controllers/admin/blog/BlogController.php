<?php


namespace App\Http\Controllers\admin\blog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

use App\Repositories\PostRepositories;
use App\Repositories\LocaleRepositories;
use App\Repositories\MenuRepositories;
use App\Repositories\MenuToAnyRepositories;


class BlogController extends Controller
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
            })->where('type','=','BLOG')->get();
        return view('admin.page.blog', compact('post', 'locale'));
    }

    public function addpost($locale = 'ka', Request $request)
    {
        App::setLocale($locale);
            $aboutMenu = $this->MenuRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('active','=', 1)->where('type','=','BLOG')->get();

        if ($request->method() == 'POST') {
            $validData = $request->validate([
                'title' => 'required|max:255',
                'sort' => 'required|numeric',
                'text' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5012',
                'file' => 'max:5012'
            ],
                [
                    'title.required' => 'გთხოვთ შეავსოთ',
                    'title.max' => 'მაქსიმალური სირძე 255',
                    'sort.required' => 'გთხოვთ შეავსოთ',
                    'text.required' => 'გთხოვთ შეავსოთ',
                    'sort.numeric' => 'შეიყვანეთ ციფრები',
                    'img.image' => 'ატვირთეთ (jpeg,png,jpg,gif,svg)',
                    'img.max' => '5მბ მქსიმალური ზომა',
                    'file.max' => '5მბ მქსიმალური ზომა',
                ]);

            if(isset($validData['img']) && !empty($validData['img'])) {
                $imageName = $validData['img']->getClientOriginalName()/*.'.'.$validData['img']->extension()*/;
                $validData['img']->move(public_path('images/post'), $imageName);
            }
            if(isset($validData['file']) && !empty($validData['file'])) {
                $fileName = $validData['file']->getClientOriginalName()/*.'.'.$validData['file']->extension()*/;
                $validData['file']->move(public_path('images/file'), $fileName);
            }
            $menuuuid = $this->MenuRepositories->findOrFail($request->menu_id);

            $data = [
                'uuid' => Uuid::uuid6(),
                'type' => 'BLOG',
                'active' => $request->active == 'on' ? 1 : 0,
                'mtav' => $request->mtav == 'on' ? 1 : 0,
                'sort' => $validData['sort'],
                $locale => [
                    'title' => $validData['title'],
                    'author' => isset($request->author) && !empty($request->author) ? $request->author : null,
                    'text' => str_replace('../../../source','/public/js/source',$validData['text']),
                    'desc' => isset($request->desc) && !empty($request->desc) ? str_replace('../../../source','/public/js/source',$request->desc) : null,
                    'img' => isset($imageName) && !empty($imageName) ? $imageName : null,
                    'file' => isset($fileName) && !empty($fileName) ? $fileName : null,
                ]
            ];
            $add_menu = $this->PostRepositories->create($data);
            $menutoany = [
                'menu_uuid'=>$menuuuid->uuid,
                'row_uuid'=>$add_menu->uuid
            ];
            $this->MenuToAnyRepositories->create($menutoany);
        }

        return view('admin.page.blog.add', compact('aboutMenu', 'locale'));
    }

    public function editpost($postid = 0, $locale = 'ka', Request $request)
    {
        App::setLocale($locale);
            $aboutMenu = $this->MenuRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('active', 1)->where('type','=','BLOG')->get();
        $postEdit = $this->PostRepositories->findOrFail($postid);

        $menutoany = $this->MenuToAnyRepositories->where('row_uuid','=',$postEdit->uuid)->first();
        $menuedit = $this->MenuRepositories->where('uuid','=',isset($menutoany->menu_uuid) ? $menutoany->menu_uuid : null)->first();
        if ($request->method() == 'POST') {
            $validData = $request->validate([
                'title' => 'required|max:255',
                'sort' => 'required|numeric',
                'text' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5012',
                'file' => 'max:5012'
            ],
                [
                    'title.required' => 'გთხოვთ შეავსოთ',
                    'title.max' => 'მაქსიმალური სირძე 255',
                    'sort.required' => 'გთხოვთ შეავსოთ',
                    'text.required' => 'გთხოვთ შეავსოთ',
                    'sort.numeric' => 'შეიყვანეთ ციფრები',
                    'img.image' => 'ატვირთეთ (jpeg,png,jpg,gif,svg)',
                    'img.max' => '5მბ მქსიმალური ზომა',
                    'file.max' => '5მბ მქსიმალური ზომა',
                ]);

            if(isset($validData['img']) && !empty($validData['img'])) {
                $imageName = $validData['img']->getClientOriginalName()/*.'.'.$validData['img']->extension()*/;
                $validData['img']->move(public_path('images/post'), $imageName);
            }
            if(isset($validData['file']) && !empty($validData['file'])) {
                $fileName = $validData['file']->getClientOriginalName()/*.'.'.$validData['file']->extension()*/;
                $validData['file']->move(public_path('images/post'), $fileName);
                }
            $menuuuid = $this->MenuRepositories->findOrFail($request->menu_id);

            $data = [
                'type' => 'BLOG',
                'active' => $request->active == 'on' ? 1 : 0,
                'mtav' => $request->mtav == 'on' ? 1 : 0,
                'sort' => $validData['sort'],
                $locale => [
                    'title' => $validData['title'],
                    'author' => isset($request->author) && !empty($request->author) ? $request->author : null,
                    'text' => str_replace('../../../../source','/public/js/source',$validData['text']),
                    'desc' => isset($request->desc) && !empty($request->desc) ? str_replace('../../../../source','/public/js/source',$request->desc) : null,
                    'img' => isset($imageName) && !empty($imageName) ? $imageName : $postEdit->img,
                    'file' => isset($fileName) && !empty($fileName) ? $fileName : $postEdit->file,
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
        return view('admin.page.blog.edit', compact('aboutMenu', 'locale','postEdit','menuedit'));
    }

    public function deletepost($postid = 0, $locale = 'ka')
    {
        $delete_postid = $this->PostRepositories->findOrFail($postid);
        $this->MenuToAnyRepositories->where('row_uuid','=',$delete_postid->uuid)->delete();
        $delete_post = $this->PostRepositories->where('id','=',$delete_postid->id)->delete();
        if($delete_post){
            return redirect(route('admin.blog',['locale'=>$locale]));
        }
    }

}
