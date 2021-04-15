<?php


namespace App\Http\Controllers\frontend\traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

trait searchlibrari
{
    public function indexlibrari(Request $request, $locale = 'ka')
    {
        App::setLocale($locale);
        $language = $this->LanguagesRepositories->all();
        $categori = $this->BookCategoriesRepositories->all();
        if ($request->method() == 'POST') {
            $validData = $request->validate([
                'search' => 'required|max:255',
            ],
                [
                    'search.required' => 'გთხოვთ შეავსოთ',
                    'search.max' => 'მაქსიმალური სირძე 255',
                ]);
            $librari = $this->BooksRepositories
                ->where('title', 'LIKE', "%{$validData['search']}%")
                ->orWhere('author', 'LIKE', "%{$validData['search']}%")
                ->orWhere('pub_year', 'LIKE', "%{$validData['search']}%")
                ->orWhere('isbn_issn', 'LIKE', "%{$validData['search']}%")
                ->orWhere('creationDate', 'LIKE', "%{$validData['search']}%")
                ->get();
            return view('front.page.bibliotekasearch', compact('locale', 'librari'));
        }
        return view('front.page.bibliteka', compact('locale', 'language', 'categori'));
    }

    public function moresearch(Request $request, $locale = 'ka')
    {
        App::setLocale($locale);
        if ($request->method() == 'POST') {
//            dd($request->til);
            $validData = $request->validate([
                'title' => 'required|max:255',
                'author' => 'nullable|max:255',
                'publication' => 'nullable|max:255',
                'pub_company' => 'nullable|max:255',
                'isbn_issn' => 'nullable|max:255',
                'language' => 'nullable|max:255',
                'categori' => 'nullable|max:255',
            ],
                [
                    'title.required' => 'გთხოვთ შეავსოთ',
                    'title.max' => 'მაქსიმალური სირძე 255',
//                    'author.required' => 'გთხოვთ შეავსოთ',
                    'author.max' => 'მაქსიმალური სირძე 255',
//                    'publication.required' => 'გთხოვთ შეავსოთ',
                    'publication.max' => 'მაქსიმალური სირძე 255',
//                    'pub_company.required' => 'გთხოვთ შეავსოთ',
                    'pub_company.max' => 'მაქსიმალური სირძე 255',
//                    'isbn_issn.required' => 'გთხოვთ შეავსოთ',
                    'isbn_issn.max' => 'მაქსიმალური სირძე 255',
//                    'language.required' => 'გთხოვთ შეავსოთ',
                    'language.max' => 'მაქსიმალური სირძე 255',
//                    'categori.required' => 'გთხოვთ შეავსოთ',
                    'categori.max' => 'მაქსიმალური სირძე 255',
                ]);
            $result = $this->BooksRepositories->where('title', 'LIKE', "%{$validData['title']}%");
            if(!empty($validData['author'])) {
                $result->Where('author', 'LIKE', "%{$validData['author']}%");
            }
            if(!empty($validData['publication'])) {
                $result->Where('publication', 'LIKE', "%{$validData['publication']}%");
            }
            if(!empty($validData['pub_company'])) {
                $result->Where('pub_company', 'LIKE', "%{$validData['pub_company']}%");
            }
            if(!empty($request->til)) {
                $result->Where('pub_year', '<=', "$request->til");
            }
            if(!empty($request->from)) {
                $result->Where('pub_year', '>=', "$request->from");
            }
            if(!empty($validData['isbn_issn'])) {
                $result->Where('isbn_issn', 'LIKE', "%{$validData['isbn_issn']}%");
            }
            if(!empty($validData['language'])) {
                $result->Where('language', 'LIKE', "%{$validData['language']}%");
            }
            if(!empty($validData['categori'])) {
                $result->Where('category', 'LIKE', "%{$validData['categori']}%");
            }
            $librari = $result->get();
            return view('front.page.bibliotekasearch', compact('locale', 'librari'));
        }
    }

    public function librarifull($locale = 'ka', $librariid = 0)
    {
        App::setLocale($locale);
        $librari = $this->BooksRepositories->where('bookId', '=', $librariid)->first();
        $language = $this->LanguagesRepositories->where('langId', '=', $librari->language)->first();
        $categori = $this->BookCategoriesRepositories->where('bookCatId', '=', $librari->category)->first();
        return view('front.page.biblitekafull', compact('locale', 'librari', 'language', 'categori'));
    }

}
