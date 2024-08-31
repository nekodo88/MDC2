<?php
/* Template Name: Offer details */
global $post;

$offer_person = null;
$slider_images_ids = get_field( "slider", $post->ID);
if(get_field('person')) {
    $offer_person = get_post(get_field('person'));
}
//var_dump($slider_images_ids); die;
if(is_array($slider_images_ids)) {
    $data = [];
    foreach($slider_images_ids as $item) {
        $data[] = $item['id'];
    }
    $slider_images_ids = implode(',',$data);
}

$estates = get_warehouses();
?>
<?php get_header(); ?>


            <?php if(!empty($slider_images_ids) && is_string($slider_images_ids)): ?>
                <div id="warehouse-slider" class="row-full img-full warehouse-img">

                    <?php foreach(explode(',',$slider_images_ids) as $slide_img_id): ?>
                        <?php $img_url = wp_get_attachment_image_url( $slide_img_id, 'slider-image');?>
                        <?php if($img_url): ?>
                                <img src="<?php echo $img_url; ?>" alt="<?php echo $post->post_title; ?>" />
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <div class="row" id="warehouse-content">
            <div class="col-8">
                <h1 class="header-underline green-color"><?php echo $post->post_title; ?></h1>
                <div class="address">
                    <a href="<?php if($field = get_field( "link_do_google_maps", $post->ID )) echo $field.', '; ?>" target="_blank" rel="nofollow">
                        <?php if($field = get_field( "adres_ulica", $post->ID )) echo $field.', '; ?>
                        <?php if($field = get_field( "adres_kod_pocztowy", $post->ID )) echo $field; ?>
                        <?php if($field = get_field( "adres_miejscowosc", $post->ID )) echo $field.', '; ?>
                        <?php if($field = get_field( "adres_kraj", $post->ID )) echo $field; ?>
                        <input type="hidden" name="offer_map_address" value="<?php echo get_field( "adres_maplocation", $post->ID ) ?>" />
                    </a>
                </div>

                <div class="warehouse-details">
                    <ul>
                        <?php if($field = get_field( "options1", $post->ID )): ?>
                        <li>
                            <?php echo __('Dostępna powierzchnia: ', 'nekonet'); ?>
                            <span><?php echo $field; ?> m²</span>
                        </li>
                        <?php endif; ?>
                        <?php if($field = get_field( "options2", $post->ID )): ?>
                        <li>
                            <?php echo __('Możliwa ekspansja: ', 'nekonet'); ?>
                            <span><?php echo $field; ?> m²</span>
                        </li>
                        <?php endif; ?>
                        <?php if($field = get_field( "options3", $post->ID )): ?>
                        <li>
                            <?php echo __('Powierzchnia zabudowy: ', 'nekonet'); ?>
                            <span><?php echo $field; ?> m²</span>
                        </li>
                        <?php endif; ?>
                        <?php if($field = get_field( "options4", $post->ID )): ?>
                        <li>
                            <?php echo __('Powierzchnia działki: ', 'nekonet'); ?>
                            <span><?php echo $field; ?> ha</span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="content-txt"><?php if($field = get_field( "opis", $post->ID )) echo $field; ?></div>
                <div class="textbox clearfix">
                    <div class="txtbox fl">
                        <?php if($field = get_field( "opis2", $post->ID )) echo $field; ?>
                    </div>
                </div>
            </div>
            <div class="sidebar col-4">
                <?php if(!empty($offer_person)): ?>
                <div class="person-details">
                    <div class="imgbox">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer_person->ID ), 'person-image' ); ?>
                        <?php if(isset($image[0])): ?>
                            <img src="<?php echo $image[0] ?>" alt="" />
                        <?php endif; ?>
                    </div>
                    <div class="title"><?php echo $offer_person->post_title; ?></div>
                    <div class="pos"><?php if($field = get_field( "pozycja", $offer_person->ID )) echo $field; ?></div>
                    <?php if($field = get_field( "adres_email", $offer_person->ID )): ?>
                    <div class="data"><a href="mailto:<?php echo $field; ?>"><?php echo $field; ?></a></div>
                    <?php endif; ?>
                    <?php if($field = get_field( "adres_email", $offer_person->ID )): ?>
                        <div class="align-center"><a href="javascript:void(0)" data-offerid="<?php echo $post->ID; ?>" class="btn solid medium icon-right secondary"><?php echo __('Wyślij zapytanie', 'nekonet'); ?></a></div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if(!empty(get_field( "adres_maplocation", $post->ID ))): ?>
                <div id="offer-mapbox">

                </div>
                <?php endif; ?>
            </div>
        </div>
        <section id="benefits" class="row align-center icon-section">
            <div class="col-12">
                <h3><?php echo __('W ramach projektu oferujemy najemcom', 'nekonet'); ?>:</h3>

                <div class="icon-list row">
                    <div class="icon-item col-2dot4">
                        <div class="icon">
                            <img src="/mdc2/wp-content/uploads/2024/07/mdc2_icon_ev_chargers.svg" alt="" />
                        </div>
                        <div class="title"><?php echo __('Ładowarki do pojazdów elektrycznych', 'nekonet'); ?></div>
                    </div>
                    <div class="icon-item col-2dot4">
                        <div class="icon">
                            <img src="/mdc2/wp-content/uploads/2024/07/mdc2_icon_monitoring.svg" alt="energy consumption" />
                        </div>
                        <div class="title"><?php echo __('System monitoringu zużycia mediów', 'nekonet'); ?></div>
                    </div>
                    <div class="icon-item col-2dot4">
                        <div class="icon">
                            <img src="/mdc2/wp-content/uploads/2024/07/mdc2_icon_eco_standrads.svg" alt="" />
                        </div>
                        <div class="title"><?php echo __('Ekologiczne certyfikowane budynki', 'nekonet'); ?></div>
                    </div>
                    <div class="icon-item col-2dot4">
                        <div class="icon">
                            <img src="/mdc2/wp-content/uploads/2024/07/mdc2_icon_outdoor_gym.svg" alt="" />
                        </div>
                        <div class="title"><?php echo __('Zewnętrzne strefy relaksu', 'nekonet'); ?></div>
                    </div>
                    <div class="icon-item col-2dot4">
                        <div class="icon">
                            <img src="/mdc2/wp-content/uploads/2024/07/mdc2_icon_rainwater.svg" alt="" />
                        </div>
                        <div class="title"><?php echo __('Recykling wody deszczowej', 'nekonet'); ?></div>
                    </div>
                </div>

            </div>
        </section>

        <div class="download-section align-center">
            <?php if($file_field = get_field( "plik_pdf", $post->ID )): ?>
                <a href="<?php /*echo $file_field;*/ ?>" target="_blank" class="btn outline medium icon-right"><?php echo __('Pobierz PDF', 'nekonet'); ?></a>
                
                <?php
                $pdf_url = get_field('plik_pdf', $post->ID);

                if( $pdf_url ):
                ?>

                <script>
                    document.addEventListener('wpcf7mailsent', function(event) {
                        setTimeout(() => {
                            // Otwórz plik PDF w nowym oknie przeglądarki lub rozpocznij pobieranie
                            window.location.href = '<?php echo esc_url($pdf_url); ?>';
                        }, 3000); // Czekaj 3 sekundy przed przekierowaniem
                    }, false);
                </script>

                <?php endif;?>

            <?php endif; ?>
        </div>

        <?php $image = wp_get_attachment_image_src( get_field( "plan_grafika", $post->ID ), 'slider-image' ); ?>
        <?php if(isset($image[0])): ?>

        <div id="mapbox">
            <h3 class="align-center"><?php echo __('Plan sytuacyjny centrum logistycznego', 'nekonet'); ?></h3>
            <div class="map row-full img-full">
                <img src="<?php echo $image[0]; ?>" alt="map" />
            </div>
        </div>

        <?php endif; ?>
