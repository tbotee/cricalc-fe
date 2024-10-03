@extends('layouts.app')

@section('title', __('meta.title_home'))
@section('meta_description', __('meta.meta_description_home'))
@section('meta_keywords', __('meta.meta_keywords_home'))

@section('bodyProps')
    class="page-homepage navigation-fixed-top page-slider page-slider-search-box" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90"
@endsection

@section('slider')
    <div id="slider" class="loading has-parallax">
        <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
        <div class="owl-carousel homepage-slider carousel-full-width">
            @php $index = 1; @endphp
            @foreach ($banner_data as $cityStatistics)
                <div class="slide">
                    <div class="container">
                        <div class="overlay">
                            <div class="info">
                                <div class="tag price">{{ __('body.average_price', ['price' => $cityStatistics->formattedPrice]) }}</div>
                                <h3>{{__('body.apartment_cu_x_camere_plural', ['room_count' => array_search($cityStatistics->category_id, $categoryMapping)]) }}</h3>
                                <figure>{{ $cityStatistics->city->name  }}</figure>
                            </div>
                            <hr>
                            <a href="{{ route('region.show', ['regionSlug' => $cityStatistics->city->region->slug, 'date' => $currentDateHumanFormat]) }}"
                               class="link-arrow">{{ __('body.read_more')  }}</a>
                        </div>
                    </div>
                    <img alt="" src="{{ asset('img/custom-slide-' . ($index). '.jpg') }}">
                    @php $index++; @endphp
                </div>
            @endforeach
        </div>
    </div>
    <!-- end Slider -->

    <!-- Search Box -->
    <div class="search-box-wrapper">
        <div class="search-box-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8">
                        <div class="search-box map">
                            <x-forms.search-box showTitle="true"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <x-city-listing :statistics_data="$one_room_apartments" :title="__('body.cheapest_cities_with_1_rooms')"/>
{{--    <div class="container">--}}
{{--        <x-your-ad-here />--}}
{{--    </div>--}}
    <x-city-listing :statistics_data="$two_room_apartments"
                    :title="__('body.cheapest_cities_with_x_rooms', ['room_count' => config('constants.apartment_types')['2-camere']])"/>
{{--    <div class="container">--}}
{{--        <x-your-ad-here />--}}
{{--    </div>--}}
    <x-city-listing :statistics_data="$three_room_apartments"
                    :title="__('body.cheapest_cities_with_x_rooms', ['room_count' => config('constants.apartment_types')['3-camere']])"/>
    <div class="container">
        <x-your-ad-here />
    </div>
    <x-city-listing :statistics_data="$four_room_apartments"
                    :title="__('body.cheapest_cities_with_x_rooms', ['room_count' => config('constants.apartment_types')['4-camere']])"/>
@endsection
