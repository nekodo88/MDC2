<?php
/*
 * Template part for displaying post archives and search results
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php get_template_part( 'template-parts/header/excerpt-header', get_post_format() ); ?>

    <div class="entry-content">
        <?php get_template_part( 'template-parts/excerpt/excerpt', get_post_format() ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
    </footer><!-- .entry-footer -->
</article><!-- #post-${ID} -->
