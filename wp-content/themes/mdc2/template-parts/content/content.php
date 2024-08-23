<?php
/*
 * Template part for displaying posts
 */

?>
    <?php

        $tags = get_the_category();
        $tag_list = '';
        if ($tags) {
            foreach ($tags as $tag) {
                $category_link = get_category_link($tag->term_id);
                $tag_list .= '<div class="tag"><a href="' . esc_url($category_link) . '">#' . $tag->name . '</a></div>';
            }
        }

        $excerpt = get_field('skrocony_opis');

        // Trim the excerpt to 172 characters without cutting words
        if (strlen($excerpt) > 172) {
            $excerpt = mb_substr($excerpt, 0, 172, 'UTF-8');
            $excerpt = preg_replace('/\s+?(\S+)?$/', '', $excerpt);
            $excerpt .= '...';
        }

    ?>
        <div class="blog-loop-wrapper">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="blog-loop-thumbnail">
                    <?php the_post_thumbnail('team_thumbnail'); ?>
                </div>
            <?php endif; ?>
            <div class="blog-loop-content">
                <div class="blog-loop-tags"><?php echo trim($tag_list); ?></div>
                <p class="blog-loop-date"><?php echo get_the_date('d M Y'); ?></p>
                <p class="blog-loop-excerpt"><?php echo $excerpt; ?></p>
                <a class="btn outline small icon-right" href="<?php the_permalink(); ?>"><?php _e('Więcej', 'nekonet'); ?></a>
            </div>
        </div>
