@extends('front.layouts.index')
@section('section')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">{{__('site.lib_searchs')}}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">{{__('site.lib_searchf')}}
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form method="post" action="{{route('home.searchlibrari',['locale'=>$locale])}}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{__('site.lib_word')}}</label>
                                <input name="search" type="text"
                                       class="form-control @error('search') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                                @error('search')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('site.lib_btn')}}</button>
                        </form>{{__('site.lib_text')}}
                       
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form method="post" action="{{route('home.moresearch',['locale'=>$locale])}}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{__('site.lib_title')}}
</label>
                                <input name="title" type="text" value="{{old('title')}}"
                                       class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{__('site.lib_author')}}</label>
                                <input name="author" type="text" value="{{old('author')}}"
                                       class="form-control @error('author') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                                @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class="mb-3">--}}
{{--                                <label for="exampleInputEmail1" class="form-label">{{__('site.lib_anot')}}</label>--}}
{{--                                <input name="search" type="text"--}}
{{--                                       class="form-control @error('search') is-invalid @enderror" id="exampleInputEmail1"--}}
{{--                                       aria-describedby="emailHelp">--}}
{{--                                @error('search')--}}
{{--                                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{__('site.lib_pub')}}</label>
                                <input name="publication" type="text" value="{{old('publication')}}"
                                       class="form-control @error('publication') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                                @error('publication')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{__('site.lib_publ')}}
</label>
                                <input name="pub_company" type="text" value="{{old('pub_company')}}"
                                       class="form-control @error('pub_company') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                                @error('pub_company')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ISBN/ISSN</label>
                                <input name="isbn_issn" type="text" value="{{old('isbn_issn')}}"
                                       class="form-control @error('isbn_issn') is-invalid @enderror" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                                @error('isbn_issn')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">{{__('site.lib_py')}}</span>
                                <input name="from" value="{{old('from')}}" type="text" aria-label="First name" class="form-control" placeholder="{{__('site.lib_from')}}">
                                <input name="til" value="{{old('til')}}" type="text" aria-label="Last name" class="form-control" placeholder="{{__('site.lib_to')}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{__('site.lib_lang')}}</label>
                                <select name="language" class="form-select @error('language') is-invalid @enderror" aria-label="Default select example">
                                    <option value="" selected="selected">{{__('site.lib_sel')}}</option>
                                    @foreach($language as $languageitem)
                                    <option value="{{$languageitem->langId}}">{{$languageitem->langName}}</option>
                                    @endforeach
                                </select>
                                @error('language')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{__('site.lib_cat')}}</label>
                                <select name="categori" class="form-select @error('categori') is-invalid @enderror" aria-label="Default select example">
                                    <option value="" selected="selected">{{__('site.lib_sel')}}</option>
                                    @foreach($categori as $categoriitem)
                                        <option value="{{$categoriitem->bookCatId}}">{{$categoriitem->bookCatNameGeo}}</option>
                                    @endforeach
                                </select>
                                @error('categori')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{__('site.lib_btn')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
