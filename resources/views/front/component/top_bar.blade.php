<div class="container d-flex justify-content-center justify-content-md-between">

    <div class="contact-info d-flex align-items-center">
        <a href="{{route('home')}}"><img src="{{asset('assets/img/logo_.png')}}" width="120" alt="დავის ალტერნატიული გადაწყვეტის ეროვნული ცენტრის ლოგო">  </a></div>
    <div class="top_text w-75 p3 h4 fw-bold align-self-center"
         @if(isset($locale) && $locale == 'en')
    style="font-family: 'BPG Banner ExtraSquare Caps', sans-serif;"
         @else
         style="font-family: 'BPG Nino Mtavruli', sans-serif;"
            @endif>
        <b class="headjav text-uppercase d-flex justify-content-center ">
            {{ __('site.tsu') }}
        </b>
        <b class="headncad text-uppercase d-flex justify-content-center ">
            {{ __('site.ncadr') }}
        </b>
    </div>
    <div class="social-links d-none d-md-flex align-items-center">
        <img src="{{asset('assets/img/logotsu.png')}}" width="100" alt="ივანე ჯავახიშვილის სახელობის თბილისის სახელმწიფო უნივერსიტეტის ლოგო">
    </div>
</div>
