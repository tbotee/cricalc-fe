@extends('layouts.app')

@section('bodyProps')
    class="page-sub-page page-about-us" id="page-top"
@endsection

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a></li>
        <li class="active">404</li>
    </ol>
</div>
<div class="container">
    <section id="404">
        <div class="error-page">
            <div class="title">
                <img alt="" src="{{ asset('img/error-page-background.png') }}" class="top">
                <header>404</header>
                <img alt="" src="{{ asset('img/error-page-background.png') }}" class="bottom">
            </div>
            <h2 class="no-border">{{ __('body.page_not_found') }}</h2>
            <a href="{{ route('welcome') }}" class="link-arrow back">{{ __('menu.home') }}</a>
        </div>
    </section>
</div>
@endsection
