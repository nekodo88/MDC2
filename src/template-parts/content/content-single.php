<?php
/*
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php the_post_thumbnail(); ?>
        <div class="post-categories">
            <?php
            global $post;
            $catID = get_the_category( $post->ID );
            if ( ! empty( $catID ) ) {
                foreach ($catID as $postcat ) {
                    $catLink = get_category_link($postcat);
                    echo '<a href="' . $catLink . '">' . $postcat->name . '</a>';
                }
            }
            ?>
        </div>
	</header>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'nekonet' ) . '">',
				'after'    => '</nav>',
				/* translators: %: page number. */
				'pagelink' => esc_html__( 'Page %', 'nekonet' ),
			)
		);
		?>
	</div><!-- .entry-content -->


	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
