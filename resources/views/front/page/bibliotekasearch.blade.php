@extends('front.layouts.index')
@section('section')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">{{__('site.lib_author1')}}</th>
                        <th scope="col">{{__('site.lib_year')}}</th>
                        <th scope="col">{{__('site.lib_number')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($librari as $k => $librariitem)
                        <tr>
                            <th scope="row">{{$k}}</th>
                            <td>
                                <a href="{{route('home.searchlibrari.id',['locale'=>$locale,'librariid'=>$librariitem->bookId])}}">
                                    {{$librariitem->title}}
                                </a>
                                | {{$librariitem->author}} | {{$librariitem->pub_company}}
                            </td>
                            <td>{{$librariitem->pub_year}}</td>
                            <td>{{$librariitem->quantity}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </section>
@endsection
