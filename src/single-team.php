<?php
/* Template Name: Person details */
global $post;

$posts = get_posts(array(
    'numberposts'	=> -1,
    'post_type'		=> 'warehouse',
    'meta_key'		=> 'person',
    'meta_value'	=> $post->ID
));

$estate_locations = get_terms( 'warehouse-cat', array(
    'hide_empty' => false,
));

?>
<?php get_header(); ?>
<section id="team-content">

    <h2 class="header-underline">Zespół</h2>

    <div class="row">
        <div class="col-4">
            <a href="/mdc2/zespol/" class="btn outline medium icon-left">Zobacz wszystkich</a>
        </div>
        <div class="col-8">

            <div class="img">
                <?php 
                    //$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'person-image' ); 

                    $image = get_field('zdjecie_glowne', $post->ID);
                ?>
                <?php 
                //if(isset($image[0])): 
                if(isset($image)): 
                ?>
                <img src="<?php echo $image ?>" alt="" />
                <?php endif; ?>
            </div>

            <div class="box-header">
                <div>
                    <h1 class="title"><?php echo $post->post_title; ?></h1>
                    <div class="pos"><?php if($field = get_field( "pozycja", $post->ID )) echo $field; ?></div>
                </div>
                <div class="icons">
                    <?php if($field = get_field( "linkedin_link", $post->ID )): ?>
                    <a href="<?php echo $field; ?>" target="_blank" rel="nofollow" class="link_in"><i class="icon-linkedin-squared"
                            aria-hidden="true"></i></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="data-contact-wrapper">
                        <?php if($field = get_field( "numer_telefonu", $post->ID )): ?>
                        <span class="data-contact">M: <a href="tel:<?php echo str_replace(' ', '', $field) ;?>"><?php echo $field; ?></a></span>
                        <?php endif; ?>
                        <?php if($field = get_field( "adres_email", $post->ID )): ?>
                        <a href="mailto:<?php echo $field; ?>" target="_blank"
                            class="data-contact"><?php echo $field; ?></a>
                        <?php endif; ?>
            </div>

            <div class="description">
                    <?php if($field = get_field( "opis", $post->ID )) echo $field; ?>
            </div>
        </div>
    </div>

    <!-- WAREHOUSES -->

    <?php if(!empty($posts)): ?>
            <div class="warehouses-list">
                <h3 class="header-underline"><?php echo __('Doradzę w sprawie nieruchomości', 'nekonet'); ?></h3>
                <?php foreach($posts as $estate): ?>
                    
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
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            
</section>
<?php get_footer(); ?>