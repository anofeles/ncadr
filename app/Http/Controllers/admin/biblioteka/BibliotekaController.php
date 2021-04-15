<?php


namespace App\Http\Controllers\admin\biblioteka;




use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

use App\Http\Controllers\admin\biblioteka\trite\Categori;
use App\Http\Controllers\admin\biblioteka\trite\Lamguage;

use App\Repositories\LocaleRepositories;
use App\Repositories\BooksRepositories;
use App\Repositories\LanguagesRepositories;
use App\Repositories\BookCategoriesRepositories;

class BibliotekaController extends Controller
{

    use Categori, Lamguage;
    protected $LocaleRepositories, $BooksRepositories, $LanguagesRepositories, $BookCategoriesRepositories;

    public function __construct(
        LocaleRepositories $LocaleRepositories,
        BooksRepositories $BooksRepositories,
        LanguagesRepositories $LanguagesRepositories,
        BookCategoriesRepositories $BookCategoriesRepositories
    )
    {
        $this->LocaleRepositories = $LocaleRepositories;
        $this->BooksRepositories = $BooksRepositories;
        $this->LanguagesRepositories = $LanguagesRepositories;
        $this->BookCategoriesRepositories = $BookCategoriesRepositories;
        $this->middleware('auth');
        view()->share('local',$this->LocaleRepositories->all());
    }

    public function index($locale='ka'){
        App::setLocale($locale);
        $books = $this->BooksRepositories->paginate(20);
        return view('admin.page.biblioteka',compact('books','locale'));
    }

    public function editbook(Request $request,$postid = 0, $locale='ka'){
        App::setLocale($locale);
        $book = $this->BooksRepositories->where('bookId','=',$postid)->first();
        $Languages = $this->LanguagesRepositories->all();
        $categori = $this->BookCategoriesRepositories->all();
        if($request->method() == 'POST'){
            $validData = $request->validate([
                'pub_year' => 'nullable|numeric',
                'pages' => 'nullable|numeric',
                'quantity' => 'nullable|numeric',
            ],
                [
                    'pub_year.numeric' => 'შეიყვანეთ ციფრები',
                    'pages.numeric' => 'შეიყვანეთ ციფრები',
                    'quantity.numeric' => 'შეიყვანეთ ციფრები',

                ]);
            $data = [
                'title' => $request->title,
                'author'   => $request->author,
                'pub_year'   => $validData['pub_year'],
                'pages'   => $validData['pages'],
                'quantity'   => $validData['quantity'],
                'publication'   => $request->publication,
                'pub_place'   => $request->pub_place,
                'pub_company'   => $request->pub_company,
                'isbn_issn'   => $request->isbn_issn,
                'add_info'   => $request->add_info,
                'language'   => $request->language,
                'category'   => $request->category
            ];

            $this->BooksRepositories->where('bookId', '=', $postid)->update($data);
        }
        return view('admin.page.biblioteka.edit',compact('locale','Languages','categori','book','postid'));
    }

    public function addbiblioteka(Request $request, $locale='ka'){
        App::setLocale($locale);
        $Languages = $this->LanguagesRepositories->all();
        $categori = $this->BookCategoriesRepositories->all();
        if($request->method() == 'POST'){
            $validData = $request->validate([
                'pub_year' => 'nullable|numeric',
                'pages' => 'nullable|numeric',
                'quantity' => 'nullable|numeric',
            ],
                [
                    'pub_year.numeric' => 'შეიყვანეთ ციფრები',
                    'pages.numeric' => 'შეიყვანეთ ციფრები',
                    'quantity.numeric' => 'შეიყვანეთ ციფრები',

                ]);
            $data = [
              'title' => $request->title,
              'author'   => $request->author,
              'pub_year'   => $validData['pub_year'],
              'pages'   => $validData['pages'],
              'quantity'   => $validData['quantity'],
              'publication'   => $request->publication,
              'pub_place'   => $request->pub_place,
              'pub_company'   => $request->pub_company,
              'isbn_issn'   => $request->isbn_issn,
              'add_info'   => $request->add_info,
              'language'   => $request->language,
              'category'   => $request->category
            ];
            $this->BooksRepositories->create($data);
        }
        return view('admin.page.biblioteka.add',compact('locale','Languages','categori'));
    }

    public function deletebook($postid = 0, $locale='ka'){
        $this->BooksRepositories->where('bookId', '=', $postid)->delete();
        return back();
    }
}
