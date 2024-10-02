@extends('layouts.app')

@section('bodyProps')
    class="page-sub-page page-profile page-account" id="page-top"
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a></li>
            <li class="active">{{ __('body.privacy') }}</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-md-12 col-sm-12">
                <section id="content">
                    <header><h1>{{ __('body.privacy') }}</h1></header>
                    <section id="legal">
                        <section>
                            <h3>General</h3>
                            <p>Această Politică de Confidențialitate descrie modul în care site-ul nostru colectează, utilizează și protejează informațiile vizitatorilor. Vă asigurăm că respectăm confidențialitatea utilizatorilor și ne angajăm să protejăm orice informație pe care o colectăm în conformitate cu legislația în vigoare.</p>
                        </section>
                        <section>
                            <h3>Colectarea Datelor</h3>
                            <p>Site-ul nostru nu colectează și nu stochează informații personale care ar putea identifica în mod direct vizitatorii, cum ar fi numele, adresa, adresa de e-mail sau numărul de telefon. Singurele date colectate sunt cele necesare pentru analiza traficului pe site, cum ar fi:</p>
                            <ul>
                                <li>
                                    Informații despre dispozitivul utilizat (tipul browserului, sistemul de operare, rezoluția ecranului)
                                </li>
                                <li>
                                    Informații despre interacțiunile utilizatorilor cu site-ul (pagini vizitate, timp petrecut pe pagină)
                                </li>
                            </ul>
                            <p>Aceste date sunt colectate într-o formă agregată și criptată, astfel încât nu pot fi utilizate pentru a identifica în mod direct utilizatorii.</p>
                        </section>
                        <section>
                            <h3>Utilizarea Datelor</h3>
                            <p>Datele colectate sunt utilizate exclusiv pentru a măsura și îmbunătăți performanța site-ului, precum și pentru a asigura o experiență optimizată pentru utilizatori. Informațiile sunt analizate pentru a înțelege comportamentul general al vizitatorilor și pentru a identifica eventuale probleme tehnice sau de utilizabilitate.</p>
                        </section>
                        <section>
                            <h3>Cookie-uri</h3>
                            <p>Site-ul nostru utilizează doar cookie-uri necesare pentru funcționarea corectă a acestuia. Aceste cookie-uri nu colectează informații personale și nu pot fi utilizate pentru a urmări activitatea pe alte site-uri. Utilizăm cookie-uri pentru:</p>
                            <ul>
                                <li>Gestionarea sesiunilor utilizatorilor</li>
                                <li>Asigurarea funcționalității de bază a site-ului</li>
                            </ul>
                            <p>Nu utilizăm cookie-uri de marketing, de urmărire sau cookie-uri de la terțe părți care ar putea colecta date suplimentare despre vizitatori.</p>
                        </section>
                        <section>
                            <h3>Partajarea Datelor cu Terți</h3>
                            <p>Site-ul nostru nu vinde, nu schimbă și nu distribuie datele colectate către terțe părți. Datele agregate și anonimizate pot fi utilizate doar intern pentru îmbunătățirea site-ului.</p>
                        </section>
                        <section>
                            <h3>Securitatea Datelor</h3>
                            <p>Ne angajăm să protejăm datele colectate prin implementarea măsurilor tehnice și organizaționale adecvate. Toate informațiile sunt criptate și accesul la acestea este limitat doar la personalul autorizat.</p>
                        </section>
                        <section>
                            <h3>Modificarea Politicii de Confidențialitate</h3>
                            <p>Ne rezervăm dreptul de a modifica această Politică de Confidențialitate în orice moment, în funcție de schimbările legislative sau de necesitățile operaționale ale site-ului. Orice modificare va fi publicată pe această pagină și va intra în vigoare de la data publicării. Vă încurajăm să consultați periodic această pagină pentru a fi la curent cu cele mai recente modificări.</p>
                        </section>
                        <section>
                            <h3>Contact</h3>
                            <p>Dacă aveți întrebări sau nelămuriri cu privire la această Politică de Confidențialitate, ne puteți contacta <a href="{{ route('contact_us') }}">aici</a></p>
                        </section>
                    </section>
                </section><!-- /#agent-detail -->
            </div><!-- /.col-md-9 -->
            <!-- end Content -->
        </div><!-- /.row -->
    </div>
@endsection
