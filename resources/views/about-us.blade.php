@extends('layouts.app')

@section('bodyProps')
    class="page-sub-page page-about-us" id="page-top"
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">About Us</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->

    <div class="container">
        <div class="row">
            <!-- About Us -->
            <div class="col-md-12 col-sm-12">
                <section id="about-us">
                    <header><h1>Despre Noi</h1></header>
                    <section id="ceo-section" class="center">
                        <header class="center"><div class="cite-title">Vă servim din 2022</div></header>
                        <div class="cite no-bottom-margin">
                            La RealEstateStats România, suntem destinația dvs. unică pentru informații precise și actualizate despre prețurile imobiliare din frumoasele regiuni ale României. Cu o echipă dedicată de experți în domeniul imobiliar, ne propunem să vă oferim nu doar date, ci și o perspectivă detaliată asupra pieței imobiliare din țară.
                        </div>
                        <hr class="divider">
                        <div class="cite no-bottom-margin">
                            Platforma noastră este concepută pentru a vă oferi uneltele necesare pentru a face alegeri informate atunci când vine vorba de investițiile imobiliare. Fie că sunteți în căutarea unei locuințe într-un oraș cosmopolit sau explorați oportunități în zonele rurale, RealEstateStats România vă pune la dispoziție analize complete, tendințe actuale și statistici detaliate.
                        </div>
                        <hr class="divider">
                        <div class="cite no-bottom-margin">
                            Ne angajăm să vă oferim nu doar cifre, ci și context și înțelegere. De la prețurile medii la evoluția pieței în timp, vă punem la dispoziție informațiile de care aveți nevoie pentru a face alegeri bine fundamentate în domeniul imobiliar.
                        </div>
                        <hr class="divider">
                        <div class="cite no-bottom-margin">
                            Alegeți RealEstateStats România pentru că suntem mai mult decât o platformă de date imobiliare - suntem partenerul dvs. de încredere în călătoria dvs. în lumea imobiliară românească.
                        </div>
                        <hr class="divider">
{{--                        <a href="agent-detail.html" class="image"><img alt="" src="assets/img/agent-01.jpg"></a>--}}
{{--                        <a href="agent-detail.html"><h3>John Doe</h3></a>--}}
{{--                        <figure class="subtitle">Company CEO</figure>--}}
{{--                        <div class="background-image"><img alt="" src="assets/img/about-us-bg.jpg"></div>--}}
                    </section><!-- /#ceo-section -->
{{--                    <div class="divider-image center"><img alt="" src="assets/img/sine-wave.png"></div>--}}
{{--                    <section id="our-team">--}}
{{--                        <header class="center"><h2 class="no-border">Our Team</h2></header>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-offset-1 col-md-5 col-sm-offset-1 col-sm-5">--}}
{{--                                <div class="member">--}}
{{--                                    <a href="agent-detail.html" class="image"><img alt="" src="assets/img/client-01.jpg"></a>--}}
{{--                                    <div class="tag">Top Agent</div>--}}
{{--                                    <div class="wrapper">--}}
{{--                                        <a href="agent-detail.html"><h3>Carolyn Sloan</h3></a>--}}
{{--                                        <figure class="subtitle">Agent</figure>--}}
{{--                                        <dl>--}}
{{--                                            <dt>Phone:</dt>--}}
{{--                                            <dd>(123) 456 789</dd>--}}
{{--                                            <dt>Email:</dt>--}}
{{--                                            <dd><a href="mailto:#">john.doe@example.com</a></dd>--}}
{{--                                            <dt>Skype:</dt>--}}
{{--                                            <dd>john.doe</dd>--}}
{{--                                        </dl>--}}
{{--                                    </div>--}}
{{--                                </div><!-- /.member -->--}}
{{--                            </div><!-- /.col-md-5 -->--}}
{{--                            <div class="col-md-5 col-sm-5">--}}
{{--                                <div class="member">--}}
{{--                                    <a href="agent-detail.html" class="image"><img alt="" src="assets/img/member-01.jpg"></a>--}}
{{--                                    <div class="wrapper">--}}
{{--                                        <a href="agent-detail.html"><h3>Erika Green</h3></a>--}}
{{--                                        <figure class="subtitle">Support</figure>--}}
{{--                                        <dl>--}}
{{--                                            <dt>Phone:</dt>--}}
{{--                                            <dd>(123) 456 789</dd>--}}
{{--                                            <dt>Email:</dt>--}}
{{--                                            <dd><a href="mailto:#">john.doe@example.com</a></dd>--}}
{{--                                            <dt>Skype:</dt>--}}
{{--                                            <dd>john.doe</dd>--}}
{{--                                        </dl>--}}
{{--                                    </div>--}}
{{--                                </div><!-- /.member -->--}}
{{--                            </div><!-- /.col-md-5 -->--}}
{{--                        </div><!-- /.row -->--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-4 col-sm-4">--}}
{{--                                <div class="member">--}}
{{--                                    <a href="agent-detail.html" class="image"><img alt="" src="assets/img/member-02.jpg"></a>--}}
{{--                                    <div class="wrapper">--}}
{{--                                        <a href="agent-detail.html"><h3>Mary A. Parrish</h3></a>--}}
{{--                                        <figure class="subtitle">Agent</figure>--}}
{{--                                        <dl>--}}
{{--                                            <dt>Phone:</dt>--}}
{{--                                            <dd>(123) 456 789</dd>--}}
{{--                                            <dt>Email:</dt>--}}
{{--                                            <dd><a href="mailto:#">john.doe@example.com</a></dd>--}}
{{--                                            <dt>Skype:</dt>--}}
{{--                                            <dd>john.doe</dd>--}}
{{--                                        </dl>--}}
{{--                                    </div>--}}
{{--                                </div><!-- /.member -->--}}
{{--                            </div><!-- /.col-md-4 -->--}}
{{--                            <div class="col-md-4 col-sm-4">--}}
{{--                                <div class="member">--}}
{{--                                    <a href="agent-detail.html" class="image"><img alt="" src="assets/img/member-03.jpg"></a>--}}
{{--                                    <div class="wrapper">--}}
{{--                                        <a href="agent-detail.html"><h3>Russell G. Nowicki</h3></a>--}}
{{--                                        <figure class="subtitle">Agent</figure>--}}
{{--                                        <dl>--}}
{{--                                            <dt>Phone:</dt>--}}
{{--                                            <dd>(123) 456 789</dd>--}}
{{--                                            <dt>Email:</dt>--}}
{{--                                            <dd><a href="mailto:#">john.doe@example.com</a></dd>--}}
{{--                                            <dt>Skype:</dt>--}}
{{--                                            <dd>john.doe</dd>--}}
{{--                                        </dl>--}}
{{--                                    </div>--}}
{{--                                </div><!-- /.member -->--}}
{{--                            </div><!-- /.col-md-4 -->--}}
{{--                            <div class="col-md-4 col-sm-4">--}}
{{--                                <div class="member">--}}
{{--                                    <a href="agent-detail.html" class="image"><img alt="" src="assets/img/member-04.jpg"></a>--}}
{{--                                    <div class="wrapper">--}}
{{--                                        <a href="agent-detail.html"><h3>Kristine Hicks</h3></a>--}}
{{--                                        <figure class="subtitle">Agent</figure>--}}
{{--                                        <dl>--}}
{{--                                            <dt>Phone:</dt>--}}
{{--                                            <dd>(123) 456 789</dd>--}}
{{--                                            <dt>Email:</dt>--}}
{{--                                            <dd><a href="mailto:#">john.doe@example.com</a></dd>--}}
{{--                                            <dt>Skype:</dt>--}}
{{--                                            <dd>john.doe</dd>--}}
{{--                                        </dl>--}}
{{--                                    </div>--}}
{{--                                </div><!-- /.member -->--}}
{{--                            </div><!-- /.col-md-4 -->--}}
{{--                        </div><!-- /.row -->--}}
{{--                    </section><!-- /#our-tem -->--}}

{{--                    <section id="fun-facts" class="block counting-numbers">--}}
{{--                        <header class="center"><h2 class="no-border">Fun Facts</h2></header>--}}
{{--                        <div class="row">--}}
{{--                            <div class="fun-facts">--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <div class="number-wrapper">--}}
{{--                                        <div class="number" data-from="1" data-to="136">136</div>--}}
{{--                                        <figure>Properties Listed</figure>--}}
{{--                                    </div><!-- /.number-wrapper -->--}}
{{--                                </div><!-- /.col-md-3 -->--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <div class="number-wrapper">--}}
{{--                                        <div class="number" data-from="1" data-to="2145">2145</div>--}}
{{--                                        <figure>Satisfied Clients</figure>--}}
{{--                                    </div><!-- /.number-wrapper -->--}}
{{--                                </div><!-- /.col-md-3 -->--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <div class="number-wrapper">--}}
{{--                                        <div class="number" data-from="1" data-to="468">468</div>--}}
{{--                                        <figure>Properties Sold</figure>--}}
{{--                                    </div><!-- /.number-wrapper -->--}}
{{--                                </div><!-- /.col-md-3 -->--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <div class="number-wrapper">--}}
{{--                                        <div class="number" data-from="1" data-to="5475">5475</div>--}}
{{--                                        <figure>Day we are here</figure>--}}
{{--                                    </div><!-- /.number-wrapper -->--}}
{{--                                </div><!-- /.col-md-3 -->--}}
{{--                            </div><!-- /.fun-facts -->--}}
{{--                        </div><!-- /.row -->--}}
{{--                    </section><!-- /#fun-facts -->--}}
{{--                    <section id="testimonials" class="block">--}}
{{--                        <header class="center"><h2 class="no-border">What other said about us</h2></header>--}}
{{--                        <div class="owl-carousel testimonials-carousel">--}}
{{--                            <blockquote class="testimonial">--}}
{{--                                <figure>--}}
{{--                                    <div class="image">--}}
{{--                                        <img alt="" src="assets/img/client-01.jpg">--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <aside class="cite">--}}
{{--                                    <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>--}}
{{--                                    <footer>Natalie Jenkins</footer>--}}
{{--                                </aside>--}}
{{--                            </blockquote>--}}
{{--                            <blockquote class="testimonial">--}}
{{--                                <figure>--}}
{{--                                    <div class="image">--}}
{{--                                        <img alt="" src="assets/img/client-01.jpg">--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <aside class="cite">--}}
{{--                                    <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>--}}
{{--                                    <footer>Natalie Jenkins</footer>--}}
{{--                                </aside>--}}
{{--                            </blockquote>--}}
{{--                        </div><!-- /.testimonials-carousel -->--}}
{{--                    </section><!-- /#testimonials -->--}}
                </section><!-- /#about-us -->
            </div><!-- /.col-md-12 -->
            <!-- end About Us -->
            <!-- Sidebar goes here -->
            <!-- end Sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->
@endsection
