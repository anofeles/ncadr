@extends('front.layouts.index')
@section('section')

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row portfolio-container">

                @foreach($post as $postitem)
{{--                    @dd($postitem->file)--}}
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        @if(!empty($postitem->file))
                            <a href="{{asset('images/file/'.$postitem->file)}}" target="_blank">
                                @else
                                    <a href="{{route('home.full',['locale'=>$postitem->locale,'postid'=>$postitem->id])}}">
                                        @endif
                                        <div class="portfolio-wrap">

                                            @if(empty($postitem->img))
                                                <img src="{{asset('assets/img/logo_.png')}}" class="img-fluid" alt="">
                                            @else
                                                <img src="{{asset('images/post/'.$postitem->img)}}" class="img-fluid"
                                                     alt="">
                                            @endif

                                            <span>{{$postitem->title}}</span>
                                        </div>
                                    </a>
                    </div>
                @endforeach

            </div>
            <div class="container">
                @foreach ($post as $user)
                    {{ $user->name }}
                @endforeach
            </div>

            {{ $post->links() }}
        </div>
    </section><!-- End Portfolio Section -->

@endsection
