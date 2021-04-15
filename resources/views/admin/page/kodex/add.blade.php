@extends('admin.layouts.admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>კოდექსი </h1>
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
                          <div class="card-footer">
                                <button type="submit" class="btn btn-primary">დამატება/Submit</button>
                            </div>
                        <form method="post" action="{{route('admin.kodex.add',['locale'=>$locale])}}" enctype="multipart/form-data">
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
                                           placeholder="სორტირება" value="{{ old('sort') }}">
                                    @error('sort')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ტექსტი</label>
                                    <textarea class="form-control textarea @error('text') is-invalid @enderror" rows="3" placeholder="მოკლე აღწერილობა" name="text">{{ old('text') }}</textarea>
                                    @error('text')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input name="active" type="checkbox" class="custom-control-input" id="customSwitch3">
                                        <label class="custom-control-label" for="customSwitch3">აქტიური</label>
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
