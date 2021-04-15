@extends('front.layouts.index')
@section('section')

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">
                @if(isset($dam_menu[0]) && !empty($dam_menu[0]))
                    <div class="col-lg-8 entries">
                        @else
                            <div class="col-lg-10 entries">
                                @endif
                                @foreach($post as $postitem)
                                    <article class="entry">
                                        <div class="entry-img">
                                            @if(empty($postitem->img))
                                                <img src="{{asset('assets/img/logo_.png"')}}" class="img-fluid" alt="">
                                            @else
                                                <img src="{{asset('images/post/'.$postitem->img)}}" class="img-fluid"
                                                     alt="">
                                            @endif
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="{{route('home.full',['locale'=>$postitem->locale,'postid'=>$postitem->id])}}">{{$postitem->title}}</a>
                                        </h2>
                                        <div class="entry-content">
                                            <p>{!! $postitem->desc !!}</p>
                                            @if(isset($postitem->author) && !empty($postitem->author))
                                                <div>
                                                    {{$postitem->author}}
                                                </div>
                                            @endif
                                            <div class="read-more">
                                                <a href="{{route('home.full',['locale'=>$postitem->locale,'postid'=>$postitem->id])}}">{{__('site.Read_More')}}</a>
                                            </div>
                                        </div>
                                    </article><!-- End blog entry -->
                                @endforeach
                            </div><!-- End blog entries list -->

                            @if(isset($dam_menu[0]) && !empty($dam_menu[0]))
                                <div class="col-lg-4">
                                    <div class="sidebar them_cat">
                                        <h3 class="sidebar-title">Categories</h3>
                                        <div class="sidebar-item categories">
                                            <ul>
                                                @foreach($dam_menu as $dam_menuitem)
                                                    <li>
                                                        <a
                                                                @if(isset($locale) && $locale == 'en')
                                                                style="font-family: 'BPG Banner ExtraSquare Caps', sans-serif;"
                                                                @else
                                                                style="font-family: 'BPG Nino Mtavruli', sans-serif;"
                                                                @endif
                                                                href="{{route('home.post',['locale'=>$dam_menuitem->locale,'type'=>$dam_menuitem->type,'mid'=>$dam_menuitem->id,'slug'=>$dam_menuitem->slug])}}">{{$dam_menuitem->title}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div><!-- End sidebar categories-->
                                    </div><!-- End sidebar -->
                                </div><!-- End blog sidebar -->
                            @endif

                    </div>
                    <div class="container">
                        @foreach ($post as $user)
                            {{ $user->name }}
                        @endforeach
                    </div>

                    {{ $post->links() }}
            </div>
    </section>

@endsection
