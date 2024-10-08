<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery.slider.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <meta name="description" content="@yield('meta_description', 'Default description')">
    <meta name="keywords" content="@yield('meta_keywords', 'default, keywords')">
    <meta name="google-adsense-account" content="ca-pub-9218405650262587">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9218405650262587"
            crossorigin="anonymous"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    @if(!empty($noIndex))
        <meta name="googlebot" content="noindex">
    @endif
</head>
<body @yield('bodyProps')>
<div class="wrapper">
    <div class="navigation">
{{--        Todo add localization --}}
{{--        <div class="secondary-navigation">--}}
{{--            <div class="container">--}}
{{--                <div class="user-area">--}}
{{--                    <div class="language-bar">--}}
{{--                        <a href="{{ url('lang/ro') }}" class="{{ App::getLocale() == 'ro' ? 'active' : ''}}"><img src="{{ asset('img/flags/ro.png') }}" alt=""></a>--}}
{{--                        <a href="{{ url('lang/en') }}" class="{{ App::getLocale() == 'en' ? 'active' : ''}}"><img src="{{ asset('img/flags/us.png') }}" alt=""></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="container">
            <header class="navbar" id="top" role="banner">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="{{ route('welcome') }}" class="hh-logo-wrapper"><img src="{{ asset('img/hhlogo.png') }}" alt="brand" class="hh-logo">
                            Home Hunt
                        </a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="{{ Route::is('welcome') ? 'active' : '' }}">
                            <a href="{{ route('welcome') }}">{{ __('menu.home') }}</a>
                        </li>
{{--                        <li class="has-child"><a href="#">{{ __('menu.apartments') }}</a>--}}
{{--                            <ul class="child-navigation">--}}
{{--                                @foreach ($regions as $region)--}}
{{--                                    <li class="has-child"><a href="#">{{ $region->name }}</a>--}}
{{--                                        <ul class="child-navigation">--}}
{{--                                            @foreach ($region->cities as $city)--}}
{{--                                                <li><a href="#">{{ $city->name }}</a></li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="has-child"><a href="#">Blog</a>--}}
{{--                            <ul class="child-navigation">--}}
{{--                                <li><a href="#">Blog Listing</a></li>--}}
{{--                                <li><a href="#">Blog Post Detail</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        <li class="{{ Route::is('about_us') ? 'active' : '' }}">
                            <a href="{{ route('about_us') }}">{{ __('menu.about_us') }}
                            </a>
                        </li>
                        <li class="{{ Route::is('contact_us') ? 'active' : '' }}">
                            <a href="{{ route('contact_us') }}">{{ __('menu.contact_us') }}</a>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>

    @yield('slider')

    <div id="page-content">
        @yield('content')
    </div>
    <footer id="page-footer">
        <div class="inner">
            <aside id="footer-main">
                <div class="container">
                    <div class="row">
                        @php
                            $chunkedArrays = array_chunk($regions->toArray(), ceil(count($regions->toArray()) / 4));
                        @endphp
                        @foreach($chunkedArrays as $index => $chunk)
                            <div class="col-sm-3 col-xs-6">
                                <article>
                                    @if($index === 0)
                                        <h3>{{ __('body.select_region') }}</h3>
                                    @else
                                        <h3>&nbsp;</h3>
                                    @endif
                                    <ul class="list-unstyled list-links">
                                    @foreach($chunk as $region)
                                            <li>
                                                <a href="{{ route('region.show', ['regionSlug' => $region['slug']]) }}">
                                                    {{ $region['name'] }}
                                                </a>
                                            </li>
                                    @endforeach
                                    </ul>
                                </article>
                            </div>
                        @endforeach
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ route('privacy') }}">{{ __('body.privacy') }}</a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ route('terms') }}">{{ __('body.terms') }}</a>
                        </div>
                    </div>
                </div><!-- /.container -->
            </aside><!-- /#footer-main -->
            <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->
            <aside id="footer-copyright">
                <div class="container">
                    <span>Copyright © {{ \Carbon\Carbon::now()->year }}. {{ __('body.copyright') }}</span>
                    <span class="pull-right"><a href="#page-top" class="roll">{{ __('body.back_to_top') }}</a></span>
                </div>
            </aside>
        </div><!-- /.inner -->
    </footer>
</div>

<div id="overlay"></div>

<script type="text/javascript" src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/smoothscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.vanillabox-0.1.5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.countTo.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jshashtable-2.1_src.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.numberformatter-1.2.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tmpl.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dependClass-0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/draggable-0.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="{{ asset('js/ie.js') }}"></script>
<![endif]-->
<script>
    $(window).load(function(){
        initializeOwl(false);
    });
    window.translations = {
        menu: @json(trans('menu'))
    };
</script>

</body>
</html>
