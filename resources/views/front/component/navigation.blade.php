<div class="brankamp_head" id="navgiation">
    <div class="d-flex">
        <div class="mr-auto w-50">
            @if(isset($navigacia[1]) && !empty($navigacia[1]))
                <div class="row">
                <span>
                         @foreach($navigacia[1] as $navigaciaitem)
                        @if(isset($navigaciaitem[0]->title))
                            {{$navigaciaitem[0]->title}} /
                        @endif
                    @endforeach
                    @foreach($navigacia[1] as $navigaciaitem)
                        @if(isset($navigaciaitem->title))
                            {{$navigaciaitem->title}}
                        @endif
                    @endforeach
                </span>
                </div>
            @endif
            @if(isset($navigacia[0]->title))
                <h3>{{$navigacia[0]->title}}</h3>
            @endif
        </div>
        <div class="w-50 d-flex align-items-center">
            <form class="input-group rounded" method="post" action="{{route('home.search')}}">
                @csrf
                <input type="search" name="search" class="form-control" placeholder="{{__('site.searcht')}}"/>
                <input type="hidden" name="locale" class="form-control" value="{{$locale}}"/>
                <button type="submit" class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
                        <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
