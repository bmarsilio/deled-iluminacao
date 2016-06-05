<div id="carousel-example-generic" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators hidden-xs">

        @foreach($banners as $i => $banner)

            @if($i == 0)
                {{--*/ $class = 'active' /*--}}
            @else
                {{--*/ $class = '' /*--}}
            @endif

            <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="{{ $class }}"></li>

        @endforeach

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

        @foreach($banners as $i => $banner)

            @if($i == 0)
                {{--*/ $class = 'active' /*--}}
            @else
                {{--*/ $class = '' /*--}}
            @endif

            <div class="item {{ $class }}">
                <img class="img-responsive img-full" src="{{ url('uploads/banners/banner_'.$banner->id.'.'.$banner->extensao) }}" alt="">
            </div>
        @endforeach

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>
