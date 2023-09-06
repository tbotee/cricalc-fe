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
                    <aside id="edit-search" class="m-b-20">
                        <x-forms.city-select-box :regionSlug="$regionSlug"/>
                    </aside>
                </section>
            </div>
            <div class="col-md-9 col-sm-10">
                <section id="fun-facts" class="counting-numbers">
                    <header><h1>{{ __('body.select_city') }} {{ $lastStatisticalDate }}</h1></header>
                    <div class="fun-facts">

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
