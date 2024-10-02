<header class="filter-title"><h3>{{ __('body.filters') }}</h3></header>

<label>
    {{ __('body.select_region') }}
</label>
<div class="form-group">
    <input type="hidden" id="regionsArray" value="{{ json_encode($regions->toArray()) }}">
    <select name="region" id="searchRegionSelect" class="searchRegionSelectChangeRegion">
        @foreach ($regions as $region)
            <option
                value="{{ $region->slug }}"
                data-url="{{ route('region.show', ['regionSlug' => $region->slug, 'date' => $currentDateHumanFormat]) }}"
                @if($region->slug === $regionSlug) selected @endif
            >{{ $region->name }}</option>
        @endforeach
    </select>
</div>

{{--<label>--}}
{{--    {{ __('body.select_city') }}--}}
{{--</label>--}}

@php
    $region = $regions->first(function ($region) use ($regionSlug) {
            return $region->slug === $regionSlug;
        });
@endphp

{{--<ul class="sidebar-navigation">--}}
{{--    @foreach ($region->cities as $city)--}}
{{--        <li>--}}
{{--            <a--}}
{{--                href="{{ route('location.show', ['regionSlug' => $regionSlug, 'locationSlug' => $city->slug]) }}">--}}
{{--                <i class="fa fa-map-marker"></i>--}}
{{--                <span>{{ $city->name }}</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}
{{--<div class="dropdown">--}}
{{--    <button class="btn btn-primary dropdown-toggle" type="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--        About Us--}}
{{--        <span class="caret"></span>--}}
{{--    </button>--}}
{{--    <ul class="dropdown-menu" aria-labelledby="about-us">--}}
{{--        <li><a href="#">Our Story</a></li>--}}
{{--        <li><a href="#">Our Team</a></li>--}}
{{--        <li><a href="#">Contact Us</a></li>--}}
{{--    </ul>--}}
{{--</div>--}}
