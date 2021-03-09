<?php


namespace App\Http\Controllers\admin\galeri;

use App\Http\Controllers\Controller;
use App\Repositories\GaleryRepositories;
use App\Repositories\LocaleRepositories;
use App\Repositories\MediaRepositories;
use App\Repositories\MediaToAnyRepositories;
use App\Repositories\MenuRepositories;
use App\Repositories\MenuToAnyRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;

class GaleriController extends Controller
{

    protected $MediaRepositories,
        $LocaleRepositories,
        $GaleryRepositories,
        $MenuRepositories,
        $MediaToAnyRepositories,
        $MenuToAnyRepositories;

    public function __construct(
        MediaRepositories $MediaRepositories,
        LocaleRepositories $LocaleRepositories,
        GaleryRepositories $GaleryRepositories,
        MenuRepositories $MenuRepositories,
        MediaToAnyRepositories $MediaToAnyRepositories,
        MenuToAnyRepositories $MenuToAnyRepositories
    )
    {
        $this->MediaRepositories = $MediaRepositories;
        $this->LocaleRepositories = $LocaleRepositories;
        $this->GaleryRepositories = $GaleryRepositories;
        $this->MenuRepositories = $MenuRepositories;
        $this->MediaToAnyRepositories = $MediaToAnyRepositories;
        $this->MenuToAnyRepositories = $MenuToAnyRepositories;
        $this->middleware('auth');
        view()->share('local', $this->LocaleRepositories->all());
    }

    public function postindex($locale = 'ka')
    {
        App::setLocale($locale);
            $post = $this->GaleryRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->get();
        return view('admin.page.galeri', compact('post', 'locale'));
    }

    public function addpost($locale = 'ka', Request $request)
    {
        App::setLocale($locale);
            $aboutMenu = $this->MenuRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('active', '=', 1)->where('type', '=', 'GALERI')->get();
        if ($request->method() == 'POST') {
            $validData = $request->validate([
                'title' => 'required|max:255',
                'sort' => 'required|numeric',
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5012',
                'file' => 'max:5012'
            ],
                [
                    'title.required' => 'გთხოვთ შეავსოთ',
                    'title.max' => 'მაქსიმალური სირძე 255',
                    'sort.required' => 'გთხოვთ შეავსოთ',
                    'sort.numeric' => 'შეიყვანეთ ციფრები',
                    'img.image' => 'ატვირთეთ (jpeg,png,jpg,gif,svg)',
                    'img.max' => '5მბ მქსიმალური ზომა',
                    'file.max' => '5მბ მქსიმალური ზომა',
                ]);
            if (isset($validData['img']) && !empty($validData['img'])) {
                $imageName = $validData['img']->getClientOriginalName()/*.'.'.$validData['img']->extension()*/
                ;
                $validData['img']->move(public_path('images/galeri/yda'), $imageName);
            }
            if (isset($validData['file'][0]) && !empty($validData['file'][0])) {
                foreach ($validData['file'] as $file) {
                    $fileName = $file->getClientOriginalName()/*.'.'.$validData['file']->extension()*/
                    ;
                    $file->move(public_path('images/galeri'), $fileName);
                    $fileMedia[] = $fileName;
                }
            }
            $menuuuid = $this->MenuRepositories->findOrFail($request->menu_id);
            $data = [
                'uuid' => Uuid::uuid6(),
                'type' => 'GALERI',
                'active' => $request->active == 'on' ? 1 : 0,
                'sort' => $validData['sort'],
                $locale => [
                    'title' => $validData['title'],
                    'img' => isset($imageName) && !empty($imageName) ? $imageName : null,
                ]
            ];
            $galeriMav = $this->GaleryRepositories->create($data);
            if(isset($fileMedia) && !empty($fileMedia)) {
                foreach ($fileMedia as $i => $fileMediaitem) {
                    $media = [
                        'uuid' => Uuid::uuid6(),
                        'locale' => $locale,
                        'type' => 'GALERI',
                        'img' => $fileMediaitem,
                        'title' => $request->img_title[$i]
                    ];
                    $mediaImg = $this->MediaRepositories->create($media);
                    $mediaToAny = [
                        'media_uuid' => $mediaImg->uuid,
                        'row_uuid' => $galeriMav->uuid,
                        'type' => 'GALERI',
                    ];
                    $this->MediaToAnyRepositories->create($mediaToAny);
                }
            }
            $menutoany = [
                'menu_uuid' => $menuuuid->uuid,
                'row_uuid' => $galeriMav->uuid
            ];
            $this->MenuToAnyRepositories->create($menutoany);
        }
        return view('admin.page.galeri.add', compact('aboutMenu', 'locale'));
    }

