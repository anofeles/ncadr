@extends('front.layouts.index')
@section('section')

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 entries">
                    <article class="entry">
                        <div class="entry-img">
                            @if(empty($post->img))
                                <img src="{{asset('assets/img/logo_.png"')}}" class="img-fluid" alt="" width="100">
                            @else
                                <img src="{{asset('images/post/'.$post->img)}}" class="img-fluid" alt="">
                            @endif
                        </div>
                        <h2 class="entry-title">
                            {{$post->title}}
                        </h2>
                        <div class="entry-content">
                            @php($text = str_replace('source/','js/source/',$post->text))
                            {!! $post->text !!}
                            <div>
                                {{$post->author}}
                            </div>
                        </div>
                    </article><!-- End blog entry -->
                </div><!-- End blog entries list -->
            </div>
        </div>
    </section>
@endsection
