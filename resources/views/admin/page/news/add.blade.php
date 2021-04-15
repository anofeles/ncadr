@extends('admin.layouts.admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>სიახლის დამატება </h1>
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
                            <h3 class="card-title">დამატება/add</h3>
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-primary">დამატება/ADD</button>
                            </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('admin.news.add',['locale'=>$locale])}}" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1">დალაგება</label>
                                    <input name="sort" type="text" class="form-control @error('sort') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="რიგის ნომერი" value="{{ old('sort') }}">
                                    @error('sort')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">მოკლე აღწერილობა</label>
                                    <textarea class="form-control textarea @error('desc') is-invalid @enderror" rows="3" placeholder="მოკლე აღწერილობა" name="desc">{{ old('desc') }}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">სრული ტექსტი</label>
                                    <textarea class="form-control textarea" rows="3" placeholder="ტექსტი" name="text">{{ old('text') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>მენიუ</label>
                                        <select class="custom-select" name="menu_id">
                                            <option value="0">მენიუ</option>
                                            @foreach($aboutMenu as $aboutMenuitem)
                                                <option
                                                    value="{{$aboutMenuitem->id}}">{{$aboutMenuitem->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <div class="custom-file">
                                        <input name="img" type="file" class="custom-file-input @error('img') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">სურათი</label>
                                        @error('img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <div class="custom-file">
                                        <input name="file" type="file" class="custom-file-input @error('file') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">ფაილი</label>
                                        @error('file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input name="active" type="checkbox" class="custom-control-input" id="customSwitch3">
                                        <label class="custom-control-label" for="customSwitch3">აქტიური</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input name="mtav" type="checkbox" class="custom-control-input" id="customSwitch2">
                                        <label class="custom-control-label" for="customSwitch2">მთავარი</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">დამატება/Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
        </div>
    </section>

@stop
