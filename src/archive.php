<?php
/*
 * The template for displaying archive pages
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

    <header class="page-header alignwide">
        <?php the_archive_title( '<h1 class="header-underline">', '</h1>' ); ?>
        <?php if ( $description ) : ?>
            <div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
        <?php endif; ?>
    </header><!-- .page-header -->

    <?php
    $categories = get_categories(array(
        'hide_empty' => true,
    ));

    echo '<div class="categories-list">';
    if ($categories) {
        foreach ($categories as $category) {
            $category_link = get_category_link($category->term_id);
            $current_class = '';

            if (is_category($category->term_id)) {
                $current_class = ' current';
            }

            echo '<a href="' . esc_url($category_link) . '" class="btn outline small' . $current_class . '">' . esc_html($category->name) . '</a>';
        }
    } else {
        echo '<p>Nie znaleziono kategorii.</p>';
    }
    echo '</div>';
    ?>


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
