<?php


namespace App\Http\Controllers\admin\biblioteka\trite;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

trait Lamguage
{
    public function lamguageIndex($locale='ka'){
        App::setLocale($locale);
        $language = $this->LanguagesRepositories->paginate(20);
        return view('admin.page.biblioteka.languages.index',compact('language','locale'));
    }
    public function addlamguage(Request $request,$postid = 0,$locale='ka'){
        App::setLocale($locale);
        if($request->method() == 'POST'){
            $validData = $request->validate([
                'langName' => 'required|max:255',
            ],
                [
                    'langName.required' => 'გთხოვთ შეავსოთ',
                    'langName.max' => 'მაქსიმალური სირძე 255',
                ]);
            $data = [
                'langName' => $validData['langName'],
            ];

            $this->LanguagesRepositories->create($data);
        }
        return view('admin.page.biblioteka.languages.add',compact('locale','postid'));
    }
    public function editlamguage(Request $request,$postid=0,$locale='ka'){
        App::setLocale($locale);
        $language = $this->LanguagesRepositories->where('langId','=',$postid)->first();
        if($request->method() == 'POST'){
            $validData = $request->validate([
                'langName' => 'required|max:255',
            ],
                [
                    'langName.required' => 'გთხოვთ შეავსოთ',
                    'langName.max' => 'მაქსიმალური სირძე 255',
                ]);
            $data = [
                'langName' => $validData['langName'],
            ];
            $this->LanguagesRepositories->where('langId', '=', $postid)->update($data);
        }
        return view('admin.page.biblioteka.languages.edit',compact('locale','postid','language'));
    }
    public function deletelamguage($postid=0,$locale='ka'){
        $this->LanguagesRepositories->where('langId', '=', $postid)->delete();
        return back();
    }
}
