<?php
/* Template Name: Warehouses Archive */
global $wp;
$current_slug = $wp->request;

$estate_locations = get_terms( 'warehouse-cat', array(
    'hide_empty' => false,
));
$search_data = [
    'location' => $_GET['location'],
    'size' => $_GET['size']
];

$estates = get_warehouses($search_data);

?>
<?php get_header(); ?>
<?php
global $presentUrl;
$page = get_page_by_path( $presentUrl);
$page_seo_descr = get_field( "tresci_seo2", $page->ID );

?>

<section id="warehouses-map" class="row-full">
    <div id="acf-map">
        <div id="markers">

        <?php if(!empty($estates)): ?>
        <?php foreach($estates as $estate): ?>

        <?php 
            if($field = get_field( "adres_maplocation", $estate->ID )) {
                $map_lat = explode(',', $field)[0];
                $map_lng = explode(',', $field)[1];
            } 
        ?>

        <div class="marker" id="marker-1" data-lat="<?php echo $map_lat; ?>" data-lng="<?php echo $map_lng ?>">
            <h3><?php echo $estate->post_title; ?></h3>
            <a href="<?php echo get_permalink( $estate->ID ); ?>" class="btn solid medium"><?php echo __('Szczegóły', 'nekonet'); ?></a>
        </div>

        <?php endforeach; ?>
        <?php endif; ?>

        </div>
    </div>

    <div id="warehouse-searchbox">
                <h3 class="section-headline"><?php echo __('Znajdź nieruchomość', 'nekonet'); ?>:</h3>
                <form>
                    <select name="location" id="location">
                        <option value=""><?php echo __('Lokalizacja', 'nekonet'); ?></option>
                        <?php if(!empty($estate_locations)): ?>
                            <?php foreach($estate_locations as $loc): ?>
                                <option value="<?php echo $loc->name ?>" <?php if($_GET['location'] == $loc->term_id) echo 'selected'; ?>><?php echo $loc->name ?></option>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </select>

                    <input type="text" name="size" id="size" value="<?php if(!empty($_GET['size'])) echo $_GET['size'] ?>" placeholder="<?php echo __('Powierzchnia', 'nekonet'); ?>" />
                    
                    <a class="btn solid medium" id="search-button"><?php echo __('Szukaj', 'nekonet') ;?></a>

                </form>
            </div>

</section>

            <div id="warehouses-list">
                <?php if(!empty($estates)): ?>
                    <?php foreach($estates as $estate): ?>
                        <div class="warehouse-item">
                            <?php $image = wp_get_attachment_image_src( get_field( "grafika_glowna", $estate->ID ), 'warehouse_thumbnail' ); ?>
                            
                            <div class="row">
                                <div class="col-4">
                                    <div class="img">
                                        <?php if(isset($image[0])): ?>
                                            <img src="<?php echo $image[0]; ?>" alt="" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="col-8">

                                    <h3 class="title green-color"><?php echo $estate->post_title; ?></h3>
                                    <?php if($estate->location_term): ?>
                                        <div class="city"><?php echo $estate->location_term->name; ?></div>
                                    <?php endif; ?>

                                    <div class="warehouse-details">
                                        <ul>
                                        <?php if($field = get_field( "options1", $estate->ID )): ?>
                                            <li><?php echo __('Dostępna powierzchnia', 'nekonet'); ?>: <span><?php if($field = get_field( "options1", $estate->ID )) echo $field; ?> m<sup>2</sup></span></li>
                                        <?php endif; ?>
                                        <?php if($field = get_field( "options3", $estate->ID )): ?>
                                            <li><?php echo __('Powierzchnia zabudowy', 'nekonet'); ?>: <span><?php if($field = get_field( "options3", $estate->ID )) echo $field; ?> m<sup>2</sup></span></li>
                                        <?php endif; ?>
                                        <?php if($field = get_field( "options4", $estate->ID )): ?>
                                            <li><?php echo __('Powierzchnia działki', 'nekonet'); ?>: <span><?php if($field = get_field( "options4", $estate->ID )) echo $field; ?> ha</span></li>
                                        <?php endif; ?>
                                        </ul>
                                    </div>

                                    <div class="txt">
                                        <?php if($field = get_field( "skrocony_opis", $estate->ID )) echo ($field); ?>
                                    </div>
                                    <div class="btns row">
                                        <a href="<?php echo get_permalink( $estate->ID ); ?>" class="btn outline medium"><?php echo __('Szczegóły', 'nekonet'); ?></a>

                                        <?php
                                            $offer_person = null;
                                            if(get_field('person', $estate->ID)) {
                                                $offer_person = get_post(get_field('person', $estate->ID));
                                            }
                                        ;?>

                                        <?php if(!empty($offer_person)): ?>
                                            <?php $offer_person_url = get_permalink($offer_person->ID); ?>
                                        <a href="<?php echo $offer_person_url; ?>" data-offerid="<?php echo $estate->ID; ?>" class="btn outline medium icon-right"><?php echo __('Kontakt', 'nekonet'); ?></a>
                                        <?php endif; ?>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>


<?php if($page_seo_descr): ?>
    <section id="offerpage-bottom-contentbox">
        <div class="inner">
            <div class="content">
                <?php echo $page_seo_descr; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>
