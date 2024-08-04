<?php
/*
 * Displays the site navigation.
 */

?>

<!-- phone number mobile -->

<div id="phone-number-mobile" class="mobile-only">
	<a href="tel:+48501791000"><i class="icon-phone"></i></a>
</div>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
    <div class="hamburger-menu">
		<a>
            <div id="nav-icon1">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>	
	</div>
    <nav id="site-navigation" class="primary-navigation" role="navigation"
        aria-label="<?php esc_attr_e( 'Primary menu', 'nekonet' ); ?>">
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
    </nav><!-- #site-navigation -->

	<!-- languages -->
	 <nav id="header-languages-selection" class="desktop-only">
		<ul>
			<li class="active">PL</li>
			<li>ENG</li>
		</ul>
	 </nav>

	 <!-- social icons -->
	 <nav id="header-social" class="desktop-only">
		<ul>
			<li><a href="https://www.linkedin.com/company/mdc2/" target="_blank" rel="nofollow" title="Linkedin"><i class="icon-linkedin-squared"></i></a></li>
			<li><a href="https://www.youtube.com/@mdc2logistics281" target="_blank" rel="nofollow" title="Youtube"><i class="icon-youtube-play"></i></a></li>
		</ul>
	 </nav>

<?php endif; ?>