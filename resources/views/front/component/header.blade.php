<div class="container d-flex justify-content-between align-items-center">

{{--    <div class="logo">--}}
{{--        <h1><a href="index.html">Eterna</a></h1>--}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
{{--    </div>--}}

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="active" href="{{route('home')}}">ჩვენს შესახებ</a></li>
            <li><a href="{{route('new')}}">სიახლეები</a></li>
            <li><a href="#">ADR მომსახურება</a></li>
            <li><a href="#">ტრენინგები</a></li>
            <li><a href="{{route('them')}}">პროექტები</a></li>
            <li><a href="{{route('kodex')}}">პუბლიკაციები</a></li>
            <li class="dropdown"><a href="#"><span>ბიბლიოთეკა</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 2</a></li>
                    <li><a href="#">Drop Down 3</a></li>
                    <li><a href="#">Drop Down 4</a></li>
                </ul>
            </li>
            <li><a href="#">გალერეა</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <div class="d-flex flex-row-reverse">
        <div class="p-2 d-flex align-items-center">
            <a href="#">ENG</a>
        </div>
    </div>
</div>