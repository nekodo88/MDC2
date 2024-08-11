<?php
/*
 * The header.
*/
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
	<?php wp_head(); ?>

	<!-- GOOGLE FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	
	<!-- GSAP CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

	<!-- moje konto api -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYuYMNGUSyuMQBPd8giiyMO3dIv9lm34o"></script>

	<!--Google map marker cluster-->
	<script src="/projekty/zrobione-w-szczecinie/wp-content/themes/zrobione-w-szczecinie/js-markerclustererplus-main/src/markerclusterer.ts"></script>
	<script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
	<script src="/projekty/zrobione-w-szczecinie/wp-content/themes/zrobione-w-szczecinie/js-markerclustererplus-main/src/index.ts"></script>
	
	<!--Slick slider CDN-->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	    <?php get_template_part( 'template-parts/header/site-header' ); ?>
        <?php get_template_part( 'template-parts/sidebar/sidebar-social-widget' ); ?>

	<div id="content" class="site-content">

<?php get_template_part( 'template-parts/sidebar/sidebars' );?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

            