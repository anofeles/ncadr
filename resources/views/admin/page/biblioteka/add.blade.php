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
                        <form method="post" action="{{route('admin.biblioteka.add',['locale'=>$locale])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">სათაური</label>
                                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="სათაური" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ავტორი</label>
                                    <input name="author" type="text" class="form-control @error('author') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="ავტორი" value="{{ old('author') }}">
                                    @error('author')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გამოშვების წელი</label>
                                    <input name="pub_year" type="text" class="form-control @error('pub_year') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გამოშვების წელი" value="{{ old('pub_year') }}">
                                    @error('pub_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გვერდები</label>
                                    <input name="pages" type="text" class="form-control @error('pages') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გვერდები" value="{{ old('pages') }}">
                                    @error('pages')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">რაოდენობა</label>
                                    <input name="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="რაოდენობა" value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გამოცემა</label>
                                    <input name="publication" type="text" class="form-control @error('publication') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გამოცემა" value="{{ old('publication') }}">
                                    @error('publication')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გამოცემის ადგილი</label>
                                    <input name="pub_place" type="text" class="form-control @error('pub_place') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გამოცემის ადგილი" value="{{ old('pub_place') }}">
                                    @error('pub_place')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">გამომცემლობა</label>
                                    <input name="pub_company" type="text" class="form-control @error('pub_company') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="გამომცემლობა" value="{{ old('pub_company') }}">
                                    @error('pub_company')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ISBN/ISSN</label>
                                    <input name="isbn_issn" type="text" class="form-control @error('isbn_issn') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="ISBN/ISSN" value="{{ old('isbn_issn') }}">
                                    @error('isbn_issn')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">დამატებითი ინფორმაცია</label>
                                    <input name="add_info" type="text" class="form-control @error('add_info') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="დამატებითი ინფორმაცია" value="{{ old('add_info') }}">
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
                                                <option value="{{$Languagesitem->langId}}">{{$Languagesitem->langName}}</option>
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
                                                <option value="{{$categoriitem->bookCatId}}">{{$categoriitem->bookCatNameGeo}}</option>
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
