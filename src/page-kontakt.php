<?php
/* Template Name: Kontakt */

?>

<?php get_header(); ?>

<?php 
//the_title( '<h1 class="entry-title header-underline">', '</h1>' );
?>

<section id="contact-map" class="row-full">
<div id="acf-map">
    <div id="markers">
        <?php if( $map_location = get_field('map_location')) :?>

            <?php
                $map_lat = explode(',', $map_location)[0];
                $map_lng = explode(',', $map_location)[1];
            ?>

            <div class="marker" id="marker-1" data-lat="<?php echo $map_lat; ?>" data-lng="<?php echo $map_lng ?>">
                <h3>MDC² Sp. z o.o.</h3>
                <p>Królewska 18<br>
                00-103 Warszawa<br>
                Polska
                </p>
            </div>
        <?php endif ?>
</div>

</section>

<section id="contact" class="row">
    <div class="col-6">
            <h3 class="section-headline"><?php if($field = get_field( "section1_headline" )) echo $field; ?></h3>
            <div class="txtbox">
                <?php if($field = get_field( "section1_text" )) echo $field; ?>
            </div>
    </div>
    <div class="col-6">
                <?php echo do_shortcode('[contact-form-7 id="04a0219" title="Formularz 1"]') ;?>
    </div>
</section>
<?php get_footer(); ?>
