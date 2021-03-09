@extends('front.layouts.index')
@section('section')

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8 entries">
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
                            <p>{!! $postitem->desc !!}</p>
                            <div class="read-more">
                                <a href="blog-single.html">Read More</a>
                            </div>
                        </div>
                    </article><!-- End blog entry -->
                    @endforeach
                </div><!-- End blog entries list -->

                @if(isset($dam_menu) && !empty($dam_menu))
                    <div class="col-lg-4">
                        <div class="sidebar them_cat">
                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    @foreach($dam_menu as $dam_menuitem)
                                        <li><a href="{{route('home.post',['locale'=>$dam_menuitem->locale,'type'=>$dam_menuitem->type,'mid'=>$dam_menuitem->id,'slug'=>$dam_menuitem->slug])}}">{{$dam_menuitem->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End sidebar categories-->
                        </div><!-- End sidebar -->
                    </div><!-- End blog sidebar -->
                @endif

            </div>

        </div>
    </section>

@endsection
