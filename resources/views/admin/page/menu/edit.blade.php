@extends('admin.layouts.admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>მენიუს </h1>
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
                            <h3 class="card-title">რედაქტირება</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('admin.menu.edit',['postid'=>$menuedit->id,'locale'=>$locale])}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">სათაური</label>
                                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="სათაური" value="{{ $menuedit->title }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">slug</label>
                                    <input name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="slug" value="{{ $menuedit->slug }}">
                                    @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">სორტირება</label>
                                    <input name="sort" type="text" class="form-control @error('sort') is-invalid @enderror" id="exampleInputEmail1"
                                           placeholder="სორტირება" value="{{ $menuedit->sort }}">
                                    @error('sort')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>ქვემენიუ</label>
                                        <select class="custom-select" name="menu_id">
                                            <option value="0">მთავარი მენიუ</option>
                                            @foreach($aboutMenu as $aboutMenuitem)
                                                <option @if($menuedit->id == $aboutMenuitem->id) selected="selected" @endif
                                                    value="{{$aboutMenuitem->id}}">{{$aboutMenuitem->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--                                <div class="form-group">--}}
                                {{--                                    <!-- select -->--}}
                                {{--                                    <div class="form-group">--}}
                                {{--                                        <label>ენა</label>--}}
                                {{--                                        <select class="custom-select" name="locale">--}}
                                {{--                                            @foreach($local as $localitem)--}}
                                {{--                                                <option--}}
                                {{--                                                    value="{{$localitem->url}}">{{$localitem->title}}</option>--}}
                                {{--                                            @endforeach--}}
                                {{--                                        </select>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="form-group">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>ტიპი</label>
                                        <select class="custom-select" name="type">
                                            <option  @if($menuedit->type == 'POST') selected="selected" @endif value="POST">პოსტი</option>
                                            <option  @if($menuedit->type == 'NEWS') selected="selected" @endif value="NEWS">სიახლე</option>
                                            <option  @if($menuedit->type == 'CODEX') selected="selected" @endif value="CODEX">კოდექსი</option>
                                            <option  @if($menuedit->type == 'THEM') selected="selected" @endif value="THEM">თნამშრომლები</option>
                                            <option  @if($menuedit->type == 'BLOG') selected="selected" @endif  value="BLOG">ბლოგი</option>
                                            <option @if($menuedit->type == 'GALERI') selected="selected" @endif value="GALERI">გალერეა</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input @if($menuedit->active == 1) checked="checked" @endif name="active" type="checkbox" class="custom-control-input" id="customSwitch3">
                                        <label class="custom-control-label" for="customSwitch3">აქტიური</label>
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
