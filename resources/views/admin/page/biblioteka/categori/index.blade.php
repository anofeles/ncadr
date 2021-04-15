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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-app bg-success" href="{{route('admin.biblioteka', ['locale' => $locale])}}">
                                წიგნები
                            </a>
                            <a class="btn btn-app bg-success" href="{{route('admin.biblioteka.categorIndex', ['locale' => $locale])}}">
                                კატეგორია
                            </a>
                            <a class="btn btn-app bg-success" href="{{route('admin.biblioteka.lamguage', ['locale' => $locale])}}">
                                ენები
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-app"
                                           href="{{route('admin.biblioteka.categorIndex.add', ['locale' => $locale])}}">
                                            <i class="fas fa-plus-square"></i> add
                                        </a>
                                        <table id="example2"
                                               class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                                               aria-describedby="example2_info">
                                            <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">
                                                    id
                                                </th>
                                                <th rowspan="1" colspan="1">
                                                    სათაური
                                                </th>
                                                <th rowspan="1" colspan="1">
                                                    კოდი
                                                </th>
                                                <th rowspan="1" colspan="1">
                                                    წელი
                                                </th>
                                                <th rowspan="1" colspan="1">
                                                    აქტივობა
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categori as $categoriitem)
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1"
                                                        tabindex="0">{{$categoriitem->bookCatId}}</td>
                                                    <td>{{$categoriitem->bookCatNameGeo}}</td>
                                                    <td>{{$categoriitem->code}}</td>
                                                    <td>{{$categoriitem->creationDate}}</td>
                                                    <td>
                                                        <a class="btn btn-app"
                                                           href="{{route('admin.edit.biblioteka.categorIndex', ['postid'=>$categoriitem->bookCatId,'locale' => $locale])}}">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <a class="btn btn-app"
                                                           href="{{route('admin.delete.biblioteka.categorIndex', ['postid'=>$categoriitem->bookCatId,'locale' => $locale])}}">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">id</th>
                                                <th rowspan="1" colspan="1">სათაური</th>
                                                <th rowspan="1" colspan="1">კოდი</th>
                                                <th rowspan="1" colspan="1">წელი</th>
                                                <th rowspan="1" colspan="1">აქტივობა</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <div class="container">
                                            @foreach ($categori as $user)
                                                {{ $user->name }}
                                            @endforeach
                                        </div>

                                        {{ $categori->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
