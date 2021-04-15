@extends('admin.layouts.admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>თანამშრომლის რედაქტირება </h1>
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
                        <form method="post" action="{{route('admin.them.edit',['locale'=>$locale,'postid'=>$postEdit->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">სათაური</label>
                                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="სათაური" value="{{ $postEdit->title }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">სორტირება</label>
                                    <input name="sort" type="text" class="form-control @error('sort') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="სორტირება" value="{{ $postEdit->sort }}">
                                    @error('sort')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ავტორი</label>
                                    <input name="author" type="text" class="form-control @error('author') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="ავტორი" value="{{$postEdit->author}}">
                                    @error('author')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">თანამდებობა</label>
                                    <input name="enploi" type="text" class="form-control @error('enploi') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="თანამდებობა" value="{{$postEdit->enploi}}">
                                    @error('enploi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ტექსტ</label>
                                    <textarea class="form-control textarea" rows="3" placeholder="ტექსტ" name="text">{!! $postEdit->text !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>მენიუ</label>
                                        <select class="custom-select" name="menu_id">
                                            <option value="0">მენიუ</option>
                                            @foreach($aboutMenu as $aboutMenuitem)
                                                <option @if(isset($menuedit->id) && $menuedit->id == $aboutMenuitem->id) selected="selected" @endif
                                                    value="{{$aboutMenuitem->id}}">{{$aboutMenuitem->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <div class="custom-file">
                                        <input name="img" type="file" class="custom-file-input @error('img') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">სურათი {{$postEdit->img}}</label>
                                        @error('img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <div class="custom-file">
                                        <input name="file" type="file" class="custom-file-input @error('file') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">სურათი {{$postEdit->file}}</label>
                                        @error('file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input @if($postEdit->active == 1) checked="checked" @endif name="active" type="checkbox" class="custom-control-input" id="customSwitch3">
                                        <label class="custom-control-label" for="customSwitch3">აქტიური</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input @if($postEdit->mtav == 1) checked="checked" @endif  name="mtav" type="checkbox" class="custom-control-input" id="customSwitch2">
                                        <label class="custom-control-label" for="customSwitch2">მთავარი</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">რედაქტირება</button>
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
