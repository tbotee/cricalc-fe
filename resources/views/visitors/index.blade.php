@extends('layouts.app')

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a></li>
            <li class="active">Visitors</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section id="select-package">
                    <div class="table-responsive submit-pricing">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Visitor Count</th>
                                <th>Total Navigation Count</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($visitors as $visitor)
                                <tr>
                                    <td>{{ $visitor->date }}</td>
                                    <td>{{ $visitor->visitor_count }}</td>
                                    <td>{{ $visitor->total_navigation_count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.submit-pricing -->
                </section>
            </div>
        </div>
    </div>
@endsection
