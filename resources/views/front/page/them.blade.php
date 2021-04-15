@extends('front.layouts.index')
@section('section')

    <!-- ======= Blog Section ======= -->
    <section class="team">
        <div class="container">
            <div class="row">

                @foreach($post as $postitem)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up"
                         data-aos-delay="300">
                        <div class="member">
                            <div class="member-img">
                                @if(empty($postitem->img))
                                    <img src="{{asset('assets/img/logo_.png"')}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{asset('images/post/'.$postitem->img)}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div class="member-info">
                                @if(!empty($postitem->file))
                                    <a href="{{asset('images/post/'.$postitem->file)}}" target="_blank">
                                        @else
                                            <a href="{{route('home.full',['locale'=>$postitem->locale,'postid'=>$postitem->id])}}">
                                                @endif
                                                <h4>{{$postitem->title}}</h4>

                                                <span>{{$postitem->enploi}}</span>
                                            </a>
                            </div>
                        </div>
                    </div>
                @endforeach


                {{--                <div class="col-lg-12 entries" style="margin: 0 auto;">--}}
                {{--                    @foreach($post as $postitem)--}}
                {{--                    <div class="col-lg-2 col-md-6 d-flex align-items-stretch" style="float: left">--}}
                {{--                        <a href="{{route('home.full',['locale'=>$postitem->locale,'postid'=>$postitem->id])}}">--}}
                {{--                        <div class="member">--}}
                {{--                            @if(empty($postitem->img))--}}
                {{--                                <img src="{{asset('assets/img/logo_.png"')}}" class="img-fluid" alt="">--}}
                {{--                            @else--}}
                {{--                                <img src="{{asset('images/post/'.$postitem->img)}}" class="img-fluid" alt="">--}}
                {{--                            @endif--}}
                {{--                            <h6>{{$postitem->author}}</h6>--}}
                {{--                        </div>--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                    @endforeach--}}
                {{--                </div><!-- End blog entries list -->--}}

                {{--                @if(isset($dam_menu[0]) && !empty($dam_menu[0]))--}}
                {{--                    <div class="col-lg-4">--}}
                {{--                        <div class="sidebar them_cat">--}}
                {{--                            <h3 class="sidebar-title">Categories</h3>--}}
                {{--                            <div class="sidebar-item categories">--}}
                {{--                                <ul>--}}
                {{--                                    @foreach($dam_menu as $dam_menuitem)--}}
                {{--                                        <li><a href="{{route('home.post',['locale'=>$dam_menuitem->locale,'type'=>$dam_menuitem->type,'mid'=>$dam_menuitem->id,'slug'=>$dam_menuitem->slug])}}">{{$dam_menuitem->title}}</a></li>--}}
                {{--                                    @endforeach--}}
                {{--                                </ul>--}}
                {{--                            </div><!-- End sidebar categories-->--}}
                {{--                        </div><!-- End sidebar -->--}}
                {{--                    </div><!-- End blog sidebar -->--}}
                {{--                @endif--}}

            </div>
        </div>
    </section><!-- End Blog Section -->


@endsection
