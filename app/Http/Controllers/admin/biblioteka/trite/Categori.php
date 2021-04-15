<?php


namespace App\Http\Controllers\admin\biblioteka\trite;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

trait Categori
{
    public function categorIndex($locale='ka'){
        App::setLocale($locale);
        $categori = $this->BookCategoriesRepositories->paginate(20);

        return view('admin.page.biblioteka.categori.index',compact('categori','locale'));
    }

    public function addcategor(Request $request,$postid = 0, $locale='ka'){
        App::setLocale($locale);
        if($request->method() == 'POST'){
            $validData = $request->validate([
                'categoryGeo' => 'required|max:255',
            ],
                [
                    'categoryGeo.required' => 'გთხოვთ შეავსოთ',
                    'categoryGeo.max' => 'მაქსიმალური სირძე 255',
                ]);
            $data = [
                'bookCatNameGeo' => $validData['categoryGeo'],
                'bookCatNameEng'   => $request->categoryEng,
                'bookCatNameGer'   => $request->categoryGer,
                'bookCatNameRus'   => $request->categoryRus,
                'code'   => $request->code,
                'creationDate'   => $request->date,
            ];

            $this->BookCategoriesRepositories->create($data);
        }
        return view('admin.page.biblioteka.categori.add',compact('locale','postid'));
    }

    public function editcategor(Request $request,$postid = 0, $locale='ka'){
        App::setLocale($locale);
        $BookCategori = $this->BookCategoriesRepositories->where('bookCatId','=',$postid)->first();
        if($request->method() == 'POST'){
            $validData = $request->validate([
                'categoryGeo' => 'required|max:255',
            ],
                [
                    'categoryGeo.required' => 'გთხოვთ შეავსოთ',
                    'categoryGeo.max' => 'მაქსიმალური სირძე 255',
                ]);
            $data = [
                'bookCatNameGeo' => $validData['categoryGeo'],
                'bookCatNameEng'   => $request->categoryEng,
                'bookCatNameGer'   => $request->categoryGer,
                'bookCatNameRus'   => $request->categoryRus,
                'code'   => $request->code,
                'creationDate'   => $request->date,
            ];
            $this->BookCategoriesRepositories->where('bookCatId', '=', $postid)->update($data);
        }
        return view('admin.page.biblioteka.categori.edit',compact('locale','postid','BookCategori'));
    }

    public function deletecategor($postid = 0, $locale='ka'){
        $this->BookCategoriesRepositories->where('bookCatId', '=', $postid)->delete();
        return back();
    }

}
