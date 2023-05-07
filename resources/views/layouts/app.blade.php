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
    <header>
        <div class="navigation">
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
                            <a href="index-google-map-fullscreen.html"><img src="{{ asset('img/logo.png') }}" alt="brand"></a>
                        </div>
                    </div>
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="has-child"><a href="#">{{ __('menu.apartments') }}</a>
                                <ul class="child-navigation">
                                    <li><a href="property-detail.html">Property Detail</a></li>
                                    <li><a href="properties-listing.html">Masonry Listing</a></li>
                                    <li><a href="properties-listing-grid.html">Grid Listing</a></li>
                                    <li><a href="properties-listing-lines.html">Lines Listing</a></li>
                                </ul>
                            </li>
                            <li class="has-child"><a href="#">Pages</a>
                                <ul class="child-navigation">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="agent-detail.html">Agent Detail</a></li>
                                    <li><a href="invoice-print.html">Invoice</a></li>
                                    <li><a href="profile.html">Profile</a></li>
                                    <li><a href="my-properties.html">My Properties</a></li>
                                    <li><a href="bookmarked.html">Bookmarked Properties</a></li>
                                    <li><a href="create-account.html">Create Account</a></li>
                                    <li><a href="create-agency.html">Create Agency</a></li>
                                    <li><a href="sign-in.html">Sign In</a></li>
                                    <li class="has-child"><a href="#">Error Pages</a>
                                        <ul class="child-navigation">
                                            <li><a href="403.html">403</a></li>
                                            <li><a href="404.html">404</a></li>
                                            <li><a href="500.html">500</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="left-sidebar.html">Left Sidebar</a></li>
                                    <li><a href="right-sidebar.html">Right Sidebar</a></li>
                                    <li><a href="sticky-footer.html">Sticky Footer</a></li>
                                    <li><a href="pricing.html">Pricing</a></li>
                                    <li><a href="shortcodes.html">Shortcodes</a></li>
                                    <li><a href="timeline.html">Timeline</a></li>
                                    <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                                    <li><a href="rtl.html">RTL Support</a></li>
                                </ul>
                            </li>
                            <li class="has-child"><a href="#">Agents & Agencies</a>
                                <ul class="child-navigation">
                                    <li><a href="agents-listing.html">Agents Listing</a></li>
                                    <li><a href="agent-detail.html">Agent Detail</a></li>
                                    <li><a href="agencies-listing.html">Agencies Listing</a></li>
                                    <li><a href="agency-detail.html">Agency Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="submit.html">Submit</a></li>
                            <li class="has-child"><a href="#">Blog</a>
                                <ul class="child-navigation">
                                    <li><a href="blog.html">Blog Listing</a></li>
                                    <li><a href="blog-detail.html">Blog Post Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav><!-- /.navbar collapse-->
                    <div class="add-your-property">
                        <a href="submit.html" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">Add Your Property</span></a>
                    </div>
                </header><!-- /.navbar -->
            </div><!-- /.container -->
        </div><!-- /.navigation -->
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Include your site footer content here -->
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
</script>

</body>
</html>
