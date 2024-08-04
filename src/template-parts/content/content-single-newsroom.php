<?php
/* Template Name: Aktualnosci details */
global $post;
?>
<?php get_header(); ?>
<section id="news-content">

    <h2 class="header-underline">Newsroom</h2>

    <div class="row">
        <div class="col-4">
            <a href="/mdc2/news/" class="btn outline small icon-left">Zobacz wszystkie</a>
        </div>

        <div class="col-8">
            <div class="inner">
                <p class="date"><?php echo get_the_date('d.M.Y'); ?></p>
                <h1 class="title"><?php echo $post->post_title; ?></h1>
                <?php if(!empty($header_img = get_field( "grafika_glowna", $post->ID ))): ?>
                <div class="imgbox">
                    <img src="<?php echo $header_img; ?>" alt="<?php echo $post->post_title; ?>" />
                </div>
                <?php endif; ?>
                <div class="content">
                    <?php if($field = get_field( "opis", $post->ID )) echo $field; ?>
                </div>
            </div>
        </div>
    </div>

</section>
<?php get_footer(); ?>