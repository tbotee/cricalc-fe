@extends('layouts.app')

@section('title', __('meta.title_region_statistics', ['region' =>  $region->name]))
@section('meta_description', __('meta.meta_description_region_statistics', ['region' =>  $region->name]))
@section('meta_keywords', __('meta.meta_keywords_region_statistics', ['region' => $region->name]))

@section('bodyProps')
    class="page-sub-page page-profile page-account" id="page-top"
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a></li>
            <li class="active">{{ __('body.region_string_plus_name', ['region' => $region->name]) }}</li>
        </ol>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-2">
                <section id="sidebar">
                    <aside id="edit-search" class="m-b-20">
                        <x-forms.city-select-box :regionSlug="$regionSlug"/>
                    </aside>
                    <aside>
                        <x-your-ad-here class="vertical"/>
                    </aside>
                    <aside>
                        <label>{{ __('body.old_data') }}</label>
                        <ul class="sidebar-navigation">
                            <li class="{{ $isCurrent ? "active" : "" }}">
                                <a
                                    href="{{ route('region.show', ['regionSlug' => $regionSlug]) }}">
                                    <span>{{ __('body.current_date') }}</span>
                                </a>
                            </li>
                            @foreach($history as $date)
                                @if($date->created_at->year != $latestDateYear || $date->month != $latestDateMonth)
                                    <li class="{{ $date->created_at->year == $dateYear && $date->month == $dateMonth ? "active" : "" }}">
                                        <a
                                            href="{{ route('region.show', ['regionSlug' => $regionSlug, 'date' => $date->dateSlug]) }}">
                                            <span>{{ __('body.date_year_selector', ['year' => $date->created_at->year, 'month' => ucfirst($date->month)] ) }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </aside>
                </section>

            </div>
            <div class="col-md-9 col-sm-10">
                <section id="agencies-listing">
                    <header><h1>{{ __('body.region_page_title', ['year' => $dateYear, 'month' => $dateMonth, 'region' => $region->name]) }} </h1></header>
                    <p>{{ __('meta.meta_description_region_statistics', ['region' => $region->name]) }}</p>
                    <div class="fun-facts no-line">
                        @foreach ($data as $cityStatistics)
                            <div class="agency" >
{{--                                <a href="{{ route('location.show', ['regionSlug' => $regionSlug, 'locationSlug' => $cityStatistics['citySlug']]) }}" class="agency-image v-align-top">--}}
                                    <a class="agency-image v-align-top" href="javascript:void(0);">
                                        <div class="number-wrapper">
                                            <h2 class="text-center no-margin">{{ $cityStatistics['cityName'] }}</h2>
                                            <h3 class="text-center no-margin"></h3>
                                            <div class="number" data-from="1" data-to="{{ $cityStatistics['total'] }}">
                                                {{ $cityStatistics['total'] }}
                                            </div>
                                            <figure>{{ __('body.apartment_count') }}</figure>
                                        </div>
                                    </a>
{{--                                </a>--}}
                                <div class="wrapper">
                                    <dl class="w-100">
                                        @foreach ($cityStatistics['items'] as $item)
                                            <dt>{{ $item['count'] }} {{__('body.apartment_cu_x_camere', ['room_count' => array_search($item['category_id'], $categoryMapping)]) }} </dt>
                                            <dd>
                                                €{{ number_format($item['average_price'], 0, ',', '.') }}
                                            </dd>
                                        @endforeach
                                    </dl>
{{--                                    <a class="btn pull-right btn-default" href="{{ route('location.show', ['regionSlug' => $regionSlug, 'locationSlug' => $cityStatistics['citySlug']]) }}">--}}
{{--                                        {{ __('body.details') }}--}}
{{--                                    </a>--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>

{{--    @if ($setSelectedRegion)--}}
{{--        <script>--}}
{{--            const regionSlug = @json($regionSlug);--}}
{{--            localStorage.setItem('searchRegionSelect', regionSlug);--}}
{{--            localStorage.removeItem("searchLocationSelect");--}}
{{--        </script>--}}
{{--    @endif--}}

@endsection
