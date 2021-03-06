<div class="container d-flex justify-content-between align-items-center">

{{--    <div class="logo">--}}
{{--        <h1><a href="index.html">NCADR</a></h1>--}}
<!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    {{--    </div>--}}

    <nav id="navbar" class="navbar">
        <ul>
            @foreach($menu as $menuitem)
                @if(isset($menuitem->locale) && !empty($menuitem->locale))
                    <li
                            @foreach($dam_seting as $dam_setingitem)
                            @if($menuitem->id == $dam_setingitem->id )class="dropdown" @endif
                            @endforeach
                    >
                        <a
                                @if(isset($locale) && $locale == 'en')
                                style="font-family: 'BPG Banner ExtraSquare Caps', sans-serif;"
                                @else
                                style="font-family: 'BPG Nino Mtavruli', sans-serif;"
                                @endif
                                href="{{route('home.post',['locale'=>$menuitem->locale,'type'=>$menuitem->type,'mid'=>$menuitem->id,'slug'=>$menuitem->slug])}}">{{$menuitem->title}}
                            @foreach($dam_seting as $dam_setingitem)
                                @if($menuitem->id == $dam_setingitem->id )<i class="bi bi-chevron-down"></i> @endif
                            @endforeach
                        </a>
                        @foreach($dam_seting as $dam_setingitem)
                            @if($menuitem->id == $dam_setingitem->id )
                                <ul>
                                    @foreach($menuDam as $menuitemdam)
                                        @if($menuitemdam->menu_dam_id == $menuitem->id)
                                            <li>
                                                <a
                                                        @if(isset($locale) && $locale == 'en')
                                                        style="font-family: 'BPG Banner ExtraSquare Caps', sans-serif;"
                                                        @else
                                                        style="font-family: 'BPG Nino Mtavruli', sans-serif;"
                                                        @endif
                                                        href="{{route('home.post',['locale'=>$menuitemdam->locale,'type'=>$menuitemdam->type,'mid'=>$menuitemdam->id,'slug'=>$menuitemdam->slug])}}">{{$menuitemdam->title}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </li>
                @endif
            @endforeach
            {{--            <li><a class="active" href="{{route('home')}}">ჩვენს შესახებ</a></li>--}}
            {{--            <li><a href="{{route('new')}}">სიახლეები</a></li>--}}
            {{--            <li><a href="#">ADR მომსახურება</a></li>--}}
            {{--            <li><a href="#">ტრენინგები</a></li>--}}
            {{--            <li><a href="{{route('them')}}">პროექტები</a></li>--}}
            {{--            <li><a href="{{route('kodex')}}">პუბლიკაციები</a></li>--}}
            {{--            <li class="dropdown"><a href="#"><span>ბიბლიოთეკა</span> <i class="bi bi-chevron-down"></i></a>--}}
            {{--                <ul>--}}
            {{--                    <li><a href="#">Drop Down 1</a></li>--}}
            {{--                    <li><a href="#">Drop Down 2</a></li>--}}
            {{--                    <li><a href="#">Drop Down 3</a></li>--}}
            {{--                    <li><a href="#">Drop Down 4</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
            {{--            <li><a href="#">გალერეა</a></li>--}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <div class="d-flex">
        <div class="d-flex align-items-center" style="margin-right: 2rem !important;">
            @foreach($local as $localitem)
                @if($locale != $localitem->url)
                    <a href="{{route('home.locale',['locale'=>$localitem->url])}}">{{$localitem->title}}</a>
                @endif
            @endforeach
        </div>
    </div>
</div>
