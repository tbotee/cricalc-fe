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
                data-url="{{ route('region.show', ['regionSlug' => $region->slug]) }}"
                @if($region->slug === $regionSlug) selected @endif
            >{{ $region->name }}</option>
        @endforeach
    </select>
</div>



@php
    $region = $regions->first(function ($region) use ($regionSlug) {
            return $region->slug === $regionSlug;
        });
@endphp

@if($region && !empty($region) && !empty($region->cities))

    <label>
        {{ __('body.select_city') }}
    </label>
    <ul class="sidebar-navigation">
        @foreach ($region->cities as $city)

            <li class="{{ $city->slug == $locationSlug ? 'active' : '' }}">
                <a
                    href="{{ route('location.show', ['regionSlug' => $regionSlug, 'locationSlug' => $city->slug]) }}">
                    <i class="fa fa-map-marker"></i>
                    <span>{{ $city->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>
@endif
