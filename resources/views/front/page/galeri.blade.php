@extends('front.layouts.index')
@section('section')

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row portfolio-container">

                @foreach($post as $postitem)

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <a href="{{route('home.galfull',['locale'=>$postitem->locale,'galtid'=>$postitem->id])}}">
                            <div class="portfolio-wrap">
                                @if(empty($postitem->img))
                                    <img src="{{asset('assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('images/galeri/yda/'.$postitem->img)}}" class="img-fluid" alt="">
                                @endif
                                <span>{!! $postitem->title !!}</span>
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