    public function editpost($postid = 0, $locale = 'ka', Request $request){
        App::setLocale($locale);
            $aboutMenu = $this->MenuRepositories->whereHas('translations', function ($query) use ($locale) {
                $query
                    ->where('locale', $locale);
            })->where('active', 1)->where('type','=','GALERI')->get();
        $postEdit = $this->GaleryRepositories->findOrFail($postid);

        $menutoany = $this->MenuToAnyRepositories->where('row_uuid','=',$postEdit->uuid)->first();
        $menuedit = $this->MenuRepositories->where('uuid','=',isset($menutoany->menu_uuid) ? $menutoany->menu_uuid : null)->first();

        $mediaToAny = $this->MediaToAnyRepositories->where('row_uuid','=',$postEdit->uuid)->get();
        foreach ($mediaToAny as $mediaToAnyitem) {
            $mediaImg[] = $this->MediaRepositories
                ->where('uuid','=',$mediaToAnyitem->media_uuid)
                ->where('locale','=',$locale)
                ->first();
        }
        if(isset($mediaImg) && !empty($mediaImg)){
            view()->share('mediaImg',$mediaImg);
        }
        if ($request->method() == 'POST') {

            $validData = $request->validate([
                'title' => 'required|max:255',
                'sort' => 'required|numeric',
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5012',
                'file' => 'max:5012'
            ],
                [
                    'title.required' => 'გთხოვთ შეავსოთ',
                    'title.max' => 'მაქსიმალური სირძე 255',
                    'sort.required' => 'გთხოვთ შეავსოთ',
                    'sort.numeric' => 'შეიყვანეთ ციფრები',
                    'img.image' => 'ატვირთეთ (jpeg,png,jpg,gif,svg)',
                    'img.max' => '5მბ მქსიმალური ზომა',
                    'file.max' => '5მბ მქსიმალური ზომა',
                ]);
            if (isset($validData['img']) && !empty($validData['img'])) {
                $imageName = $validData['img']->getClientOriginalName()/*.'.'.$validData['img']->extension()*/
                ;
                $validData['img']->move(public_path('images/galeri/yda'), $imageName);
            }
            if (isset($validData['file'][0]) && !empty($validData['file'][0])) {
                foreach ($validData['file'] as $file) {
                    $fileName = $file->getClientOriginalName()/*.'.'.$validData['file']->extension()*/;
                    $file->move(public_path('images/galeri'), $fileName);
                    $fileMedia[] = $fileName;
                }
            }
            $menuuuid = $this->MenuRepositories->findOrFail($request->menu_id);

            $data = [
                'type' => 'GALERI',
                'active' => $request->active == 'on' ? 1 : 0,
                'sort' => $validData['sort'],
                $locale => [
                    'title' => $validData['title'],
                    'img' => isset($imageName) && !empty($imageName) ? $imageName : $postEdit->img,
                ]
            ];
            $galeriMav = $this->GaleryRepositories->updateOrCreate($postid > 0 ? ['id' => $postid] : ['id' => null],$data);

            if(isset($fileMedia) && !empty($fileMedia)) {
                foreach ($fileMedia as $i => $fileMediaitem) {
                    $media = [
                        'uuid' => Uuid::uuid6(),
                        'locale' => $locale,
                        'type' => 'GALERI',
                        'img' => $fileMediaitem,
                        'title' => $request->img_title[$i]
                    ];
                    $mediaImg = $this->MediaRepositories->create($media);
                    $mediaToAny = [
                        'media_uuid' => $mediaImg->uuid,
                        'row_uuid' => $galeriMav->uuid,
                        'type' => 'GALERI',
                    ];
                    $this->MediaToAnyRepositories->create($mediaToAny);
                }
            }

            $this->MenuToAnyRepositories->where('row_uuid','=',$galeriMav->uuid)->delete();
            $menutoany = [
                'menu_uuid'=>$menuuuid->uuid,
                'row_uuid'=>$galeriMav->uuid
            ];
            $this->MenuToAnyRepositories->updateOrCreate(isset($menutoany->id) && $menutoany->id > 0 ? ['id' => $menutoany->id] : ['id' => null],$menutoany);

            return back();
        }
        return view('admin.page.galeri.edit', compact('aboutMenu', 'locale','postEdit','menuedit'));
    }

    public function mediaimgremova($mediaid = 0){
        if($mediaid > 0){
            $mediaImg = $this->MediaRepositories->findOrFail($mediaid);
            $this->MediaToAnyRepositories->where('media_uuid','=',$mediaImg->uuid)->delete();
            $this->MediaRepositories->where('id','=',$mediaid)->delete();
        }
        return back();
    }

    public function deletepost($postid = 0, $locale = 'ka')
    {
        $delete_postid = $this->GaleryRepositories->findOrFail($postid);
        $mediaToAny = $this->MediaToAnyRepositories->where('row_uuid','=',$delete_postid->uuid)->get();
        foreach ($mediaToAny as $mediaToAnyitem) {
           $this->MediaRepositories->where('uuid','=',$mediaToAnyitem->media_uuid)->delete();
        }
        $this->MediaToAnyRepositories->where('row_uuid','=',$delete_postid->uuid)->delete();
        $this->MenuToAnyRepositories->where('row_uuid','=',$delete_postid->uuid)->delete();
        $delete_post = $this->GaleryRepositories->where('id','=',$delete_postid->id)->delete();
        if($delete_post){
            return redirect(route('admin.galeri',['locale'=>$locale]));
        }
    }
}
