@extends('layouts.app')

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
                </section>
            </div>
            <div class="col-md-9 col-sm-10">
                <section id="agencies-listing">
                    <header><h1>{{ __('body.region_page_title', ['year' => $dateYear, 'month' => $dateMonth]) }} </h1></header>

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
                                            <dt>{{ $item['count'] }} {{__('body.aratmament_cu_x_camere', ['room_count' => array_search($item['category_id'], $categoryMapping)]) }} </dt>
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
