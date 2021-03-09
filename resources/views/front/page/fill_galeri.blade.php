@extends('front.layouts.index')
@section('section')
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                @foreach($galmedia as $galmediaitem)
                <div class="gallery_product col-sm-3 col-xs-6 filter category1">
                    <a class="fancybox" rel="ligthbox" href="{{asset('images/galeri/'.$galmediaitem->img.'')}}">
                        <img class="img-responsive" alt="" src="{{asset('images/galeri/'.$galmediaitem->img.'')}}" width="300" />
                        <div class='img-info'>
                            <p>{{$galmediaitem->title}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
