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

                        <form method="post" action="{{route('admin.edit.biblioteka.categorIndex',['postid'=>$postid,'locale'=>$locale])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">კატეგორია (ქართულად)</label>
                                    <input name="categoryGeo" type="text" class="form-control @error('categoryGeo') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="კატეგორია (ქართულად)" value="{{ $BookCategori->bookCatNameGeo }}">
                                    @error('categoryGeo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">კატეგორია (ინგლისურად)</label>
                                    <input name="categoryEng" type="text" class="form-control @error('categoryEng') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="კატეგორია (ინგლისურად)" value="{{ $BookCategori->bookCatNameEng }}">
                                    @error('categoryEng')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">კატეგორია (გერმანულად)</label>
                                    <input name="categoryGer" type="text" class="form-control @error('categoryGer') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="კატეგორია (გერმანულად)" value="{{ $BookCategori->bookCatNameGer }}">
                                    @error('categoryGer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">კატეგორია (რუსულად)</label>
                                    <input name="categoryRus" type="text" class="form-control @error('categoryRus') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="კატეგორია (რუსულად)" value="{{ $BookCategori->bookCatNameRus }}">
                                    @error('categoryRus')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">კოდი</label>
                                    <input name="code" type="text" class="form-control @error('code') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="კოდი" value="{{ $BookCategori->code }}">
                                    @error('code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">თარიღი (yyyy-mm-dd)</label>
                                    <input name="date" type="text" class="form-control @error('date') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="თარიღი (yyyy-mm-dd)" value="{{ $BookCategori->creationDate }}">
                                    @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
