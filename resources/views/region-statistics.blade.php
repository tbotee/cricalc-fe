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
                    <header><h1>{{ __('body.select_city') }}</h1></header>
                    <div class="row fun-facts d-flex">
                        @foreach ($statisticalData['aggregatedData'] as $cityStatistics)
                            <div class="col">
                                <div class="number-wrapper">
                                    <h3 class="text-center no-margin">{{ $cityStatistics['city']->name }}</h3>
                                    <div class="number" data-from="1" data-to="{{ $cityStatistics['statistics'][0]->totalCount }}">
                                        {{ $cityStatistics['statistics'][0]->totalCount }}
                                    </div>
                                    <figure>{{ __('body.apartment_count') }}</figure>
                                    <a href="{{ route('location.show', ['regionSlug' => $regionSlug, 'locationSlug' => $cityStatistics['city']->slug]) }}" class="link-arrow">{{ __('body.read_more') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <section id="agencies-listing">
                    <header><h1>Agencies Listing</h1></header>
                    <div class="agency">
                        <a href="agency-detail.html" class="agency-image"><img alt="" src="assets/img/agency-logo-01.png"></a>
                        <div class="wrapper">
                            <header><a href="agency-detail.html"><h2>Genius Properties</h2></a></header>
                            <dl>
                                <dt>Phone:</dt>
                                <dd>(123) 456 789</dd>
                                <dt>Mobile:</dt>
                                <dd>888 123 456 789</dd>
                                <dt>Email:</dt>
                                <dd><a href="mailto:#">agency@example.com</a></dd>
                                <dt>Skype:</dt>
                                <dd>genius.properties</dd>
                            </dl>
                            <address>
                                <strong>Address</strong>
                                <br>
                                <strong>Genius Properties</strong><br>
                                4877 Spruce Drive<br>
                                West Newton, PA 15089
                            </address>
                        </div>
                    </div><!-- /.agency -->
                    <div class="agency">
                        <a href="agency-detail.html" class="agency-image"><img alt="" src="assets/img/agency-logo-02.png"></a>
                        <div class="wrapper">
                            <header><a href="agency-detail.html"><h2>House Trusted</h2></a></header>
                            <dl>
                                <dt>Phone:</dt>
                                <dd>(123) 456 789</dd>
                                <dt>Mobile:</dt>
                                <dd>888 123 456 789</dd>
                                <dt>Email:</dt>
                                <dd><a href="mailto:#">agency@example.com</a></dd>
                                <dt>Skype:</dt>
                                <dd>genius.properties</dd>
                            </dl>
                            <address>
                                <strong>Address</strong>
                                <br>
                                <strong>House Trusted</strong><br>
                                4877 Spruce Drive<br>
                                West Newton, PA 15089
                            </address>
                        </div>
                    </div><!-- /.agency -->
                    <div class="agency">
                        <a href="agency-detail.html" class="agency-image"><img alt="" src="assets/img/agency-logo-03.png"></a>
                        <div class="wrapper">
                            <header><a href="agency-detail.html"><h2>LightHouse Estate</h2></a></header>
                            <dl>
                                <dt>Phone:</dt>
                                <dd>(123) 456 789</dd>
                                <dt>Mobile:</dt>
                                <dd>888 123 456 789</dd>
                                <dt>Email:</dt>
                                <dd><a href="mailto:#">agency@example.com</a></dd>
                                <dt>Skype:</dt>
                                <dd>genius.properties</dd>
                            </dl>
                            <address>
                                <strong>Address</strong>
                                <br>
                                <strong>LightHouse Estate</strong><br>
                                4877 Spruce Drive<br>
                                West Newton, PA 15089
                            </address>
                        </div>
                    </div><!-- /.agency -->
                    <div class="agency">
                        <a href="agency-detail.html" class="agency-image"><img alt="" src="assets/img/agency-logo-01.png"></a>
                        <div class="wrapper">
                            <header><a href="agency-detail.html"><h2>Genius Properties</h2></a></header>
                            <dl>
                                <dt>Phone:</dt>
                                <dd>(123) 456 789</dd>
                                <dt>Mobile:</dt>
                                <dd>888 123 456 789</dd>
                                <dt>Email:</dt>
                                <dd><a href="mailto:#">agency@example.com</a></dd>
                                <dt>Skype:</dt>
                                <dd>genius.properties</dd>
                            </dl>
                            <address>
                                <strong>Address</strong>
                                <br>
                                <strong>Genius Properties</strong><br>
                                4877 Spruce Drive<br>
                                West Newton, PA 15089
                            </address>
                        </div>
                    </div><!-- /.agency -->
                    <div class="agency">
                        <a href="agency-detail.html" class="agency-image"><img alt="" src="assets/img/agency-logo-02.png"></a>
                        <div class="wrapper">
                            <header><a href="agency-detail.html"><h2>House Trusted</h2></a></header>
                            <dl>
                                <dt>Phone:</dt>
                                <dd>(123) 456 789</dd>
                                <dt>Mobile:</dt>
                                <dd>888 123 456 789</dd>
                                <dt>Email:</dt>
                                <dd><a href="mailto:#">agency@example.com</a></dd>
                                <dt>Skype:</dt>
                                <dd>genius.properties</dd>
                            </dl>
                            <address>
                                <strong>Address</strong>
                                <br>
                                <strong>House Trusted</strong><br>
                                4877 Spruce Drive<br>
                                West Newton, PA 15089
                            </address>
                        </div>
                    </div><!-- /.agency -->
                    <div class="agency">
                        <a href="agency-detail.html" class="agency-image"><img alt="" src="assets/img/agency-logo-03.png"></a>
                        <div class="wrapper">
                            <header><a href="agency-detail.html"><h2>LightHouse Estate</h2></a></header>
                            <dl>
                                <dt>Phone:</dt>
                                <dd>(123) 456 789</dd>
                                <dt>Mobile:</dt>
                                <dd>888 123 456 789</dd>
                                <dt>Email:</dt>
                                <dd><a href="mailto:#">agency@example.com</a></dd>
                                <dt>Skype:</dt>
                                <dd>genius.properties</dd>
                            </dl>
                            <address>
                                <strong>Address</strong>
                                <br>
                                <strong>LightHouse Estate</strong><br>
                                4877 Spruce Drive<br>
                                West Newton, PA 15089
                            </address>
                        </div>
                    </div><!-- /.agency -->
                    <!-- Pagination -->
                    <div class="center">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul><!-- /.pagination-->
                    </div><!-- /.center-->
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
