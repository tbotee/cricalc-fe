@extends('layouts.app')

@section('title', __('meta.city_title', ['region' =>  $city->region->name, 'city' => $city->name]))
@section('meta_description', __('meta.city_description', ['region' =>  $city->region->name, 'city' => $city->name]))
@section('meta_keywords', __('meta.city_keywords', ['region' =>  $city->region->name, 'city' => $city->name]))

@section('bodyProps')
    class="page-sub-page page-profile page-account" id="page-top"
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a></li>
            <li class="active">{{ $city->region->name }}</li>
        </ol>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-2">
                <section id="sidebar">
                    <aside id="edit-search" class="m-b-20">
                        <x-forms.city-select-box :regionSlug="$regionSlug" :locationSlug="$locationSlug"/>
                    </aside>
                </section>
            </div>
            <div class="col-md-9 col-sm-10">
                <section id="fun-facts" class="counting-numbers">
                    <header><h1>{{ __('body.select_city_title', ['city' => $city->name, 'region' => $city->region->name]) }}</h1></header>
                    @if($currentStatistics->count())
                    <p>Descoperă prețurile medii ale apartamentelor cu 1, 2, 3 și 4 camere din {{ $city->name }}, {{ $city->region->name  }}. Aici găsești informații esențiale despre piața imobiliară locală, care te vor ajuta să iei decizii informate, fie că intenționezi să închiriezi sau să achiziționezi un apartament. Fii la curent cu cele mai recente tendințe și date privind prețurile, adaptate nevoilor tale specifice, pentru a-ți maximiza oportunitățile în această piață dinamică.</p>
                    <div class="statistics-row">
                        @foreach($currentStatistics as $statistics)
                        <div class="item">
                            <div class="number-statistics-wrapper">
                                <div class="number">€{{ number_format($statistics->average_price, 0, ',', '.') }}</div>
                                <div>{{ $statistics->count }} {{__('body.apartment_cu_x_camere', ['room_count' => array_search($statistics->category_id, $categoryMapping)]) }}</div>
                            </div><!-- /.number-wrapper -->
                        </div>
                        @endforeach
                    </div><!-- /.row -->
                    @endif

                </section>
                <section>
                    <canvas id="myChart" width="400" height="200"></canvas>
                </section>
                <section id="select-package">
                    <p>Consultă tabelul nostru pentru a analiza evoluția prețurilor medii ale apartamentelor din {{ $city->name}}, {{ $city->region->name  }} de-a lungul lunilor. Acest istoric te va ajuta să observi tendințele pieței imobiliare și să iei decizii informate, fie că ești în căutarea unei locuințe de închiriat sau dorind să investești în proprietăți.
                    </p>
                    <div class="table-responsive submit-pricing">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('body.date') }}</th>
                                <th class="title">{{ __('body.1_rooms') }}</th>
                                <th class="title">{{ __('body.x_rooms', ['count' => config('constants.apartment_types')['2-camere']]) }}</th>
                                <th class="title">{{ __('body.x_rooms', ['count' => config('constants.apartment_types')['3-camere']]) }}</th>
                                <th class="title">{{ __('body.x_rooms', ['count' => config('constants.apartment_types')['4-camere']]) }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allStatistics as $statistics)
                                <tr>
                                    <td>{{ $statistics[0] }}</td>
                                    <td>
                                        @if(!empty($statistics[1]))
                                            €{{ number_format($statistics[1]['average_price'], 0, ',', '.') }} ({{ $statistics[1]['count'] }})
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($statistics[2]))
                                            €{{ number_format($statistics[2]['average_price'], 0, ',', '.') }} ({{ $statistics[2]['count'] }})
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($statistics[3]))
                                            €{{ number_format($statistics[3]['average_price'], 0, ',', '.') }} ({{ $statistics[3]['count'] }})
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($statistics[4]))
                                            €{{ number_format($statistics[4]['average_price'], 0, ',', '.') }} ({{ $statistics[4]['count'] }})
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.submit-pricing -->
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($chartData);

        console.log(chartData[1163]['values']);

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line', // Change this to the chart type you want (e.g., 'line', 'bar', etc.)
            data: {
                labels: chartData[1163]['labels'].reverse(),
                datasets: [{
                    label: '{{ __('body.1_rooms') }}', // Label for the dataset
                    data: chartData[1163]['values'].reverse(), // Data points for the chart from the Laravel variable
                    borderColor: 'rgba(52, 152, 219, 1)', // Customize as needed
                    borderWidth: 1,
                    spanGaps: true

                },
                {
                    label: '{{ __('body.apartment_cu_x_camere', ['room_count' => 2]) }}', // Label for the dataset
                    data: chartData[1165]['values'].reverse(), // Data points for the chart from the Laravel variable
                    borderColor: 'rgba(46, 204, 113, 1)', // Customize as needed
                    borderWidth: 1,
                    spanGaps: true
                },
                {
                    label: '{{ __('body.apartment_cu_x_camere', ['room_count' => 3]) }}', // Label for the dataset
                    data: chartData[1167]['values'].reverse(), // Data points for the chart from the Laravel variable
                    borderColor: 'rgba(230, 126, 34, 1)', // Customize as needed
                    borderWidth: 1,
                    spanGaps: true
                },
                {
                    label: '{{ __('body.apartment_cu_x_camere', ['room_count' => 4]) }}', // Label for the dataset
                    data: chartData[1169]['values'].reverse(), // Data points for the chart from the Laravel variable
                    borderColor: 'rgba(155, 89, 182, 1)', // Customize as needed
                    borderWidth: 1,
                    spanGaps: true
                }
            ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        console.log(chartData);
    </script>

@endsection
