<?php
/*
 * Displays the site navigation if Woocommerce is active.
 */

?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
    <div class="hamburger-menu"><a class="icon-menu-1"></a></div>
    <nav id="site-navigation" class="primary-navigation woocommerce-primary-navigation" role="navigation"
         aria-label="<?php esc_attr_e( 'Primary menu', 'nekonet' ); ?>">
        <div class="menu-button-container">
            <button id="primary-mobile-menu" class="button btn --outline" aria-controls="primary-menu-list" aria-expanded="false">
                <span class="icon-cancel-1"><?php esc_html_e( 'Close', 'nekonet' ); ?></span>
            </button><!-- #primary-mobile-menu -->
        </div><!-- .menu-button-container -->
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary',
                'menu_class'      => 'menu-wrapper',
                'container_class' => 'primary-menu-container',
                'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                'fallback_cb'     => false,
            )
        );
        ?>
        <div class="woocommerce-icons">
            <div id="header-search">
                <a href="#" class="icon-search"></a>
                <div class="header-search-form">
                    <a href="#" class="icon-cancel-1"></a>
                    <?php get_product_search_form() ?>
                </div>
            </div>
            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ) ?>" class="icon-user-circle" title="<?php echo esc_html__('My Account', 'nekonet') ?>"></a>
            <div id="header-basket">
                <a href="<?php echo wc_get_cart_url() ?>" class="icon-basket" title="<?php echo esc_html__('Basket', 'nekonet') ?>"></a>
                <?php
                    global $woocommerce;
                    $count = $woocommerce->cart->cart_contents_count;
                echo '<span class="basket-quantity">' . $count . '</span>';
                ?>

                <div id="mini-cart" class="woocommerce">
                    <h3>
                        <?php
                        /*header-basket title*/
                        echo __('Cart', 'nekonet');
                        ?>
                    </h3>
                    <div class="widget_shopping_cart_content">
                        <?php woocommerce_mini_cart(); ?>
                    </div>
                </div>


            </>
        </div>
    </nav><!-- #site-navigation -->
<?php endif; ?><?php
