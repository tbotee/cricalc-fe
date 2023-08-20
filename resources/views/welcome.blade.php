@extends('layouts.app')

@section('bodyProps')
    class="page-homepage navigation-fixed-top page-slider page-slider-search-box" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90"
@endsection

@section('slider')
    <div id="slider" class="loading has-parallax">
        <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
        <div class="owl-carousel homepage-slider carousel-full-width">
            <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <div class="info">
                            <div class="tag price">$ 16,000</div>
                            <h3>987 Cantebury Drive</h3>
                            <figure>Chicago, IL 60610</figure>
                        </div>
                        <hr>
                        <a href="property-detail.html" class="link-arrow">Read More</a>
                    </div>
                </div>
                <img alt="" src="{{ asset('img/slide-02.jpg') }}">
            </div>
            <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <div class="info">
                            <div class="tag price">$ 28,500</div>
                            <h3>1866 Clement Street</h3>
                            <figure>Atlanta, GA 30303</figure>
                        </div>
                        <hr>
                        <a href="property-detail.html" class="link-arrow">Read More</a>
                    </div>
                </div>
                <img alt="" src="{{ asset('img/slide-03.jpg') }}">
            </div>
        </div>
    </div>
    <!-- end Slider -->

    <!-- Search Box -->
    <div class="search-box-wrapper">
        <div class="search-box-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8">
                        <div class="search-box map">
                            <x-forms.search-box showTitle="true"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section id="our-services" class="block">
        <div class="container">
            <header class="section-title"><h2>Our Services</h2></header>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-folder"></i></figure>
                        <aside class="description">
                            <header><h3>Wide Range of Properties</h3></header>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            <a href="properties-listing.html" class="link-arrow">Read More</a>
                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-users"></i></figure>
                        <aside class="description">
                            <header><h3>14 Agents for Your Service</h3></header>
                            <p>Aliquam gravida magna et fringilla convallis. Pellentesque habitant morbi </p>
                            <a href="agents-listing.html" class="link-arrow">Read More</a>
                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-money"></i></figure>
                        <aside class="description">
                            <header><h3>Best Price Guarantee!</h3></header>
                            <p>Phasellus non viverra tortor, id auctor leo. Suspendisse id nibh placerat</p>
                            <a href="#" class="link-arrow">Read More</a>
                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <section id="price-drop" class="block">
        <div class="container">
            <header class="section-title">
                <h2>Price Drop</h2>
                <a href="properties-listing.html" class="link-arrow">All Properties</a>
            </header>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="assets/img/properties/property-06.jpg">
                            </div>
                            <div class="overlay">
                                <div class="info">
                                    <div class="tag price">$ 11,000</div>
                                    <h3>3398 Lodgeville Road</h3>
                                    <figure>Golden Valley, MN 55427</figure>
                                </div>
                                <ul class="additional-info">
                                    <li>
                                        <header>Area:</header>
                                        <figure>240m<sup>2</sup></figure>
                                    </li>
                                    <li>
                                        <header>Beds:</header>
                                        <figure>2</figure>
                                    </li>
                                    <li>
                                        <header>Baths:</header>
                                        <figure>2</figure>
                                    </li>
                                    <li>
                                        <header>Garages:</header>
                                        <figure>0</figure>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div><!-- /.property -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="assets/img/properties/property-04.jpg">
                            </div>
                            <div class="overlay">
                                <div class="info">
                                    <div class="tag price">$ 38,000</div>
                                    <h3>2186 Rinehart Road</h3>
                                    <figure>Doral, FL 33178 </figure>
                                </div>
                                <ul class="additional-info">
                                    <li>
                                        <header>Area:</header>
                                        <figure>240m<sup>2</sup></figure>
                                    </li>
                                    <li>
                                        <header>Beds:</header>
                                        <figure>3</figure>
                                    </li>
                                    <li>
                                        <header>Baths:</header>
                                        <figure>1</figure>
                                    </li>
                                    <li>
                                        <header>Garages:</header>
                                        <figure>1</figure>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div><!-- /.property -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="assets/img/properties/property-07.jpg">
                            </div>
                            <div class="overlay">
                                <div class="info">
                                    <div class="tag price">$ 325,000</div>
                                    <h3>3705 Brighton Circle Road</h3>
                                    <figure>Glenwood, MN 56334</figure>
                                </div>
                                <ul class="additional-info">
                                    <li>
                                        <header>Area:</header>
                                        <figure>240m<sup>2</sup></figure>
                                    </li>
                                    <li>
                                        <header>Beds:</header>
                                        <figure>3</figure>
                                    </li>
                                    <li>
                                        <header>Baths:</header>
                                        <figure>1</figure>
                                    </li>
                                    <li>
                                        <header>Garages:</header>
                                        <figure>1</figure>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div><!-- /.property -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="assets/img/properties/property-08.jpg">
                            </div>
                            <div class="overlay">
                                <div class="info">
                                    <div class="tag price">$ 16,000</div>
                                    <h3>362 Lynn Ogden Lane</h3>
                                    <figure>Galveston, TX 77550</figure>
                                </div>
                                <ul class="additional-info">
                                    <li>
                                        <header>Area:</header>
                                        <figure>240m<sup>2</sup></figure>
                                    </li>
                                    <li>
                                        <header>Beds:</header>
                                        <figure>3</figure>
                                    </li>
                                    <li>
                                        <header>Baths:</header>
                                        <figure>1</figure>
                                    </li>
                                    <li>
                                        <header>Garages:</header>
                                        <figure>1</figure>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div><!-- /.property -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row-->
        </div><!-- /.container -->
    </section>
    <section id="testimonials" class="block">
        <div class="container">
            <header class="section-title"><h2>Testimonials</h2></header>
            <div class="owl-carousel testimonials-carousel">
                <blockquote class="testimonial">
                    <figure>
                        <div class="image">
                            <img alt="" src="assets/img/client-01.jpg">
                        </div>
                    </figure>
                    <aside class="cite">
                        <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>
                        <footer>Natalie Jenkins</footer>
                    </aside>
                </blockquote>
                <blockquote class="testimonial">
                    <figure>
                        <div class="image">
                            <img alt="" src="assets/img/client-01.jpg">
                        </div>
                    </figure>
                    <aside class="cite">
                        <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>
                        <footer>Natalie Jenkins</footer>
                    </aside>
                </blockquote>
            </div><!-- /.testimonials-carousel -->
        </div><!-- /.container -->
    </section><!-- /#testimonials -->
    <section id="partners" class="block">
        <div class="container">
            <header class="section-title"><h2>Our Partners</h2></header>
            <div class="logos">
                <div class="logo"><a href=""><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="assets/img/logo-partner-05.png" alt=""></a></div>
            </div>
        </div><!-- /.container -->
    </section><!-- /#partners -->
@endsection
