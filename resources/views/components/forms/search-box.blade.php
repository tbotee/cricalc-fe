<form role="form"
      id="home-search-form"
      class="form-map form-search"
      method="post"
      action="{{ route('welcome.search') }}"
>
    @csrf
    @if ($showTitle)
        <h2>{{ __('apartment.apartment_statistics') }}</h2>
    @endif
    <input type="hidden" id="regionsArray" value="{{ json_encode($regions->toArray()) }}">
    <div class="form-group">
        <select name="region" id="searchRegionSelect">
            <option value="">{{ __('apartment.region') }}</option>
            @foreach ($regions as $region)
                <option value="{{ $region->slug }}">{{ $region->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <select name="city" id="searchLocationSelect">
            <option value="">{{ __('apartment.city') }}</option>
        </select>
    </div>
    <div class="form-group">
        <select name="numberOfRooms" id="roomNumber">
            <option value="">{{ __('apartment.type') }}</option>
            <option value="{{ $apartmentTypes[0] }}">{{ __('apartment.one_room') }}</option>
            <option value="{{ $apartmentTypes[1] }}">{{ __('apartment.two_rooms') }}</option>
            <option value="{{ $apartmentTypes[2] }}">{{ __('apartment.three_rooms') }}</option>
            <option value="{{ $apartmentTypes[3] }}">{{ __('apartment.four_rooms') }}</option>
        </select>
    </div>
{{--    <div class="form-group">--}}
{{--        <div class="price-range">--}}
{{--            <input id="price-input" type="text" name="price" value="1000;299000">--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group">
        <button type="submit" class="btn btn-default">{{ __('body.search') }}</button>
    </div>
</form>
