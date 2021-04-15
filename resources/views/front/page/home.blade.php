@extends('front.layouts.index')
@section('section')

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            @if(isset($post->title) && !empty($post->title))
                <div class="row">
                    <div class="col-lg-6">
                        @if(empty($post->img))
                            <img src="{{asset('assets/img/logo_.png')}}" class="img-fluid" alt="">
                        @else
                            <img src="{{asset('images/post/'.$post->img)}}" class="img-fluid" alt="">
                        @endif
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>{{$post->title}}</h3>
                        <p>
                            {!! $post->desc !!}
                        </p>
                        <div class="read-more">
                            <a href="{{route('home.full',['locale'=>$post->locale,'postid'=>$post->id])}}">{{__('site.Read_More')}}</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="row">
                @foreach($news as $newsitem)
                    @if(isset($newsitem->locale) && !empty($newsitem->locale))
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-file"></i></div>
                                <h4>
                                    <a href="{{route('home.full',['locale'=>$newsitem->locale,'postid'=>$newsitem->id])}}">{{$newsitem->title}}</a>
                                </h4>
                                <p>{!! $newsitem->desck !!}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            @if(isset($blog->title) && !empty($blog->title))
                <div class="row">
                    <div class="col-lg-6">
                        @if(empty($blog->img))
                            <img src="{{asset('assets/img/logo_.png')}}" class="img-fluid" alt="">
                        @else
                            <img src="{{asset('images/post/'.$blog->img)}}" class="img-fluid" alt="">
                        @endif
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>{{$blog->title}}</h3>
                        <p>
                            {!! $blog->desc !!}
                        </p>
                        <div class="read-more">
                            <a href="{{route('home.full',['locale'=>$blog->locale,'postid'=>$blog->id])}}">{{__('site.Read_More')}}</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section><!-- End About Section -->

@endsection
