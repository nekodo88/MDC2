<?php
/*
 * Displays the sidebar widget area.
 */

if ( is_active_sidebar( 'sidebar-social' ) ) : ?>

    <aside class="sidebar-social">
        <?php dynamic_sidebar( 'sidebar-social' ); ?>
    </aside><!-- .widget-area -->

<?php endif; ?>