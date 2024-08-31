<?php
/*
 * The template for front page
 */

get_header();
?>

<section class="first-section">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
            <h1>building for good</h1>
            <p>Jesteśmy deweloperem powierzchni magazynowo-przemysłowych. Istniejemy od 2021 roku w Polsce, gdzie prowadzimy działalność. Nasze centra logistyczne stanowią ważny element zrównoważonego rozwoju sektora nieruchomości komercyjnych.</p>
            <a href="/mdc2/magazyny-do-wynajecia/" class="btn outline medium icon-right">Zobacz nasze nieruchomości</a>
        </div>
    </div>
</section>

<section class="row-full img-full">
    <img src="/mdc2/wp-content/uploads/2024/08/mdc2_about_us.jpg" alt="mdc2 deweloper powierzchni magazynowo-przemysłowych">
</section>

<section id="goal">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
            <p>Nasz cel jest prosty - być deweloperem, który przewodzi zmianom na polskim rynku nieruchomości komercyjnych; deweloperem zrównoważonych środowiskowo budynków, firmą transparentną i grającą fair wobec wszystkich partnerów biznesowych.</p>
        </div>
    </div>
</section>

<section id="pillars">
    <h2>Naszą organizację rozwijamy w oparciu o trzy główne filary:</h2>
    <div class="row">
        <div class="col-4">
            <div>
                <h3>Jeden sektor</h3>
                <ul>
                    <li>Handel światowy wzrósł ponad dwukrotnie w ciągu ostatnich 20 lat</li>
                    <li>E-commerce dodatkowo napędza popyt w sektorze nieruchomości logistycznych</li>
                    <li>Niższe ryzyko czasowe i technologiczne w porównaniu z alternatywnymi klasami aktywów</li>
                    <li>Rosnący popyt wśród najemców jest podstawą rekordowych napływów kapitału</li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div>
                <h3>Jeden rynek</h3>
                <ul>
                    <li>Drugi najszybciej rozwijający się rynek i ósmy największy rynek w UE</li>
                    <li>5 mln m² wynajmowanych rocznie, z czego połowa to nowe umowy</li>
                    <li>87% projektów magazynowych realizowane jest przez trzech deweloperów</li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div>
                <h3>Jeden zespół</h3>
                <ul>
                    <li>Zespół 18 doświadczonych profesjonalistów ze średnio 20-letnimi relacjami na rynku oraz kompetencjami i licznymi sukcesami zawodowymi</li>
                    <li>Partnerstwo opiera się na podstawowych wartościach: zaufaniu, uczciwości, równowadze i wolności</li>
                    <li>Partnerstwo opiera się na podstawowych wartościach: zaufaniu, uczciwości, równowadze i wolności</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="reports" class="align-center">
    <h4>Wszystkie te filary wyznaczają kierunek naszych działań.</h4>
    <div class="row">
        <a href="#" class="btn outline medium icon-right icon-down">Pobierz Raport Roczny</a>
        <a href="#" class="btn outline medium icon-right icon-down">Pobierz Broszurę o MDC<sup>2</sup></a>
    </div>
</section>

<section id="about-contact-form" class="hidden">
    <?php echo do_shortcode('[contact-form-7 id="244c739" title="Formularz mini"]') ;?>
</section>

<?php
get_footer();
