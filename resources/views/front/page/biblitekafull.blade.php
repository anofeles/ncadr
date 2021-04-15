@extends('front.layouts.index')
@section('section')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <table class="table table-striped table-hover">
                    <tbody><tr>
                        <td width="200">დასახელება</td>
                        <td>{{$librari->title}}</td>
                    </tr>
                    <tr>
                        <td>ავტორი</td>
                        <td>{{$librari->author}}</td>
                    </tr>
                    <tr>
                        <td>გამოცემის წელი</td>
                        <td>{{$librari->pub_year}}</td>
                    </tr>
                    <tr>
                        <td>გამოცემა</td>
                        <td>{{$librari->publication}}</td>
                    </tr>
                    <tr>
                        <td>გამოცემის ადგილი</td>
                        <td>{{$librari->title}}</td>
                    </tr>
                    <tr>
                        <td>გამომცემლობა</td>
                        <td>{{$librari->pub_place}}</td>
                    </tr>
                    <tr>
                        <td>ISBN/ISSN</td>
                        <td>{{$librari->isbn_issn}}</td>
                    </tr>
                    <tr>
                        <td>გვერდები</td>
                        <td>{{$librari->pages}}</td>
                    </tr>
                    <tr>
                        <td>რაოდენობა</td>
                        <td>{{$librari->quantity}}</td>
                    </tr>
                    <tr>
                        <td>დამატებითი ინფორმაცია</td>
                        <td>{{$librari->add_info}}</td>
                    </tr>
                    <tr>
                        <td>ენა</td>
                        <td>{{$language->langName}}</td>
                    </tr>
                    <tr>
                        <td>კატეგორია</td>
                        <td>
                            {{$categori->bookCatNameGeo}}
                            {{$categori->bookCatNameEng}}
                            {{$categori->bookCatNameGer}}
                            {{$categori->bookCatNameRus}}
                        </td>
                    </tr>
                    </tbody></table>
            </div>
        </div>
    </section>
@endsection
