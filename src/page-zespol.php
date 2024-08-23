<?php
/* Template Name: Teams */

$people_list = get_posts(
    [
        'post_type' => 'team',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'team-cat',
                'field' => 'slug',
                'terms' => 'dzial-ds-rozwoju'
            )
        )
    ]
);

$people_list2 = get_posts(
    [
        'post_type' => 'team',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'team-cat',
                'field' => 'slug',
                'terms' => 'dzial-operacyjno-budowlany'
            )
        )
    ]
);

$people_list3 = get_posts(
    [
        'post_type' => 'team',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'team-cat',
                'field' => 'slug',
                'terms' => 'dzial-marketingowy-i-administracyjny'
            )
        )
    ]
);

$people_list4 = get_posts(
    [
        'post_type' => 'team',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'team-cat',
                'field' => 'slug',
                'terms' => 'rada-nadzorcza'
            )
        )
    ]
);

$people_list5 = get_posts(
    [
        'post_type' => 'team',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'team-cat',
                'field' => 'slug',
                'terms' => 'zarzad'
            )
        )
    ]
);

?>
<?php get_header(); ?>


<section class="first-section">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-8">
            <p>Jesteśmy grupą doświadczonych profesjonalistów z branży nieruchomości komercyjnych. Członkowie naszego
                zespołu w ciągu ponad 20 lat zbudowali i wynajęli blisko 10 mln m<sup>2</sup> magazynów w Polsce. Każdy z nas
                posiada bogate doświadczenie w branży nieruchomości komercyjnych potwierdzone wieloma umowami najmu lub
                zakupu.</p>
            <p class="green-color">Poznajmy się</p>
            <i class="icon-arrow-long rotate90 green-color"></i>
        </div>
    </div>
</section>

<section class="row-full img-full">
    <img src="/mdc2/wp-content/uploads/2024/08/mdc2_team_b.jpg" alt="MDC2 zespół">
</section>

