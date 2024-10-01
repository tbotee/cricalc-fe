<form role="form"
      id="home-search-form"
      class="form-map form-search"
      method="post"
      action="{{ route('welcome.search') }}"
>
    @csrf
    @if ($showTitle)
        <h2>{{ __('body.select_region') }}</h2>
    @endif
    <input type="hidden" id="regionsArray" value="{{ json_encode($regions->toArray()) }}">
    <div class="form-group">
        <select name="region" id="searchRegionSelect">
            <option value="">{{ __('body.select_region') }}</option>
            @foreach ($regions as $region)
                <option value="{{ $region->slug }}">{{ $region->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">{{ __('body.show_prices') }}</button>
    </div>
</form>
