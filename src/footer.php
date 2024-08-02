<?php
/*
 * The footer.
*/
?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">

    <a href="#" class="topbutton"><i class="icon-angle-up"></i></a>

<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Footer menu', 'nekonet' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>


</body>

</html>