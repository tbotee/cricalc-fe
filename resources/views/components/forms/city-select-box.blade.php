<header><h3>{{ __('apartment.apartment_statistics') }}</h3></header>
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
