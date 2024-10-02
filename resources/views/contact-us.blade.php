@extends('layouts.app')

@section('bodyProps')
    class="page-sub-page page-about-us" id="page-top"
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a></li>
            <li class="active">{{ __('menu.contact_us') }}</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->
    <div class="container">
        <div class="row">
            <!-- Contact -->
            <div class="col-md-12 col-sm-12">
                <section id="agent-detail">
                    <header><h1>{{ __('menu.contact_us') }}</h1></header>
                    <section id="contact-information">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <x-forms.city-select-box regionSlug="no-slug"/>

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
                                    <header><h3>{{ __('contact.send_us_a_message') }}</h3></header>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('contact_us.submit') }}" role="form" id="form-contact" method="post"  class="clearfix">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form-contact-name">{{ __('contact.your_name') }}<em>*</em></label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="form-contact-name"
                                                        name="form-contact-name"
                                                        value="{{ old('form-contact-name') }}"
                                                        required>
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form-contact-email">{{ __('contact.your_email') }}l<em>*</em></label>
                                                    <input
                                                        type="email"
                                                        class="form-control" id="form-contact-email"
                                                        name="form-contact-email" required
                                                        value="{{ old('form-contact-email') }}"
                                                    >
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="form-contact-message">{{ __('contact.your_message') }}<em>*</em></label>
                                                    <textarea
                                                        class="form-control"
                                                        id="form-contact-message"
                                                        rows="8"
                                                        name="form-contact-message"
                                                        required>{{ old('form-contact-message') }}</textarea>
                                                    @error('message')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-12 -->
                                        </div><!-- /.row -->
                                        <div class="form-group clearfix">
                                            <button type="submit" class="btn pull-right btn-default" id="form-contact-submit">{{ __('contact.send_email') }}</button>
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

            <!-- end Sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->

@endsection
