<?php
/*
 * Displays the site header.
*/

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">

    <div class="header-content">
        <?php get_template_part( 'template-parts/header/site-branding' ); ?>

        <div id="nav-wrapper">
            <?php if(class_exists('woocommerce')): ?>
                <?php get_template_part( 'template-parts/header/site-nav-woocommerce' ); ?>
            <?php else:?>
                <?php get_template_part( 'template-parts/header/site-nav' ); ?>
            <?php endif;?>
        </div>

    </div>

</header><!-- #masthead -->