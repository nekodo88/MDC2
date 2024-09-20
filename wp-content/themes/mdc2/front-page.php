<?php
/*
 * The template for front page
 */

get_header();
?>

<section class="section from-right first-section">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
            <h1>building for good</h1>
            <p>Jesteśmy deweloperem powierzchni magazynowo-przemysłowych. Zarządzamy budową, wynajmujemy powierzchnie, poszukujemy gruntów, rozwijamy nowoczesne i ekologiczne budynki na terenie całego kraju.</p>
            <a href="/mdc2/o-nas" class="btn outline medium icon-right">Zobacz jak działamy</a>
        </div>
    </div>
</section>

<section class="row-full img-full section from-left">
    <img src="/mdc2/wp-content/uploads/2024/08/mdc2-main-img2_b.jpg" alt="mdc2 deweloper powierzchni magazynowo-przemysłowych">
</section>

<section id="home-numbers" class="section from-right">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
            <div><span class="counter" data-target="175000">175 000</span> <span>m²</span> <p class="mobile-d-block">w trakcie realizacji</p></div>
            <div><span class="counter" data-target="10000000">10 000 000</span> <span>m²</span> <p class="mobile-d-block">w przygotowaniu do 2025 r.</p></div>
            <div><span class="counter" data-target="10000000">10 000 000</span> <span>m²</span> <p class="mobile-d-block">zbudowanej i wynajętej powierzchni</p></div>
            <div><span class="counter" data-target="20">Ponad 20</span> <span>lat</span> <p class="mobile-d-block">doświadczenia w branży nieruchomości</p></div>
        </div>
    </div>
</section>

<section id="news" class="section from-left">
    <h2 class="header-underline">Latest news</h2>
    <?php echo do_shortcode('[blogloop]'); ?>
    <a href="/mdc2/news/" class="btn outline medium icon-right"><?php echo __('Zobacz wszystkie', 'nekonet') ;?></a>
</section>

<?php
get_footer();
