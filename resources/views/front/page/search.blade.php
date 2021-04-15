@extends('front.layouts.index')
@section('section')

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row portfolio-container">
                @foreach($search as $searchtem)
                    <div class="col-lg-12 col-md-6 portfolio-item filter-app">
                        <a href="{{route('home.full',['locale'=>$searchtem->locale,'postid'=>$searchtem->id])}}">
                            <div class="portfolio-wrap">
                                <span>
                            {!! $searchtem->title !!}
                             </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

@endsection
