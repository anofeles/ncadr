<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.component.head')
</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    @include('front.component.top_bar')
</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    @include('front.component.header')
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero">
    @include('front.component.slider')

</section><!-- End Hero -->
<div class="brankamp_head">
    <div class="d-flex">
        <div  class="mr-auto w-50">
            <div class="row">
                <span>ჩვენს შესახებ / ისტორია</span>
            </div>
            <h3>ისტორია</h3>
        </div>
        <div class="w-50 d-flex align-items-center">
            <div class="input-group rounded">
                <input type="search" class="form-control" placeholder="Search"/>
                <button type="submit" class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
<main id="main">

@yield('section')
<!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        @include('front.component.baner')
    </section><!-- End Clients Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    @include('front.component.footer')
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@include('front.component.script')
</body>

</html>
