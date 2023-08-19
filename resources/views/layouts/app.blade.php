<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('fonts/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery.slider.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body class="page-homepage navigation-fixed-top page-slider page-slider-search-box" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
<div class="wrapper">
    <div class="navigation">
{{--        <div class="secondary-navigation">--}}
{{--            <div class="container">--}}
{{--                <div class="contact">--}}
{{--                    <figure><strong>Phone:</strong>+1 810-991-3842</figure>--}}
{{--                    <figure><strong>Email:</strong>zoner@example.com</figure>--}}
{{--                </div>--}}
{{--                <div class="user-area">--}}
{{--                    <div class="actions">--}}
{{--                        <a href="create-agency.html" class="promoted">Create Agency</a>--}}
{{--                        <a href="create-account.html" class="promoted"><strong>Register</strong></a>--}}
{{--                        <a href="sign-in.html">Sign In</a>--}}
{{--                    </div>--}}
{{--                    <div class="language-bar">--}}
{{--                        <a href="#" class="active"><img src="assets/img/flags/gb.png" alt=""></a>--}}
{{--                        <a href="#"><img src="assets/img/flags/de.png" alt=""></a>--}}
{{--                        <a href="#"><img src="assets/img/flags/es.png" alt=""></a>--}}
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
                        <a href="#"><img src="{{ asset('img/logo.png') }}" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a>
                        </li>
                        <li class="has-child"><a href="#">{{ __('menu.apartments') }}</a>
                            <ul class="child-navigation">
                                @foreach ($regions as $region)
                                    <li class="has-child"><a href="#">{{ $region->name }}</a>
                                        <ul class="child-navigation">
                                            @foreach ($region->cities as $city)
                                                <li><a href="#">{{ $city->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-child"><a href="#">Blog</a>
                            <ul class="child-navigation">
                                <li><a href="#">Blog Listing</a></li>
                                <li><a href="#">Blog Post Detail</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Contact</a></li>
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
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>About Us</h3>
                                <p>At RealEstateStats Romania, we are your one-stop destination for accurate and up-to-date real estate price information across the beautiful regions of Romania. Our platform is dedicated to providing you with comprehensive insights into property prices in various cities and regions, enabling you to make informed decisions when it comes to buying or selling real estate.
                                </p>
                                <hr>
                                <a href="#" class="link-arrow">{{ __('body.read_more') }}</a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        @php
                            $chunkedArrays = array_chunk($regions->toArray(), ceil(count($regions->toArray()) / 3));
                        @endphp
                        @foreach($chunkedArrays as $index => $chunk)
                            <div class="col-md-3 col-sm-3">
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
                </div><!-- /.container -->
            </aside><!-- /#footer-main -->
            <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->
            <aside id="footer-copyright">
                <div class="container">
                    <span>Copyright © 2013. All Rights Reserved.</span>
                    <span class="pull-right"><a href="#page-top" class="roll">Go to top</a></span>
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
