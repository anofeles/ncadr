@extends('front.layouts.index')
@section('section')

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 entries">
                    @foreach($post as $postitem)
                        <article class="entry">
                            <div class="entry-img">
                                @if(empty($postitem->img))
                                    <img src="{{asset('assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('images/post/'.$postitem->img)}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <h2 class="entry-title">
                                <a href="blog-single.html">{{$postitem->title}}</a>
                            </h2>
                            <div class="entry-content">
                                <p>{!! $postitem->text !!}</p>
                                <div class="read-more">
                                    <a href="blog-single.html">Read More</a>
                                </div>
                            </div>
                        </article><!-- End blog entry -->
                    @endforeach
                </div><!-- End blog entries list -->
            </div>
        </div>
    </section><!-- End Portfolio Section -->

@endsection
