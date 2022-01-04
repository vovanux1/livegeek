<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package livegeeknew
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MMTHV8V');</script>
<!-- End Google Tag Manager -->
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="/wp-content/themes/livegeeknew/assets/css/bootstrap.min.css">
	<script src="/wp-content/themes/livegeeknew/js/cc74f429b9.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
	<? if(is_front_page())
{ ?>
	<link rel="alternate" hreflang="fr-Fr" href="https://livegeek.fr/" />
	<link rel="alternate" hreflang="it-IT" href="https://www.cra-cin.it/" />
	<? } ?>
	<? if(is_single() )
		  {
$url123 = $_SERVER['REQUEST_URI'];
$url123 = explode('?', $url123);
$url123 = $url123[0];
	$url1234 = $url123 ;
	$result123 = explode('fr/', $url1234, 2);
$ithef = ltrim($result123[1]);
	?>
	
	<? if(get_field('newlinkhref')) { ?>
	<link rel="alternate" hreflang="fr-Fr" href="https://livegeek.fr<? echo $url123 ?>" />
	<link rel="alternate" hreflang="it-IT" href="<? echo the_field('newlinkhref'); ?>" />
	<? }  } ?>
	<?php if(get_field('avantagedelete')[0] == '1') { ?> <style>
	section.c-avantages{
		display:none!important;
	} </style><?} ?>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMTHV8V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
	
<?php wp_body_open(); ?>
<div id="page" class="site">
	
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'livegeeknew' ); ?></a>

	<header id="masthead" class="site-header main_header">
			<div class="body-fade"></div>

	<!-- sticky menu tab -->

		<div class="container">
			<li class="menu toggle-menu"><i class="fa fa-bars"></i></li>
		<div class="site-branding">
			<?php if(is_front_page()){ ?> <a class="custom-logo-link" rel="home"><img width="442" height="107" src="https://livegeek.fr/wp-content/uploads/2021/01/gra-1.png" class="custom-logo lazyloaded" alt=""></a> <?} else {
			the_custom_logo(); }
		?>
				
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'livegeeknew' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
			
		
		</div>	<aside class="mobile-navigation slide-menu">
		<span class="close"><i class="fa fa-close fa-lg"></i></span>
		<?php 

		// Check if we have anything to display here
		get_search_form( );

		

		

		// The primary nav
		
		    wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
		
		// Widgets
	

		?>
	</aside>
		<? if(is_single(7410)){ $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


if (strpos($url,'123213') !== false) {
    echo 'Car exists.';
} else {
    echo 'No cars.';
} ?>
		
		<script>
			var currentLocation = window.location;
			const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const product = urlParams.get('cid')
console.log(product);
			var test = 'https://ultrapartners.com/redirect/id/31717/b/3/l/48/tp/h/s/';
			var mff = '&subaff=livegeek/tm/0';
			var tmm = test + product + mff;
			window.location.href = tmm;
		</script>
		<? } ?>
	</header>
	<div class="container"> <?
		if(is_category()) {
	  echo do_shortcode('[post_new]');

}  ?>
	</div><!-- #masthead -->
