@extends('layouts.app')

@section('title', __('meta.title_about'))
@section('meta_description', __('meta.meta_description_about'))
@section('meta_keywords', __('meta.meta_keywords_about'))

@section('bodyProps')
    class="page-sub-page page-about-us" id="page-top"
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a></li>
            <li class="active">{{ __('menu.about_us') }}</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->
    <div class="container">
        <div class="row">
            <!-- sidebar -->
            <div class="col-md-3 col-sm-3">
                <section id="sidebar">
                    <aside id="edit-search" class="m-b-20">
                        <x-forms.city-select-box regionSlug="no-region"/>
                    </aside>
                </section>
            </div><!-- /.col-md-3 -->
            <!-- end Sidebar -->
            <!-- Content -->
            <div class="col-md-9 col-sm-9">
                <section id="about-us">
                    <header><h1>{{ __('menu.about_us') }}</h1></header>
                    <section id="ceo-section" class="center">
                        <header class="center"><div class="cite-title">{{ __('body.serving_since')  }}</div></header>
                        <div class="cite no-bottom-margin">
                            Home Hunt România oferă informații actualizate și analize detaliate despre piața imobiliară din România, ajutându-vă să faceți alegeri informate pentru investițiile dvs. imobiliare.
                        </div>
                        <hr class="divider">
                    </section>
                    <section>
                        <p>
                            La {{ __('body.site_name') }} România, suntem destinația dvs. unică pentru informații precise și actualizate despre prețurile imobiliare din frumoasele regiuni ale României. Cu o echipă dedicată de experți în domeniul imobiliar, ne propunem să vă oferim nu doar date, ci și o perspectivă detaliată asupra pieței imobiliare din țară.
                        </p>
                        <p>
                            Platforma noastră este concepută pentru a vă oferi uneltele necesare pentru a face alegeri informate atunci când vine vorba de investițiile imobiliare. Fie că sunteți în căutarea unei locuințe într-un oraș cosmopolit sau explorați oportunități în zonele rurale, {{ __('menu.site_name') }} România vă pune la dispoziție analize complete, tendințe actuale și statistici detaliate.
                        </p>
                        <p>
                            Ne angajăm să vă oferim nu doar cifre, ci și context și înțelegere. De la prețurile medii la evoluția pieței în timp, vă punem la dispoziție informațiile de care aveți nevoie pentru a face alegeri bine fundamentate în domeniul imobiliar.
                        </p>
                        <p>
                            Alegeți {{ __('menu.site_name') }} România pentru că suntem mai mult decât o platformă de date imobiliare - suntem partenerul dvs. de încredere în călătoria dvs. în lumea imobiliară românească.
                        </p>
                    </section>
                </section><!-- /#agent-detail -->
                <section id="fun-facts" class="block counting-numbers">
                    <header class="center"><h2 class="no-border">{{ __('body.fun_facts') }}</h2></header>
                    <div class="row">
                        <div class="fun-facts">
                            <div class="col-md-4">
                                <div class="number-wrapper">
                                    <div class="number" data-from="1" data-to="{{ $nr_of_cities }}">{{ $nr_of_cities }}</div>
                                    <figure>{{ __('body.nr_of_cities_listed') }}</figure>
                                </div><!-- /.number-wrapper -->
                            </div><!-- /.col-md-3 -->
                            <div class="col-md-4">
                                <div class="number-wrapper">
                                    <div class="number" data-from="1" data-to="{{ $nr_of_statistics }}">{{ $nr_of_statistics }}</div>
                                    <figure>{{ __('body.nr_of_statistics') }}</figure>
                                </div><!-- /.number-wrapper -->
                            </div><!-- /.col-md-3 -->
                            <div class="col-md-4">
                                <div class="number-wrapper">
                                    <div class="number" data-from="1" data-to="2022">2022</div>
                                    <figure>{{ __('body.since_year') }}</figure>
                                </div><!-- /.number-wrapper -->
                            </div><!-- /.col-md-3 -->

                        </div><!-- /.fun-facts -->
                    </div><!-- /.row -->
                </section><!-- /#fun-facts -->
            </div><!-- /.col-md-9 -->
            <!-- end Content -->
        </div><!-- /.row -->
    </div><!-- /.container -->
@endsection
