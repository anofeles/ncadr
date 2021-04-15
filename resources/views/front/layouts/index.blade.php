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

<main id="main">
@include('front.component.navigation')

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
