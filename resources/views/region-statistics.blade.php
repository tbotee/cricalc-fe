@extends('layouts.app')

@section('bodyProps')
    class="page-sub-page page-profile page-account" id="page-top"
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Account</a></li>
            <li class="active">Profile</li>
        </ol>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-2">
                <section id="sidebar">
                    <aside id="edit-search">
                        <header><h3>{{ __('apartment.apartment_statistics') }}</h3></header>
                        <x-forms.search-box/>
                    </aside>
                </section>
            </div>
            <div class="col-md-9 col-sm-10">
                <section id="fun-facts" class="counting-numbers">
                    <header><h1>{{ __('body.select_city') }} {{ $lastStatisticalDate }}</h1></header>
                    <div class="row fun-facts">
                        @foreach ($statisticalData['aggregatedData'] as $cityStatistics)
                            <div class="agency" >
                                <a href="{{ route('location.show', ['regionSlug' => $regionSlug, 'locationSlug' => $cityStatistics['city']->slug]) }}" class="agency-image v-align-top">
                                    <div class="number-wrapper">
                                        <h2 class="text-center no-margin">{{ $cityStatistics['city']->name }}</h2>
                                        <h3 class="text-center no-margin"></h3>
                                        <div class="number" data-from="1" data-to="{{ $cityStatistics['total_count'] }}">
                                            {{ $cityStatistics['total_count'] }}
                                        </div>
                                        <figure>{{ __('body.apartment_count') }}</figure>
                                    </div>
                                </a>
                                <div class="wrapper">
                                    <header>
                                        <a href="{{ route('location.show', ['regionSlug' => $regionSlug, 'locationSlug' => $cityStatistics['city']->slug]) }}">
                                            <h2>{{ __('body.view_more') }}</h2>
                                        </a>
                                    </header>
                                    <dl class="w-100">
                                        <dt>{{ $cityStatistics['one_room_count']->average_count ?? 0 }} {{ __('body.one_bedroom_apartments') }}</dt>
                                        <dd>
                                            {{ __('body.average_price') }} {{ $cityStatistics['one_room_count']->av_price ?? 0 }}
                                        </dd>
                                        <dt>{{ $cityStatistics['two_room_count']->average_count ?? 0 }} {{ __('body.two_room_apartments') }}</dt>
                                        <dd>
                                            {{ __('body.average_price') }} {{ $cityStatistics['two_room_count']->av_price ?? 0 }}
                                        </dd>
                                        <dt>{{ $cityStatistics['three_room_count']->average_count ?? 0 }} {{ __('body.three_bedroom_apartments') }}</dt>
                                        <dd>
                                            {{ __('body.average_price') }} {{ $cityStatistics['three_room_count']->av_price ?? 0 }}
                                        </dd>
                                        <dt>{{ $cityStatistics['four_room_count']->average_count ?? 0 }} {{ __('body.four_bedroom_apartments') }}</dt>
                                        <dd>
                                            {{ __('body.average_price') }} {{ $cityStatistics['four_room_count']->av_price ?? 0 }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>

    @if ($setSelectedRegion)
        <script>
            const regionSlug = @json($regionSlug);
            localStorage.setItem('searchRegionSelect', regionSlug);
            localStorage.removeItem("searchLocationSelect");
        </script>
    @endif

@endsection
