<?php
/*
 * Displays the sidebar widget area.
 */

if (class_exists('woocommerce')) :

    if (is_active_sidebar('primary-sidebar') && (
        !is_front_page()
        && is_page()
        && !is_woocommerce()
        && !is_cart()
        && !is_account_page()
        && !is_checkout())
    ) : ?>
        <div id="primary-sidebar" class="sidebar">
            <?php dynamic_sidebar('primary-sidebar'); ?>
        </div>
    <?php endif; ?>

    <?php if (is_active_sidebar('woocommerce-sidebar') && (
        is_woocommerce()
        && !is_product())
) : ?>
        <div id="woocommerce-sidebar" class="sidebar">
            <?php dynamic_sidebar('woocommerce-sidebar'); ?>
        </div>
    <?php endif; ?>

    <?php if (is_active_sidebar('blog-sidebar') && (
        is_archive()
        && !is_woocommerce()
        && !is_product()
        || is_single()
        && !is_woocommerce()
        && !is_product())
    ) : ?>
        <div id="blog-sidebar" class="sidebar">
            <?php dynamic_sidebar('blog-sidebar'); ?>
        </div>
    <?php endif; ?>

<?php else:

if (is_active_sidebar('primary-sidebar') && (
    !is_front_page()
    && is_page())
    ) : ?>
    <div id="primary-sidebar" class="sidebar">
        <?php dynamic_sidebar('primary-sidebar'); ?>
    </div>
<?php endif; ?>

<?php if (is_active_sidebar('blog-sidebar') && (
    is_archive()
    || is_single())
    ) : ?>
    <div id="blog-sidebar" class="sidebar">
        <?php dynamic_sidebar('blog-sidebar'); ?>
    </div>
<?php endif; ?>

<?php endif; ?>