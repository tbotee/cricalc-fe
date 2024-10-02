@extends('layouts.app')

@section('title', __('meta.title_terms'))
@section('meta_description', __('meta.meta_description_terms'))
@section('meta_keywords', __('meta.meta_keywords_terms'))

@section('bodyProps')
    class="page-sub-page page-profile page-account" id="page-top"
@endsection

@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ __('menu.home') }}</a></li>
            <li class="active">{{ __('body.terms') }}</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-md-12 col-sm-12">
                <section id="content">
                    <header><h1>{{ __('body.terms') }}</h1></header>
                    <section id="legal">
                        <section>
                            <h3>General</h3>
                            <p>Acești Termeni și Condiții reglementează utilizarea site-ului nostru care prezintă date statistice despre prețurile imobilelor din România. Prin accesarea și utilizarea acestui site, sunteți de acord cu respectarea și acceptarea acestor termeni și condiții. Dacă nu sunteți de acord cu acești termeni, vă rugăm să încetați utilizarea site-ului.</p>
                        </section>
                        <section>
                            <h3>Descrierea Serviciilor</h3>
                            <p>Site-ul nostru colectează date privind prețurile imobilelor din România din surse publice, cum ar fi anunțurile imobiliare disponibile pe internet. Datele sunt agregate și prezentate sub formă de statistici pentru informarea utilizatorilor. Informațiile prezentate pe acest site sunt destinate exclusiv scopului informativ și nu constituie recomandări financiare, juridice sau de investiții.</p>
                        </section>
                        <section>
                            <h3>Limitarea Răspunderii</h3>
                            <p>Prețurile prezentate pe site sunt colectate din surse externe, iar acuratețea lor poate varia. Nu garantăm că informațiile afișate sunt complete, exacte sau actualizate în timp real. Prețurile afișate pot fi incorecte sau pot conține erori. Utilizarea informațiilor se face pe propria răspundere a utilizatorului.</p>
                            <p>Site-ul nostru nu își asumă nicio responsabilitate pentru orice pierderi, daune sau alte consecințe care pot apărea din utilizarea informațiilor disponibile pe site, inclusiv dar fără a se limita la decizii financiare sau tranzacții imobiliare bazate pe datele furnizate.</p>
                        </section>
                        <section>
                            <h3>Utilizarea Informațiilor</h3>
                            <p>Informațiile și datele prezentate pe site sunt proprietatea noastră sau a furnizorilor noștri de date și sunt protejate prin legislația în vigoare privind drepturile de autor. Utilizatorii nu au dreptul să reproducă, distribuie sau să folosească în alte scopuri comerciale informațiile disponibile pe site fără consimțământul nostru expres în scris.</p>
                        </section>
                        <section>
                            <h3>Actualizarea Informațiilor</h3>
                            <p>Ne rezervăm dreptul de a modifica, actualiza sau șterge informațiile prezentate pe site în orice moment, fără notificare prealabilă. De asemenea, ne rezervăm dreptul de a suspenda temporar sau permanent funcționarea site-ului fără a oferi justificări.</p>
                        </section>
                        <section>
                            <h3>Exonerare de Răspundere</h3>
                            <p>Nu garantăm că serviciile noastre vor funcționa neîntrerupt sau fără erori. Nu ne asumăm răspunderea pentru orice întreruperi, întârzieri, erori sau defecțiuni în furnizarea informațiilor, indiferent de cauză.</p>
                        </section>
                        <section>
                            <h3>Modificarea Termenilor și Condițiilor</h3>
                            <p>Ne rezervăm dreptul de a modifica acești Termeni și Condiții în orice moment. Orice modificare va fi publicată pe această pagină și va intra în vigoare de la data publicării. Continuarea utilizării site-ului după publicarea modificărilor constituie acceptarea acestora.</p>
                        </section>
                        <section>
                            <h3>Legea Aplicabilă</h3>
                            <p>Acești Termeni și Condiții sunt guvernați de legislația în vigoare din România. Orice litigiu apărut în legătură cu acești termeni va fi soluționat de instanțele competente din România.</p>
                            <p>Dacă aveți întrebări sau nelămuriri cu privire la acești Termeni și Condiții, vă rugăm să ne contactați
                                <a href="{{ route('contact_us') }}">aici</a></p>
                        </section>
                        <section>
                            <h3>Attributions și Drepturi de Autor</h3>
                            <p>Pe acest site pot fi utilizate imagini și alte materiale media furnizate de terțe părți, în conformitate cu licențele și drepturile de utilizare acordate. Atribuțiile pentru aceste materiale sunt incluse:</p>
                            <ul>
                                <li><a href="https://unsplash.com/@paralitik?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Brandon Griggs</a> on <a href="https://unsplash.com/photos/low-angle-view-of-building-wR11KBaB86U?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></li>
                                <li><a href="https://unsplash.com/@etienne_beauregard?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Étienne Beauregard-Riverin</a> on <a href="https://unsplash.com/photos/windowpanes-at-the-building-B0aCvAVSX8E?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></li>
                                <li><a href="https://unsplash.com/@kanetaylor?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Kane Taylor</a> on <a href="https://unsplash.com/photos/green-palm-tree-near-silver-sedan-02fRawxKwbA?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></li>
                                <li><a href="https://unsplash.com/@rgaleriacom?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Ricardo Gomez Angel</a> on <a href="https://unsplash.com/photos/low-angle-photography-of-condominium-iYQT6PNToYo?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></li>
                                <li><a href="https://unsplash.com/@sergio_rola?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Sérgio Rola</a> on <a href="https://unsplash.com/photos/brown-concrete-building-at-daytime-rpnL45a3-m8?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></li>
                                <li><a href="https://unsplash.com/@slashhearts?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Philip de Leon</a> on <a href="https://unsplash.com/photos/white-and-green-building-4N3WK2PgrFk?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a></li>
                            </ul>
                        </section>
                    </section>
                </section><!-- /#agent-detail -->
            </div><!-- /.col-md-9 -->
            <!-- end Content -->
        </div><!-- /.row -->
    </div>
@endsection
