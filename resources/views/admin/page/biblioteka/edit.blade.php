@extends('admin.layouts.admin')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ბიბლიოთეკა</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">დამატება</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('admin.edit.biblioteka',['postid'=>$postid,'locale'=>$locale])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">სათაური</label>
                                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="სათაური" value="{{ $book->title }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ავტორი</label>
                                    <input name="author" type="text" class="form-control @error('author') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="ავტორი" value="{{ $book->author }}">
                                    @error('author')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გამოშვების წელი</label>
                                    <input name="pub_year" type="text" class="form-control @error('pub_year') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გამოშვების წელი" value="{{ $book->pub_year }}">
                                    @error('pub_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გვერდები</label>
                                    <input name="pages" type="text" class="form-control @error('pages') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გვერდები" value="{{ $book->pages }}">
                                    @error('pages')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">რაოდენობა</label>
                                    <input name="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="რაოდენობა" value="{{ $book->quantity }}">
                                    @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გამოცემა</label>
                                    <input name="publication" type="text" class="form-control @error('publication') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გამოცემა" value="{{ $book->publication }}">
                                    @error('publication')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გამოცემის ადგილი</label>
                                    <input name="pub_place" type="text" class="form-control @error('pub_place') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გამოცემის ადგილი" value="{{ $book->pub_place }}">
                                    @error('pub_place')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გამომცემლობა</label>
                                    <input name="pub_company" type="text" class="form-control @error('pub_company') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გამომცემლობა" value="{{ $book->pub_company }}">
                                    @error('pub_company')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ISBN/ISSN</label>
                                    <input name="isbn_issn" type="text" class="form-control @error('isbn_issn') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="ISBN/ISSN" value="{{ $book->isbn_issn }}">
                                    @error('isbn_issn')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">დამატებითი ინფორმაცია</label>
                                    <input name="add_info" type="text" class="form-control @error('add_info') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="დამატებითი ინფორმაცია" value="{{ $book->add_info }}">
                                    @error('add_info')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>ენა</label>
                                        <select class="custom-select" name="language">
                                            @foreach($Languages as $Languagesitem)
                                                <option @if($book->language == $Languagesitem->langId)
                                                        selected="selected"
                                                        @endif
                                                        value="{{$Languagesitem->langId}}">{{$Languagesitem->langName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>კატეგორი</label>
                                        <select class="custom-select" name="category">
                                            @foreach($categori as $categoriitem)
                                                <option @if($book->category == $categoriitem->bookCatId)
                                                    selected="selected"
                                                @endif value="{{$categoriitem->bookCatId}}">{{$categoriitem->bookCatNameGeo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
        </div>
    </section>

@endsection
