<header><h3>{{ __('body.filters') }}</h3></header>

<label>
    {{ __('body.select_city') }}
</label>
<div class="form-group">
    <input type="hidden" id="regionsArray" value="{{ json_encode($regions->toArray()) }}">

    <select name="region" id="searchRegionSelect" class="searchRegionSelectChangeRegion">
        @foreach ($regions as $region)
            <option
                value="{{ $region->slug }}"
                data-url="{{ route('region.show', ['regionSlug' => $region->slug, 'date' => $currentDate]) }}"
                @if($region->slug === $regionSlug) selected @endif
            >{{ $region->name }}</option>
        @endforeach
    </select>
</div>
{{--<ul class="sidebar-navigation">--}}
{{--    @foreach ($regions->where('slug', $regionSlug)->first()->cities as $city)--}}
{{--        <li>--}}
{{--            <a href="{{ route('location.show', ['regionSlug' => $regionSlug, 'locationSlug' => $city->slug]) }}">--}}
{{--                <i class="fa fa-home"></i>--}}
{{--                <span>{{ $city->name }}</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}

{{--<ul class="sidebar-navigation thinner">--}}
{{--    @foreach ($regions as $region)--}}
{{--        <li>--}}
{{--            <a href="{{ route('region.show', ['regionSlug' => $region['slug'], 'date' => $currentDateHumanFormat]) }}">--}}
{{--                <i class="fa fa-home"></i>--}}
{{--                {{ $region['name'] }}--}}
{{--            </a>--}}
{{--            <a href="{{ route('location.show', ['regionSlug' => $regionSlug, 'locationSlug' => $city->slug]) }}">--}}
{{--                <i class="fa fa-home"></i>--}}
{{--                <span>{{ $city->name }}</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>--}}
