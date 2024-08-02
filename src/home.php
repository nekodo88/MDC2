<?php
/*
 * The template for displaying archive pages
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

    <header class="page-header alignwide">
        <h1 class="header-underline">Newsroom</h1>
        <?php if ( $description ) : ?>
            <div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
        <?php endif; ?>
    </header><!-- .page-header -->

    <div class="blog-loop">
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
            <?php get_template_part( 'template-parts/content/content' ) ?>
        <?php endwhile; ?>
    </div>
    <nav class="pagination">
        <?php pagination_bar(); ?>
    </nav>

<?php else : ?>
    <?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
