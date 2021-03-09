@extends('front.layouts.index')
@section('section')

    <!-- ======= Blog Section ======= -->
    <section class="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 entries">

                    <div class="accordion" id="accordionExample">
                        @foreach($post as $postitem)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne{{$postitem->id}}">
                                <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$postitem->id}}" aria-expanded="true" aria-controls="collapseOne{{$postitem->id}}">
                                    {{$postitem->title}}
                                </button>
                            </h2>
                            <div id="collapseOne{{$postitem->id}}" class="accordion-collapse collapse collapse" aria-labelledby="headingOne{{$postitem->id}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $postitem->text !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div><!-- End blog entries list -->
                @if(isset($dam_menu[0]) && !empty($dam_menu[0]))
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
    </section><!-- End Blog Section -->


@endsection
