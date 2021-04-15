<?php


namespace App\Http\Controllers\admin\post;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

use App\Repositories\PostRepositories;
use App\Repositories\LocaleRepositories;
use App\Repositories\MenuRepositories;
use App\Repositories\MenuToAnyRepositories;
use App\Repositories\SubscribeRepositories;


class PostController extends Controller
{
    protected $PostRepositories, $LocaleRepositories, $MenuRepositories, $MenuToAnyRepositories, $SubscribeRepositories;

    public function __construct(
        PostRepositories $PostRepositories,
        LocaleRepositories $LocaleRepositories,
        MenuRepositories $MenuRepositories,
        MenuToAnyRepositories $MenuToAnyRepositories,
        SubscribeRepositories $SubscribeRepositories
    )
    {
        $this->PostRepositories = $PostRepositories;
        $this->MenuRepositories = $MenuRepositories;
        $this->LocaleRepositories = $LocaleRepositories;
        $this->MenuToAnyRepositories = $MenuToAnyRepositories;
        $this->SubscribeRepositories = $SubscribeRepositories;
        $this->middleware('auth');
        view()->share('local',$this->LocaleRepositories->all());
    }


    public function postindex($locale = 'ka')
    {
        App::setLocale($locale);
            $post = $this->PostRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('type','=','POST')->get();
        $menu = $this->PostRepositories->menu_to_any()->get();
        $meniuviu = $this->MenuRepositories->where('type','=','POST')->get();
        return view('admin.page.post', compact('post', 'locale','menu','meniuviu'));
    }

    public function addpost($locale = 'ka', Request $request)
    {
        App::setLocale($locale);
            $aboutMenu = $this->MenuRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('active','=', 1)->where('type','=','POST')->get();

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
                'type' => 'POST',
                'active' => $request->active == 'on' ? 1 : 0,
                'mtav' => $request->mtav == 'on' ? 1 : 0,
                'sort' => $validData['sort'],
                $locale => [
                    'title' => $validData['title'],
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

            $subMail  = $this->SubscribeRepositories->where('active','=',1)->get();
            foreach ($subMail as $subMailthis) {
                $dataSunscriber = [
                    'url'=> url('/').'/'.$add_menu->locale.'/full/'.$add_menu->id,
                    'title'=>$add_menu->title,
                    'remova'=>$subMailthis->uuid
                ];
                Mail::to($subMailthis->email)->send(new OrderShipped($dataSunscriber));
            }
        }

        return view('admin.page.post.add', compact('aboutMenu', 'locale'));
    }

    public function editpost($postid = 0, $locale = 'ka', Request $request)
    {
        App::setLocale($locale);
            $aboutMenu = $this->MenuRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('active', 1)->where('type','=','POST')->get();
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
                'type' => 'POST',
                'active' => $request->active == 'on' ? 1 : 0,
                'mtav' => $request->mtav == 'on' ? 1 : 0,
                'sort' => $validData['sort'],
                $locale => [
                    'title' => $validData['title'],
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
        return view('admin.page.post.edit', compact('aboutMenu', 'locale','postEdit','menuedit'));
    }

    public function deletepost($postid = 0, $locale = 'ka')
    {
        $delete_postid = $this->PostRepositories->findOrFail($postid);
        $this->MenuToAnyRepositories->where('row_uuid','=',$delete_postid->uuid)->delete();
        $delete_post = $this->PostRepositories->where('id','=',$delete_postid->id)->delete();
        if($delete_post){
            return redirect(route('admin.post',['locale'=>$locale]));
        }
    }

}
