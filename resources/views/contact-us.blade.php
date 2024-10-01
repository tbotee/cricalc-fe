@extends('layouts.app')

@section('bodyProps')
    class="page-sub-page page-about-us" id="page-top"
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Contact Us</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->
    <div class="container">
        <div class="row">
            <!-- Contact -->
            <div class="col-md-9 col-sm-9">
                <section id="agent-detail">
                    <header><h1>Contact</h1></header>
                    <section id="contact-information">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <section id="address">
                                    <header><h3>Address</h3></header>
                                    <address>
                                        <strong>Your Company</strong><br>
                                        4877 Spruce Drive<br>
                                        West Newton, PA 15089
                                    </address>
                                </section><!-- /#address -->
{{--                                <section id="social">--}}
{{--                                    <header><h3>Social Profiles</h3></header>--}}
{{--                                    <div class="agent-social">--}}
{{--                                        <a href="#" class="fa fa-twitter btn btn-grey-dark"></a>--}}
{{--                                        <a href="#" class="fa fa-facebook btn btn-grey-dark"></a>--}}
{{--                                        <a href="#" class="fa fa-linkedin btn btn-grey-dark"></a>--}}
{{--                                    </div>--}}
{{--                                </section><!-- /#social -->--}}
                            </div><!-- /.col-md-4 -->
                            <div class="col-md-8 col-sm-7">
                                <section id="form">
                                    <header><h3>Send Us a Message</h3></header>
                                    <form role="form" id="form-contact" method="post"  class="clearfix">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form-contact-name">Your Name<em>*</em></label>
                                                    <input type="text" class="form-control" id="form-contact-name" name="form-contact-name" required>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form-contact-email">Your Email<em>*</em></label>
                                                    <input type="email" class="form-control" id="form-contact-email" name="form-contact-email" required>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="form-contact-message">Your Message<em>*</em></label>
                                                    <textarea class="form-control" id="form-contact-message" rows="8" name="form-contact-message" required></textarea>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-12 -->
                                        </div><!-- /.row -->
                                        <div class="form-group clearfix">
                                            <button type="submit" class="btn pull-right btn-default" id="form-contact-submit">Send a Message</button>
                                        </div><!-- /.form-group -->
                                        <div id="form-status"></div>
                                    </form><!-- /#form-contact -->
                                </section>
                            </div><!-- /.col-md-8 -->
                        </div><!-- /.row -->
                    </section><!-- /#agent-info -->
                </section><!-- /#agent-detail -->
            </div><!-- /.col-md-9 -->
            <!-- end Contact -->

            <!-- sidebar -->
            <div class="col-md-3 col-sm-3">
                <section id="sidebar">
                    <aside id="edit-search">
                        <x-forms.search-box showTitle="true"/>
                    </aside><!-- /#edit-search -->
                </section><!-- /#sidebar -->
            </div><!-- /.col-md-3 -->
            <!-- end Sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->

@endsection
