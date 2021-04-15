
<div class="footer-newsletter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>{{__('site.subakriber_news')}}</h4>
                <p>{{__('site.subakriber_news_title')}}</p>
            </div>
            <div class="col-lg-6">
                <form action="{{route('home.subscribe')}}" method="post">
                    @csrf
                    <input class="@error('subscribe') is-invalid @enderror" type="email" name="subscribe"><input type="submit" value=" {{__('site.sub_but')}}">

                </form>
                @error('subscribe')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="footer-top">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
             <h4>{{__('site.contact')}}</h4>
                          <strong> {{__('site.contact_t')}}</strong>
              {{__('site.contact_text')}}
                 {{__('site.contact_add1')}} <br>
                   <strong> {{__('site.contact_tel')}}</strong> +995 77 94 97 78<br>
                  <strong> {{__('site.contact_email')}} </strong> apply.ncard@tsu.ge<br>

                <div class="social-links mt-3">
                    <a href="https://www.facebook.com/TsuNationalCenterForAdr" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 footer-info">
                <form action="{{route('home.contaqtncadr')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{__('site.form_name')}}</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{__('site.form_email')}}</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{__('site.form_text')}}</label>
                        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('site.form_send')}}</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-6 footer-info">
                <h3>NCADR</h3>
                @if(isset($locale) && $locale == 'en')
                <p style="text-align: justify;">Development of the web-site was made possible by the generous support of the American people through the United States Agency for International Development (USAID). The contents of the web-page are the responsibility of NCADR and do not necessarily reflect the views of the East West Management Institute Inc. , the United States Agency for International Development or the United States Government</p>
                @else
                    <p style="text-align: justify;">საიტის შექმნა ამერიკელი ხალხის გულისხმიერების შედეგად, USAID-ის დახმარებით გახდა შესაძლებელი. ვებ-გვერდზე განთავსებული მასალა ქვეყნდება NCADR-ის პასუხისმგებლობით და შესაძლოა არ გამოხატავდეს USAID-ის, ამერიკის შეერთებული &nbsp;შტატების მთავრობის ან აღმოსავლეთ-დასავლეთის &nbsp;მართვის ინსტიტუტის მოსაზრებებს</p>
                @endif
                <img src="{{asset('assets/img/usaidgeo.jpg')}}" alt="აშშ-ის საერთაშორისო განვითარების სააგენტოს ლოგო" width="225">
                <img src="{{asset(__('site.ewmi_baner1'))}}" alt="აღმოსავლეთ-დასავლეთის მართვის ინსტიტუტის ლოგო" width="185">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="copyright">&copy; {{__('site.form_copy')}}
         <strong><span>NCADR</span></strong></div>
</div>