<?php

$gallery_imgs = get_field( "galeria", $post->ID );

//if(!is_array($gallery_imgs)) {
//    $gallery_imgs = explode(',',$gallery_imgs);
//}

?>
<?php if(!empty($gallery_imgs)): ?>
<section id="warehouse-gallery" class="row">
            <?php foreach($gallery_imgs as $slide_img_id): ?>
                <?php
                $img_url = wp_get_attachment_image_src( $slide_img_id['id'], 'rozwoj-image');
                ?>
                <?php if($img_url[0]): ?>
                    <div class="img col-3">
                        <a href="<?php echo $img_url[0]; ?>" rel="lightbox[1]"><img src="<?php echo $img_url[0]; ?>" alt="" /></a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
</section>
<?php endif; ?>
    <?php if($field = get_field( "tresci_seo", $post->ID )): ?>
    <section id="warehouse-bottom-contentbox">
        <div class="inner">
            <div class="content">
                <?php if($field = get_field( "tresci_seo", $post->ID )) echo $field; ?>
            </div>
        </div>
        <div class="align-center">
            <div class="btns">
                <a href="javascript:void(0)" data-offerid="<?php echo $post->ID; ?>" class="btn outline medium icon-right"><?php echo __('Wyślij zapytanie', 'nekonet'); ?></a>
                <a href="tel:+48501791000" class="btn solid medium icon-right secondary"><?php echo __('Zadzwoń', 'nekonet'); ?></a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section>
        <h3 class="align-center"><?php echo __('Zobacz inne nasze obiekty:'); ?></h3>
    <div id="warehouses-list">
                <?php if(!empty($estates)): ?>
                    <?php foreach($estates as $estate): ?>
                        <?php if ($estate->ID == $post->ID) continue; ?>
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
    </section>
    
    <!-- POPUP -->

    <div id="popup_contact">
        <div class="row">
            <div class="col-4">
                <h3><?php echo __('Kontakt', 'nekonet'); ?></h3>

                <?php $offer_person = get_post(get_field('person'));?>

                <?php if(!empty($offer_person)): ?>
                <div class="person-details">
                    <div class="imgbox">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $offer_person->ID ), 'person-image' ); ?>
                        <?php if(isset($image[0])): ?>
                            <img src="<?php echo $image[0] ?>" alt="" />
                        <?php endif; ?>
                    </div>
                    <div class="title"><?php echo $offer_person->post_title; ?></div>
                    <div class="pos"><?php if($field = get_field( "pozycja", $offer_person->ID )) echo $field; ?></div>
                    <?php if($field = get_field( "adres_email", $offer_person->ID )): ?>
                    <div class="data"><a href="mailto:<?php echo $field; ?>"><?php echo $field; ?></a></div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="warehouse-detail">

                <h3><?php echo $post->post_title; ?></h3>
                    <div class="address">
                        <a href="<?php if($field = get_field( "link_do_google_maps", $post->ID )) echo $field.', '; ?>" target="_blank" rel="nofollow">
                            <?php if($field = get_field( "adres_ulica", $post->ID )) echo $field.', '; ?>
                            <?php if($field = get_field( "adres_kod_pocztowy", $post->ID )) echo $field; ?>
                            <?php if($field = get_field( "adres_miejscowosc", $post->ID )) echo $field.', '; ?>
                            <?php if($field = get_field( "adres_kraj", $post->ID )) echo $field; ?>
                            <input type="hidden" name="offer_map_address" value="<?php echo get_field( "adres_maplocation", $post->ID ) ?>" />
                        </a>
                    </div>
                </div>
                
            </div>
            <div class="col-8"><?php echo do_shortcode('[contact-form-7 id="04a0219" title="Formularz 1"]') ;?></div>
        </div>

        <div class="close"><i class="icon-cancel close"></i></div>
    </div>

<?php get_footer(); ?>