<section class="about-peoplebox white">
    <h2 class="header-underline"><?php echo __('Zarząd', 'nekonet') ;?></h2>
    <div class="inner">
        <div class="container-fluid">
            <?php if(!empty($people_list5)): ?>
            <div class="items row">
                <?php foreach($people_list5 as $person): ?>
                <div class="itembox col-3">
                    <div class="box">
                        <div>
                            <div class="img">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $person->ID ), 'person-image' ); ?>
                                <?php if(isset($image[0])): ?>
                                <img src="<?php echo $image[0] ?>" alt="" />
                                <?php endif; ?>

                            </div>
                            <div class="box-header">
                                <div>
                                    <div class="title"><?php echo $person->post_title; ?></div>
                                    <div class="pos"><?php if($field = get_field( "pozycja", $person->ID )) echo $field; ?></div>
                                </div>
                                <div>
                                    <?php if($field = get_field( "linkedin_link", $person->ID )): ?>
                                    <a href="<?php echo $field; ?>" target="_blank" rel="nofollow" class="link_in"><i class="icon-linkedin-squared"
                                    aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <p class="txt">
                            <?php if($field = get_field( "skrocony_opis", $person->ID )) echo $field; ?></p>
                            <a href="<?php echo get_permalink($person); ?>"
                            class="btn outline small icon-right"><?php echo __('Więcej', 'nekonet'); ?></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="about-peoplebox">
    <h2 class="header-underline"><?php echo __('Rada dyrektorów', 'nekonet') ;?></h2>
    <div class="inner">
        <div class="container-fluid">
            <?php if(!empty($people_list4)): ?>
            <div class="items row">
                <?php foreach($people_list4 as $person): ?>
                <div class="itembox col-3">
                    <div class="box">
                        <div>
                            <div class="img">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $person->ID ), 'person-image' ); ?>
                                <?php if(isset($image[0])): ?>
                                <img src="<?php echo $image[0] ?>" alt="" />
                                <?php endif; ?>
                            </div>
                            <div class="box-header">
                                <div>
                                    <div class="title"><?php echo $person->post_title; ?></div>
                                    <div class="pos"><?php if($field = get_field( "pozycja", $person->ID )) echo $field; ?></div>
                                </div>
                                <div>
                                    <?php if($field = get_field( "linkedin_link", $person->ID )): ?>
                                    <a href="<?php echo $field; ?>" target="_blank" rel="nofollow" class="link_in"><i class="icon-linkedin-squared"
                                    aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <p class="txt">
                            <?php if($field = get_field( "skrocony_opis", $person->ID )) echo $field; ?></p>
                            <a href="<?php echo get_permalink($person); ?>"
                            class="btn outline small icon-right"><?php echo __('Więcej', 'nekonet'); ?></a>
                                    
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="about-peoplebox white">
    <h2 class="header-underline"><?php echo __('Dział rozwoju nieruchomości', 'nekonet') ;?></h2>
    <div class="inner">
        <div class="container-fluid">
            <?php if(!empty($people_list)): ?>
            <div class="items row">
                <?php foreach($people_list as $person): ?>
                <div class="itembox col-3">
                    <div class="box">
                        <div>
                            <div class="img">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $person->ID ), 'person-image' ); ?>
                                <?php if(isset($image[0])): ?>
                                <img src="<?php echo $image[0] ?>" alt="" />
                                <?php endif; ?>
                            </div>
                            <div class="box-header">
                                <div>
                                    <div class="title"><?php echo $person->post_title; ?></div>
                                    <div class="pos"><?php if($field = get_field( "pozycja", $person->ID )) echo $field; ?></div>
                                </div>
                                <div>
                                    <?php if($field = get_field( "linkedin_link", $person->ID )): ?>
                                    <a href="<?php echo $field; ?>" target="_blank" rel="nofollow" class="link_in"><i class="icon-linkedin-squared"
                                    aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <p class="txt">
                            <?php if($field = get_field( "skrocony_opis", $person->ID )) echo $field; ?></p>
                            <a href="<?php echo get_permalink($person); ?>"
                            class="btn outline small icon-right"><?php echo __('Więcej', 'nekonet'); ?></a>
                                    
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="about-peoplebox">
    <h2 class="header-underline"><?php echo __('Dział operacyjno-budowlany', 'nekonet') ;?></h2>
    <div class="inner">
        <div class="container-fluid">
            <?php if(!empty($people_list2)): ?>
            <div class="items row">
                <?php foreach($people_list2 as $person): ?>
                <div class="itembox col-3">
                    <div class="box">
                        <div>
                            <div class="img">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $person->ID ), 'person-image' ); ?>
                                <?php if(isset($image[0])): ?>
                                <img src="<?php echo $image[0] ?>" alt="" />
                                <?php endif; ?>
                            </div>
                            <div class="box-header">
                                <div>
                                    <div class="title"><?php echo $person->post_title; ?></div>
                                    <div class="pos"><?php if($field = get_field( "pozycja", $person->ID )) echo $field; ?></div>
                                </div>
                                <div>
                                    <?php if($field = get_field( "linkedin_link", $person->ID )): ?>
                                    <a href="<?php echo $field; ?>" target="_blank" rel="nofollow" class="link_in"><i class="icon-linkedin-squared"
                                    aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <p class="txt">
                            <?php if($field = get_field( "skrocony_opis", $person->ID )) echo $field; ?></p>
                            <a href="<?php echo get_permalink($person); ?>"
                            class="btn outline small icon-right"><?php echo __('Więcej', 'nekonet'); ?></a>
                                    
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="about-peoplebox white">
    <h2 class="header-underline"><?php echo __('Dział marketingu i administracji', 'nekonet') ;?></h2>
    <div class="inner">
        <div class="container-fluid">
            <?php if(!empty($people_list3)): ?>
            <div class="items row">
                <?php foreach($people_list3 as $person): ?>
                <div class="itembox col-3">
                    <div class="box">
                        <div>
                            <div class="img">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $person->ID ), 'person-image' ); ?>
                                <?php if(isset($image[0])): ?>
                                <img src="<?php echo $image[0] ?>" alt="" />
                                <?php endif; ?>
                            </div>
                            <div class="box-header">
                                <div>
                                    <div class="title"><?php echo $person->post_title; ?></div>
                                    <div class="pos"><?php if($field = get_field( "pozycja", $person->ID )) echo $field; ?></div>
                                </div>
                                <div>
                                    <?php if($field = get_field( "linkedin_link", $person->ID )): ?>
                                    <a href="<?php echo $field; ?>" target="_blank" rel="nofollow" class="link_in"><i class="icon-linkedin-squared"
                                    aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <p class="txt">
                            <?php if($field = get_field( "skrocony_opis", $person->ID )) echo $field; ?></p>
                            <a href="<?php echo get_permalink($person); ?>"
                            class="btn outline small icon-right"><?php echo __('Więcej', 'nekonet'); ?></a>
                                    
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>