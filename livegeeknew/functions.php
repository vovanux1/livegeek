<?php
/**
 * livegeeknew functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package livegeeknew
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'livegeeknew_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function livegeeknew_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on livegeeknew, use a find and replace
		 * to change 'livegeeknew' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'livegeeknew', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'livegeeknew' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'livegeeknew_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'livegeeknew_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function livegeeknew_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'livegeeknew_content_width', 640 );
}
add_action( 'after_setup_theme', 'livegeeknew_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function livegeeknew_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'livegeeknew' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'livegeeknew' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'livegeeknew_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function livegeeknew_scripts() {
	wp_enqueue_style( 'livegeeknew-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'livegeeknew-style', 'rtl', 'replace' );

	wp_enqueue_script( 'livegeeknew-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'livegeeknew_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if(!function_exists('jnews_get_option'))
{
    function jnews_get_option($setting, $default = null)
    {
        $options = get_option( 'jnews_option', array() );
        $value = $default;
        if ( isset( $options[ $setting ] ) ) {
            $value = $options[ $setting ];
        }
        return $value;
    }
}

function faqpost($atts, $content = NULL)
{
    ob_start(); 
    
        $rows = get_field('faqpost'); if($rows) { ?>
            <h2>Questions fréquentes</h2>
              
                            <?php $a=0; foreach($rows as $row) { ?>
									<div class="sc_fs_faq sc_card">
                                <div class="faqh2">
                                    
                                        <?php echo $row['faqpost1']; ?>
                                    
                                    <div class="faqp">
                                        <?php echo $row['faqpost2']; ?>
                                    </div>
                                </div>
                                   </div> 
                            
                            <?php $a+=1; } ?>
            
        
            <?php }
        
        
    
    $myvariable = ob_get_clean();
    return $myvariable;
}
add_shortcode('faqpost', 'faqpost');

function avantagenew1($atts, $content = NULL)
{
    ob_start(); 
    ?>
<? if(get_field('new-avantage')[0] == 1){ ?>
<section class="c-avantages">
    <div class="c-avantages-header"></div>
    <div class="c-avantages__row">
        <div class="c-avantages__col">
            <div class="c-avantages-list c-avantages-positive">
              <span>
                Avantages
              </span>
                
					<?  $rows_v = get_field('avantplus'); if($rows_v) { ?>
            <ul>
            <?php foreach($rows_v as $row_v) { ?>
              <li><?php echo $row_v['avantplus1']; ?></li>
				
            <?php } ?>
            </ul>
          <?php } ?>
				
                
            </div>
        </div>
        <div class="c-avantages__col">
            <div class="c-avantages-list c-avantages-negative">
              <span>
                Inconvénients
              </span>
               <?
				$rows_v = get_field('avantminus'); if($rows_v) { ?>
            <ul>
            <?php foreach($rows_v as $row_v) { ?>
              <li><?php echo $row_v['avantminus1']; ?></li>
            <?php } ?>
            </ul>
          <?php }
				?>
            </div>
        </div>
    </div>
</section>
<?
										} else { ?>
         <section class="c-avantages">
    <div class="c-avantages-header"></div>
    <div class="c-avantages__row">
        <div class="c-avantages__col">
            <div class="c-avantages-list c-avantages-positive">
              <span>
                Avantages
              </span>
                <ul>
					<li>grand nombre de promotions et bonus
</li>
					<li>possibilité de jouer en multi-tables</li>
				
                </ul>
            </div>
        </div>
        <div class="c-avantages__col">
            <div class="c-avantages-list c-avantages-negative">
              <span>
                Inconvénients
              </span>
                <ul>
                   <li>cas de vols de coordonnées bancaires
</li>
					<li>personnes victimes de menaces de la part du service client
</li>
					<li>plateforme non sécurisée 
</li>
					<li>pas beaucoup de solutions pour le paiement</li>
                </ul>
            </div>
        </div>
    </div>
</section>

        <? }
    
    $myvariable = ob_get_clean();
    return $myvariable;
}
add_shortcode('c-avantages', 'avantagenew1');
function table1($atts, $content = NULL)
{
	ob_start();	 ?>
	
	<div class="table-sh table_1 starrr_table" >
		
	<div class="th-sh">
			<div class="td-sh " style="width:40%">		<img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/001-star.png" style="width: 30px; margin-right: 10px" > Note générale : <?php the_field('tableonen_1-1'); ?>
			</div>
			<div class="table-sh">
			<div class="th-sh">
			<div class="td-sh"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/002-interface.png" style="width: 30px; margin-right: 10px" > Interface :	 <?php the_field('tableonen_1-2'); ?>
			</div>
			<div class="td-sh"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/004-bank.png" style="width: 30px; margin-right: 10px" > Dépôts et retraits :	 <?php the_field('tableonen_1-3'); ?>
			</div>
			<div class="td-sh"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/006-customer-service.png" style="width: 30px; margin-right: 10px" > Service client :	 <?php the_field('tableonen_1-4'); ?>
			</div>
			</div>
			<div class="th-sh">
			<div class="td-sh"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/003-puzzle.png" style="width: 30px; margin-right: 10px" > Jeux :	 <?php the_field('tableonen_1-5'); ?>
			</div>
			<div class="td-sh"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/005-accounting.png" style="width: 30px; margin-right: 10px" > Création profil :	 <?php the_field('tableonen_1-6'); ?>
			</div>
			<div class="td-sh"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/007-antivirus.png" style="width: 30px; margin-right: 10px" > Sécurité :	 <?php the_field('tableonen_1-7'); ?>
			</div>
			</div>
		</div>
			
		
		</div>
		
		
	</div>
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('table1', 'table1');


function table2($atts, $content = NULL)
{
	ob_start();	 ?>
	
	<div class="table-sh table_2" >
		
		<div class="th-sh">
			<div class="td-sh ">		<img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/008-coronavirus.png" style="width: 30px; margin-right: 10px" > Pays disponibles	
			</div>
			<div class="td-sh">	 <?php the_field('tableonen_2-1'); ?>
			</div>
			
		</div>
		<div class="th-sh">
			<div class="td-sh ">	  <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/009-commission.png" style="width: 30px; margin-right: 10px" >  Montant des frais de retrait		
			</div>
			<div class="td-sh">				<?php the_field('tableonen_2-2'); ?>
			</div>
		</div>
		<div class="th-sh">
			<div class="td-sh ">	 <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/010-output.png" style="width: 30px; margin-right: 10px" > Dépôt minimum		
			</div>
			<div class="td-sh">	<?php the_field('tableonen_2-3'); ?>			
			</div>
		</div>
		<div class="th-sh">
			<div class="td-sh ">	   <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/011-google-play.png" style="width: 30px; margin-right: 10px" > Nombre d’options bancaires
			</div>
			<div class="td-sh">	<?php the_field('tableonen_2-4'); ?>			
			</div>
		</div>
		<div class="th-sh">
			<div class="td-sh ">	   <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/012-web-design.png" style="width: 30px; margin-right: 10px" > Quantité de jeux
			</div>
			<div class="td-sh">	<?php the_field('tableonen_2-5'); ?>			
			</div>
		</div>
		<div class="th-sh">
			<div class="td-sh ">	   <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/013-code.png" style="width: 30px; margin-right: 10px" > Compte démo
			</div>
			<div class="td-sh">	<?php the_field('tableonen_2-6'); ?>			
			</div>
		</div>
		<div class="th-sh">
			<div class="td-sh ">	   <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/002-interface.png" style="width: 30px; margin-right: 10px" > Fonctions
			</div>
			<div class="td-sh">	<?php the_field('tableonen_2-7'); ?>			
			</div>
		</div>

		
		
	</div>
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('table2', 'table2');

function table3($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table3'); if($rows) { ?>
		<div class="table-sh table_3 " >
		
		<div class="th-sh aldk bts-1 pl-mn">
			<div class="td-sh font-bold green-plus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/plus.png" style="width: 30px; margin-right: 10px" >
				 Avantages
			</div>
			<div class="td-sh font-bold red-minus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/minus.png" style="width: 30px; margin-right: 10px" >
				 Inconvénients
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh">	<?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh">	<?php echo $row['text_2']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table3', 'table3');

function table4($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table4'); if($rows) { ?>
		<div class="table-sh table_3 table_4" >
		
		<div class="th-sh aldk bts-1 pl-mn">
			<div class="td-sh font-bold green-plus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/plus.png" style="width: 30px; margin-right: 10px" >
				 Avantages
			</div>
			<div class="td-sh font-bold red-minus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/minus.png" style="width: 30px; margin-right: 10px" >
				 Inconvénients
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh">	<?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh">	<?php echo $row['text_2']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table4', 'table4');

function table5($atts, $content = NULL)
{
	ob_start();	 ?>
	
	<div class="table-sh table_2 table_5" >
		
		<div class="th-sh">
			<div class="td-sh "> Bonus 1	
			</div>
			<div class="td-sh "> Bonus 2	
			</div>
			<div class="td-sh "> Bonus 3	
			</div>
		</div>
			
		
		<div class="th-sh">
			<div class="td-sh "> Détail	
			</div>
			<div class="td-sh "> Détail	
			</div>
			<div class="td-sh "> Détail	
			</div>
		</div>
		<div class="th-sh">
			<div class="td-sh "><?php the_field('tableonen_5-1'); ?>		
			</div>
			<div class="td-sh">	<?php the_field('tableonen_5-2'); ?>			
			</div>
			<div class="td-sh">	<?php the_field('tableonen_5-3'); ?>			
			</div>
		</div>
		</div>


		
		
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('table5', 'table5');


function table6($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table6'); if($rows) { ?>
		<div class="table-sh table_3 table_6" >
		
		<div class="th-sh aldk bts-1 pl-mn">
			<div class="td-sh font-bold green-plus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/plus.png" style="width: 30px; margin-right: 10px" >
				 Avantages
			</div>
			<div class="td-sh font-bold red-minus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/minus.png" style="width: 30px; margin-right: 10px" >
				 Inconvénients
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh"><?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh">	<?php echo $row['text_2']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table6', 'table6');





function table8($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table8'); if($rows) { ?>
		<div class="table-sh table_3 table_8" >
		
		<div class="th-sh aldk bts-1 pl-mn">
			<div class="td-sh font-bold green-plus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/plus.png" style="width: 30px; margin-right: 10px" >
				 Avantages
			</div>
			<div class="td-sh font-bold red-minus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/minus.png" style="width: 30px; margin-right: 10px" >
				 Inconvénients
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh">	<?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh">	<?php echo $row['text_2']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table8', 'table8');

function table9($atts, $content = NULL)
{
	ob_start();	 ?>
	
	<div class="table-sh table_2 table_9" >
		
		<div class="th-sh font-bold">
			<div class="td-sh ">			
			</div>
			<div class="td-sh">		<?php the_field('tableonen_9-1-nom'); ?>
			</div>
			<div class="td-sh">	<?php the_field('tableonen_9-1-2-2-nom'); ?>
			</div>
			<div class="td-sh">	<?php the_field('tableonen_9-1-name-casino'); ?>
			</div>
			
		</div>
		<div class="th-sh">
			<div class="td-sh ">  Nombre d’options bancaires		
			</div>
			<div class="td-sh">	<?php the_field('tableonen_9-1'); ?>
			</div>
			<div class="td-sh"><?php the_field('nv1'); ?></div>
			<div class="td-sh">	<?php the_field('nm1'); ?>
			</div>
		</div>

		<?php
		
		$rows = get_field('table9-1'); if($rows) { ?>
		
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
			<div class="td-sh select-9">	  <?php echo $row['tableonen_11-1-select']; ?>		
			</div>
			<div class="td-sh"><?php  if($row['tableonen_11-1-new'][0] == 1){ echo"<img class='lazy-loaded' alt='' src='/wp-content/uploads/2020/10/checked.png' style='width: 30px;' >";} else { echo"<img class='lazy-loaded' alt='' src='/wp-content/uploads/2020/10/x-mark.png' style='width: 30px;' >";} ?>
			</div>
			<div class="td-sh">	<?php  if($row['nv5new'][0] == 1){ echo"<img class='lazy-loaded' alt='' src='/wp-content/uploads/2020/10/checked.png' style='width: 30px;' >";} else { echo"<img class='lazy-loaded' alt='' src='/wp-content/uploads/2020/10/x-mark.png' style='width: 30px;' >";} ?>
			</div>
			<div class="td-sh">	<?php  if($row['nv6new'][0] == 1){ echo"<img class='lazy-loaded' alt='' src='/wp-content/uploads/2020/10/checked.png' style='width: 30px;' >";} else { echo"<img class='lazy-loaded' alt='' src='/wp-content/uploads/2020/10/x-mark.png' style='width: 30px;' >";} ?>
			</div>
		</div>
			<?php $a+=1; } ?>
			<?php }?>
	</div>
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('table9', 'table9');


function table10($atts, $content = NULL)
{
	ob_start();	 ?>
	
	<div class="table-sh table_2 table_10" >
		
		<div class="th-sh font-bold">
			<div class="td-sh ">	
			</div>
			<div class="td-sh ">	<?php the_field('tableonen_10-name1'); ?>
			</div>
			<div class="td-sh ">	<?php the_field('tableonen_10-name2'); ?>
			</div>
			<div class="td-sh ">	<?php the_field('tableonen_10-name3'); ?>
			</div>
			
		</div>
		<div class="th-sh">
			<div class="td-sh ">	  <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/014-speedometer.png" style="width: 30px; margin-right: 10px" >  Vitesse de dépôt	
			</div>
			<div class="td-sh">				<?php the_field('tableonen_10-1'); ?>
			</div>
			<div class="td-sh">				<?php the_field('tableonen_10-2'); ?>
			</div>
			<div class="td-sh">				<?php the_field('tableonen_10-3'); ?>
			</div>
		</div>
		<div class="th-sh">
			<div class="td-sh ">	  <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/014-speedometer.png" style="width: 30px; margin-right: 10px" >  Vitesse de retrait	
			</div>
			<div class="td-sh">				<?php the_field('tableonen_4'); ?>
			</div>
			<div class="td-sh">				<?php the_field('tableonen_5'); ?>
			</div>
			<div class="td-sh">				<?php the_field('tableonen_6'); ?>
			</div>
		</div> <?php
		
		$rows = get_field('table10-1'); if($rows) { ?>
		
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
			<div class="td-sh ">	  <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/014-speedometer.png" style="width: 30px; margin-right: 10px" >  Vitesse de retrait	
			</div>
			<div class="td-sh">		<?php echo $row['tableonen_4new']; ?>
			</div>
			<div class="td-sh">				<?php echo $row['tableonen_5new']; ?>
			</div>
			<div class="td-sh">				<?php echo $row['tableonen_6new']; ?>
			</div>
		</div>
			<?php $a+=1; } ?>
			<?php }?>
		
		
	</div>
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('table10', 'table10');

function table11($atts, $content = NULL)
{
	ob_start();	 ?>
	
	<div class="table-sh table_2 table_10" >
		
		<div class="th-sh font-bold">
			<div class="td-sh "><img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/017-puzzle-pieces.png" style="width: 30px; margin-right: 10px" > Solution de retrait	
			</div>
			<div class="td-sh "><img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/016-speed.png" style="width: 30px; margin-right: 10px" > Vitesse d’obtention des gains	
			</div>
			<div class="td-sh "><img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/001-star.png" style="width: 30px; margin-right: 10px" > Note : /20	
			</div>
			
		</div>
		<div class="th-sh">
			<div class="td-sh">				<?php the_field('tableonen_11-1'); ?>
			</div>
			<div class="td-sh">				<?php the_field('tableonen_11-2'); ?>
			</div>
			<div class="td-sh">				<?php the_field('tableonen_11-3'); ?>
			</div>
		</div>
				<div class="th-sh">
			<div class="td-sh">				<?php the_field('tableonen_11-4'); ?>
			</div>
			<div class="td-sh">				<?php the_field('tableonen_11-5'); ?>
			</div>
			<div class="td-sh">				<?php the_field('tableonen_11-6'); ?>
			</div>
		</div>

		<?php
		
		$rows = get_field('table11-1'); if($rows) { ?>
		
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
			
			<div class="td-sh">		<?php echo $row['11textrepeaer1']; ?>
			</div>
			<div class="td-sh">				<?php echo $row['11textrepeaer2']; ?>
			</div>
			<div class="td-sh">				<?php echo $row['11textrepeaer3']; ?>
			</div>
		</div>
			<?php $a+=1; } ?>
			<?php }?>
		
	</div>
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('table11', 'table11');
function table12($atts, $content = NULL)
{
	ob_start();	 ?>
	
	<div class="table-sh table_2 table_12" >
		
		<div class="th-sh font-bold">
			<div class="td-sh td-header"> Tableau des devises	
			</div>			
		</div>
		<div class="th-sh">
			<div class="td-sh"><?php the_field('tableonen_12-0'); ?>
			</div>
			<div class="td-sh">	<?php the_field('tableonen_12-1'); ?>
			</div>
			<div class="td-sh">	<?php the_field('tableonen_12-2'); ?></div>
			<div class="td-sh">	<?php the_field('tableonen_12-3'); ?></div>
			<div class="td-sh">	<?php the_field('tableonen_12-4'); ?></div>
			<div class="td-sh">	<?php the_field('tableonen_12-5'); ?></div>
			<div class="td-sh">	<?php the_field('tableonen_12-6'); ?></div>
			</div>
		

		
		
	</div>

<style>
	.td-header {
		border-right: 1px solid #000 !important;
	}
</style>
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('table12', 'table12');
function table13($atts, $content = NULL)
{
	ob_start();	 ?>
	
	<div class="table-sh table_2 table_13" >
		
		<div class="th-sh">
			<div class="td-sh ">		<img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/020-web-analytics.png" style="width: 30px; margin-right: 10px" > Avis sur la version ordinateur	
			</div>
			<div class="td-sh">	 <?php the_field('tableonen_1'); ?>
			</div>
			
		</div>
		<div class="th-sh">
			<div class="td-sh ">	  <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/019-smartphone.png" style="width: 30px; margin-right: 10px" >  Avis sur la version mobile		
			</div>
			<div class="td-sh">				<?php the_field('tableonen_2'); ?>
			</div>
		</div>
		<div class="th-sh">
			<div class="td-sh ">	 <img class="lazy-loaded" alt="" src="/wp-content/uploads/2020/10/018-testimonials.png" style="width: 30px; margin-right: 10px" > Avis sur l’application		
			</div>
			<div class="td-sh">	<?php the_field('tableonen_3'); ?>			
			</div>
		</div>
		

		
		
	</div>
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('table13', 'table13');


function table14($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table14'); if($rows) { ?>
		<div class="table-sh table_3 table_14" >
		
		<div class="th-sh aldk bts-1 pl-mn">
			<div class="td-sh font-bold green-plus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/plus.png" style="width: 30px; margin-right: 10px" >
				 Avantages
			</div>
			<div class="td-sh font-bold red-minus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/minus.png" style="width: 30px; margin-right: 10px" >
				 Inconvénients
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh">	<?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh">	<?php echo $row['text_2']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table14', 'table14');




function table16($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table16'); if($rows) { ?>
		<div class="table-sh table_3 table_16" >
		
		<div class="th-sh aldk bts-1 pl-mn">
			<div class="td-sh font-bold green-plus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/plus.png" style="width: 30px; margin-right: 10px" >
				 Avantages
			</div>
			<div class="td-sh font-bold red-minus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/minus.png" style="width: 30px; margin-right: 10px" >
				 Inconvénients
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh"><span class="marker">•</span>	<?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh"><span class="marker">•</span>	<?php echo $row['text_2']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table16', 'table16');

function table17($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table17'); if($rows) { ?>
		<div class="table-sh table_3" >
		
		<div class="th-sh aldk bts-1 pl-mn">
			<div class="td-sh font-bold green-plus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/plus.png" style="width: 30px; margin-right: 10px" >
				 Avantages
			</div>
			<div class="td-sh font-bold red-minus"><img class="lazy-loaded" alt="" src="/wp-content/uploads/2021/01/minus.png" style="width: 30px; margin-right: 10px" >
				 Inconvénients
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh"><span class="marker">•</span>	<?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh"><span class="marker">•</span>	<?php echo $row['text_2']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table17', 'table17');

function table7($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table7'); if($rows) { ?>
		<div class="table-sh table_7" >
		

			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh aldk bts-1 pl-mn">
					<div class="td-sh">	 <?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh"> <?php echo $row['text_2']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table7', 'table7');


function table15($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table15'); if($rows) { ?>
		<div class="table-sh table_3 table15" >
		
		<div class="th-sh aldk bts-1 pl-mn">
			<div class="td-sh  font-bold">

				
			</div>
			<div class="td-sh  font-bold">

				 <? the_field('table15_name1'); ?>
			</div>
			<div class="td-sh  font-bold">

				  <? the_field('table15_name2'); ?>
			</div>
			<div class="td-sh font-bold">
				  <? the_field('table15_name3'); ?>
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh">	 <?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh">	 <?php echo $row['text_2']; ?>
					</div>
					<div class="td-sh">	 <?php echo $row['text_3']; ?>
					</div>
					<div class="td-sh"> <?php echo $row['text_4']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table15', 'table15');

function table18($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table18'); if($rows) { ?>
		<div class="table-sh table_3 table_1 table_6 img140" >
		
		<div class="th-sh aldk">
			<div class="td-sh ">				
				Solution de retrait
			</div>
			<div class="td-sh ">				
				Vitesse d’obtention des gains
			</div>
			<div class="td-sh ">
				Note : /20
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh">	<?php echo $row['text_1']; ?>	
					</div>
					<div class="td-sh">	<?php echo $row['text_2']; ?>
					</div>
					<div class="td-sh">	<?php echo $row['text_3']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table18', 'table18');

function table19($atts, $content = NULL)
{
	ob_start();	
		$rows = get_field('table19'); if($rows) { ?>
		<div class="table-sh table_3 table_1 table_6 img140" >
		
		<div class="th-sh aldk">
			<div class="td-sh ">				
				Solution de retrait
			</div>
			<div class="td-sh ">				
				Vitesse d’obtention des gains
			</div>
			<div class="td-sh ">
				Note : /20
			</div>
		</div>
			<?php $a=0; foreach($rows as $row) { ?>
				<div class="th-sh">
					<div class="td-sh">	<?php echo $row['text_11']; ?>	
					</div>
					<div class="td-sh">	<?php echo $row['text_22']; ?>
					</div>
					<div class="td-sh">	<?php echo $row['text_33']; ?>
					</div>
				</div>
			<?php $a+=1; } ?></div>
			<?php }?>
		
	<?php	return $myvariable = ob_get_clean();}
add_shortcode('table19', 'table19');

function table20($atts, $content = NULL)
{
	ob_start();	
		$zxccc = get_field('zxccc');
		$rows = get_field('table20'); if($rows) { ?>
			<div class="table-sh table9 img140 table19">
							<?php $a=0; foreach($rows as $row) { ?>
								<div class="th-sh">
									<div class="td-sh please">
										
										<?php echo $row['zxccc']; ?>
										
											
									</div>
									<div class="td-sh">
										<?php echo $row['txt1x']; ?>
									</div>
								</div>
									
							
							<?php $a+=1; } ?>
			</div>
		
			<?php }
		
		
	
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('table20', 'table20');
function tablesh123( $atts ){
	ob_start();
	if(get_field('Title_check')[0] == "1"){ ?><div class="title_before_table"><? the_field('text_title_top') ?></div> <? }
	$rows = get_field('table-avis-tablesh'); if($rows) { ?>
						<div class="top_avisic myc top_avisic_table_fix" id="tablesh123">
							<div class="top_avis_line top_avis_line_table_fix">
								<div class="top_avis_row"><img src="/wp-content/uploads/2021/01/2222.png"></div>
								<div class="top_avis_row">Casino</div>
								<div class="top_avis_row">Temps de retrait</div>
								<div class="top_avis_row"> Bonus </div>
								<div class="top_avis_row">But</div>
								<div class="top_avis_row">Jouer</div>
							</div>
							<?php $a=0; foreach($rows as $row) { ?>
								<div class="top_avis_line lineforjs <? if($a>4) echo 'dispnline tesetwq'; ?>">
									<div class="top_avis_row"><div><?php echo $a+1 ?></div></div>
									<div class="top_avis_row">
										<a href="<?php echo $row['tablesh-href_button_avis']; ?>" <? if($row['idelement123']) { ?>id="<?php echo $row['idelement123']; ?>" <? } ?> >								<img src="<?php echo $row['tablesh-img_avis']; ?>" <? if($row['idelement123']) { ?>id="<?php echo $row['idelement123']; ?>" <? } ?> alt="<?php echo $row['tablesh-img_avis_alt']; ?>">
										</a>
										<a <?php if($row['disable_name'][0]=='1'){} else { ?> href="<?php echo $row['tablesh-name_href_avis']; ?>" <? } ?> ><?php echo $row['tablesh-name_avis']; ?></a>
									</div>
									<div class="top_avis_row">
										
										<span class="
													 <?php 
													if($row['tablesh-lik1'][0] == "1") { 
													 echo 'lifc';}
													 if($row['tablesh-lik1'][0] == "2") { 
													 echo 'lifc1';}?>
													 "><?php echo $row['tablesh-countri_avis']; ?></span>
										<?php echo $row['tablesh-cuntry_href']; ?>
									</div>
									<div class="top_avis_row"><?php echo $row['tablesh-bonus_avis']; ?></div>
									<div class="top_avis_row"><div class="terma183" style="color:#000;">
										<span class="<?php if($row['tablesh-butint'] < 16) echo 'blgr'; if($row['tablesh-butint'] < 13) echo 'blbl';?>">
											<?php echo $row['tablesh-butint']; ?></span>/20
										</div></div>
									<div class="top_avis_row">
										<?php if( $row['tablesh-neg_avis'][0] == "1") { ?>
											<a <? if($row['idelement123']) { ?>id="<?php echo $row['idelement123']; ?>" <? } ?> class="btn table-avis-p" href="<?php echo $row['tablesh-href_button_avis']; ?>">Jouer</a>
										<?php } else {?>
											<!---<a class="btn table-avis-n" href="<?php echo $row['tablesh-href_button_avis']; ?>" style="
    font-size: 12px;
">Obtenez LE bonus !</a>--->
										<?php } ?>
									</div>
								</div>
							
							<?php $a+=1; } ?>
						
			<?php }?></div>
<div class="cwetwrw">
			
							<a class="showall-mob" id="showall-mob" href="javascript:void(0);">Afficher tout</a>
							<a class="showall-mob-1" id="showall-mob-1" href="#tablesh123" style="display:none;">Tout effondrer</a>
</div>
<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
 
add_shortcode( 'tablesh123', 'tablesh123' );

function tablesh123_one( $atts ){
	ob_start();
	if(get_field('Title_check_one')[0] == "1"){ ?><div class="title_before_table"><? the_field('text_title_top_one') ?></div> <? }
	$rows = get_field('table-avis-tablesh_one'); if($rows) { ?>
						<div class="top_avisic myc top_avisic_table_fix">
							<div class="top_avis_line top_avis_line_table_fix">
								<div class="top_avis_row"><img src="/wp-content/uploads/2021/01/2222.png"></div>
								<div class="top_avis_row">Casino</div>
								<div class="top_avis_row">Temps de retrait</div>
								<div class="top_avis_row"><img src="/wp-content/uploads/2020/12/giftbox5.png" alt="" style="margin-right:10px;"> Bonus </div>
								<div class="top_avis_row">But</div>
								<div class="top_avis_row">Jouer</div>
							</div>
							<?php $a=0; foreach($rows as $row) { ?>
								<div class="top_avis_line">
									<div class="top_avis_row"><div><?php echo $a+1 ?></div></div>
									<div class="top_avis_row">
										<a href="<?php echo $row['tablesh-href_button_avis']; ?>">								<img src="<?php echo $row['tablesh-img_avis']; ?>" alt="<?php echo $row['tablesh-img_avis_alt']; ?>">
										</a>
										<a <?php if($row['disable_name'][0]=='1'){} else { ?> href="<?php echo $row['tablesh-name_href_avis']; ?>" <? } ?> ><?php echo $row['tablesh-name_avis']; ?></a>
									</div>
									<div class="top_avis_row">
										
										<span class="
													 <?php 
													if($row['tablesh-lik1'][0] == "1") { 
													 echo 'lifc';}
													 if($row['tablesh-lik1'][0] == "2") { 
													 echo 'lifc1';}?>
													 "><?php echo $row['tablesh-countri_avis']; ?></span>
										<?php echo $row['tablesh-cuntry_href']; ?>
									</div>
									<div class="top_avis_row"><?php echo $row['tablesh-bonus_avis']; ?></div>
									<div class="top_avis_row"><div class="terma183" style="color:#000;">
										<span class="<?php if($row['tablesh-butint'] < 16) echo 'blgr'; if($row['tablesh-butint'] < 13) echo 'blbl';?>">
											<?php echo $row['tablesh-butint']; ?></span>/20
										</div></div>
									<div class="top_avis_row">
										<?php if( $row['tablesh-neg_avis'][0] == "1") { ?>
											<a class="btn table-avis-p" href="<?php echo $row['tablesh-href_button_avis']; ?>">Jouer</a>
										<?php } else {?>
											<!---<a class="btn table-avis-n" href="<?php echo $row['tablesh-href_button_avis']; ?>" style="
    font-size: 12px;
">Obtenez LE bonus !</a>--->
										<?php } ?>
									</div>
								</div>
							
							<?php $a+=1; } ?>
						
			<?php }?></div><?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
 
add_shortcode( 'tablesh123_one', 'tablesh123_one' );



add_shortcode( 'button_cop', 'baztag_func1' );
function baztag_func1( $atts, $content ) {
	$top1idid= get_field('top1idid','option');
	$top2idid= get_field('top2idid','option');
	$top3idid= get_field('top3idid','option');
	if($atts['url'] == '/top1') {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="'. $top1idid .'" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
	else if(($atts['url'] == 'https://livegeek.fr/top1') OR ($atts['url'] == 'http://livegeek.fr/top1')){
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="'. $top1idid .'" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
	else if($atts['url'] == '/top2') {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="'. $top2idid .'" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
	else if(($atts['url'] == 'https://livegeek.fr/top2') OR ($atts['url'] == 'http://livegeek.fr/top2')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="'. $top2idid .'" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
		else if(($atts['url'] == 'https://livegeek.fr/top3') OR ($atts['url'] == 'http://livegeek.fr/top3')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="'. $top3idid .'" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
	else if($atts['url'] == '/top3') {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="'. $top3idid .'" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
	
			else if(($atts['url'] == '/vegasplus') OR ($atts['url'] == 'https://livegeek.fr/vegasplus') OR ($atts['url'] == 'http://livegeek.fr/vegasplus')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-vegas" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/tortuga') OR ($atts['url'] == 'https://livegeek.fr/tortuga') OR ($atts['url'] == 'http://livegeek.fr/tortuga')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-tortuga" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/unique') OR ($atts['url'] == 'https://livegeek.fr/unique') OR ($atts['url'] == 'http://livegeek.fr/unique')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-unique" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/madnix') OR ($atts['url'] == 'https://livegeek.fr/madnix') OR ($atts['url'] == 'http://livegeek.fr/madnix')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-madnix" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/azurrr') OR ($atts['url'] == 'https://livegeek.fr/azurrr') OR ($atts['url'] == 'http://livegeek.fr/azurrr')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-azur" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/banzai') OR ($atts['url'] == 'https://livegeek.fr/banzai') OR ($atts['url'] == 'http://livegeek.fr/banzai') ) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-banzai" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/jack21') OR ($atts['url'] == 'https://livegeek.fr/jack21') OR ($atts['url'] == 'http://livegeek.fr/jack21')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-jack" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/wildsultan') OR ($atts['url'] == 'https://livegeek.fr/wildsultan') OR ($atts['url'] == 'http://livegeek.fr/wildsultan')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-wild-s" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/luckyluke') OR ($atts['url'] == 'https://livegeek.fr/luckyluke') OR ($atts['url'] == 'http://livegeek.fr/luckyluke')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-lucky-l" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/winoui') OR ($atts['url'] == 'https://livegeek.fr/winoui') OR ($atts['url'] == 'http://livegeek.fr/winoui')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-winoui" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/montecrypto') OR ($atts['url'] == 'https://livegeek.fr/montecrypto') OR ($atts['url'] == 'http://livegeek.fr/montecrypto')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-monte" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/gratowin') OR ($atts['url'] == 'https://livegeek.fr/gratowin') OR ($atts['url'] == 'http://livegeek.fr/gratowin')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-gratow" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
			else if(($atts['url'] == '/machance') OR ($atts['url'] == 'https://livegeek.fr/machance') OR ($atts['url'] == 'http://livegeek.fr/machance')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-machance" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }					
					else if(($atts['url'] == '/myluck') OR ($atts['url'] == 'https://livegeek.fr/myluck') OR ($atts['url'] == 'http://livegeek.fr/myluck')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-myluck" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/gratorama') OR ($atts['url'] == 'https://livegeek.fr/gratorama') OR ($atts['url'] == 'http://livegeek.fr/gratorama')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-gratorama" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/lucky8') OR ($atts['url'] == 'https://livegeek.fr/lucky8') OR ($atts['url'] == 'http://livegeek.fr/lucky8')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-lucky8" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/joka') OR ($atts['url'] == 'https://livegeek.fr/joka') OR ($atts['url'] == 'http://livegeek.fr/joka')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-joka" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/magicalspin') OR ($atts['url'] == 'https://livegeek.fr/magicalspin') OR ($atts['url'] == 'http://livegeek.fr/magicalspin')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-magical" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/mrxbet') OR ($atts['url'] == 'https://livegeek.fr/mrxbet') OR ($atts['url'] == 'http://livegeek.fr/mrxbet')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-mrxbet" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/spinup') OR ($atts['url'] == 'https://livegeek.fr/spinup') OR ($atts['url'] == 'http://livegeek.fr/spinup')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-spinup" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/lucky31') OR ($atts['url'] == 'https://livegeek.fr/lucky31') OR ($atts['url'] == 'http://livegeek.fr/lucky31')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-lucky31" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/dublin') OR ($atts['url'] == 'https://livegeek.fr/dublin') OR ($atts['url'] == 'http://livegeek.fr/dublin')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-dublin" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/fatboss') OR ($atts['url'] == 'https://livegeek.fr/fatboss') OR ($atts['url'] == 'http://livegeek.fr/fatboss')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-fatboss" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/cresus') OR ($atts['url'] == 'https://livegeek.fr/cresus')  OR ($atts['url'] == 'http://livegeek.fr/cresus')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-cresus" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
					else if(($atts['url'] == '/truefortune') OR ($atts['url'] == 'https://livegeek.fr/truefortune') OR ($atts['url'] == 'http://livegeek.fr/truefortune')) {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="btn-truefortune" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
	
	
	
		else {
	 return '<a style="width: 80% !important;display: block;margin: 0 auto;margin-top: 15px;" onclick="ym(reachGoal, '."'reachGoal'".', '."'block-text-1'".'); return true;" id="'. $top1idid .'" class="btn-cta-s1 doiuye" id="'.$atts['id'].'" href="'.$atts['url'].'" target="_blank" rel="noopener noreferrer">'. $content . '</a>'; }
} 

function test_block( $atts ){
	ob_start();
?>
<? if(get_field('check_display_new_cta')[0] == 1 ) { ?>
<div class="test-border">
	<div class="h1-before-test"><? if(get_field('edit_text_button')[0] == 1) { the_field('h1_block_header');} else { ?>
		<? the_field('casino-c-vs-name-brend'); ?> : DES BONUS ENCORE LEGERS <? } ?>
	</div>
	<div class="simple-text-test"><? if(get_field('edit_text_button')[0] == 1) { the_field('text_block_test');} else { ?>
		Après plusieurs tests, nos experts se sont rendu compte que ce casino en ligne n’offre pas les meilleurs bonus à ses joueurs. Nous vous encourageons à vous inscrire sur un casino plus généreux.<? } ?>
	</div>
	<div class="h3-before-test"> <? if(get_field('edit_text_button')[0] == 1) { the_field('text_before-vs');} else { ?>
		Choisissez un casino vraiment rémunérateur! <? } ?>
	</div>
	<div class="c-vs-test">
		<? if(get_field('check_block1-c-vs')[0] == 1 ) { ?><a href="/top1" class="a-c-vs-col-1" id="<? the_field('idvstop1'); ?>"> <div class="new-c-vs-col-1">
			<div class="new-c-vs-brend"><div class="div-before-img-c-vs">	
				<img src="<? the_field('new-cta-img-top'); ?>" id="<? the_field('idvstop1'); ?>"></div>
			</div>
			<div class="new-c-vs-h-p">
				<div class="new-c-vs-h" id="<? the_field('idvstop1'); ?>">
					<? the_field('new-cta-info-h1-top'); ?>
				</div>
				<div class="new-c-vs-p" id="<? the_field('idvstop1'); ?>">
					<? the_field('new-cta-info-p1-top'); ?>
				</div>
			</div>
			<div class="new-c-vs-h-p">
				<div class="new-c-vs-h" id="<? the_field('idvstop1'); ?>">
					<? the_field('new-cta-info-h2-top'); ?>
				</div>
				<div class="new-c-vs-p" id="<? the_field('idvstop1'); ?>">
					<? the_field('new-cta-info-p2-top'); ?>
				</div>
			</div>
			<div class="new-c-vs-h-p">
				<div class="new-c-vs-h" id="<? the_field('idvstop1'); ?>" >
					<? the_field('new-cta-info-h3-top'); ?>
				</div>
				<div class="new-c-vs-p" id="<? the_field('idvstop1'); ?>" >
					<? the_field('new-cta-info-p3-top'); ?>
				</div>
			</div>
		</div> </a><?} else { ?><a href="/top1" class="a-c-vs-col-1" id="<? the_field('top1idvsoption','options'); ?>">
		<div class="new-c-vs-col-1">
			<div class="new-c-vs-brend"><div class="div-before-img-c-vs">	
				<img src="https://livegeek.fr/wp-content/uploads/2021/01/vegas-plus-e1611155799502.png" id="<? the_field('top1idvsoption','options'); ?>" ></div>
			</div>
			<div class="new-c-vs-h-p">
				<div class="new-c-vs-h" id="<? the_field('top1idvsoption','options'); ?>">
					900 €
				</div>
				<div class="new-c-vs-p" id="<? the_field('top1idvsoption','options'); ?>">
					+50 Free Spins
				</div>
			</div>
		</div></a>
		<? } ?>
		<div class="new-c-vs-col-2 new-c-vs-vs">
			VS
		</div>
		<a href="<? if(get_field('link-c-vs-second')){ the_field('link-c-vs-second');} else { ?>/top1 <? } ?> " class="a-c-vs-col-1" id="<? if(get_field('top2vsid')){ the_field('top2vsid'); } else { the_field('top1idvsoption','options'); } ?>"> <div class="new-c-vs-col-3">
			<div class="new-c-vs-brend">
				<div class="div-before-img-c-vs">					
				<img src="<? the_field('new-cta-img'); ?>" id="<? if(get_field('top2vsid')){ the_field('top2vsid'); } else { the_field('top1idvsoption','options'); } ?>" ></div>
			</div>
			<div class="new-c-vs-h-p">
				<div class="new-c-vs-h-bad" id="<? if(get_field('top2vsid')){ the_field('top2vsid'); } else { the_field('top1idvsoption','options'); } ?>">
					<? the_field('new-cta-info-h1'); ?>
				</div>
				<div class="new-c-vs-p" id="<? if(get_field('top2vsid')){ the_field('top2vsid'); } else { the_field('top1idvsoption','options'); } ?>">
					<? the_field('new-cta-info-p1'); ?>
				</div>
			</div>
			<div class="new-c-vs-h-p">
				<div class="new-c-vs-h-bad" id="<? if(get_field('top2vsid')){ the_field('top2vsid'); } else { the_field('top1idvsoption','options'); } ?>" >
					<? the_field('new-cta-info-h2'); ?>
				</div>
				<div class="new-c-vs-p" id="<? if(get_field('top2vsid')){ the_field('top2vsid'); } else { the_field('top1idvsoption','options'); } ?>" >
					<? the_field('new-cta-info-p2'); ?>
				</div>
			</div>
			<div class="new-c-vs-h-p">
				<div class="new-c-vs-h-bad" id="<? if(get_field('top2vsid')){ the_field('top2vsid'); } else { the_field('top1idvsoption','options'); } ?>">
					<? the_field('new-cta-info-h3'); ?>
				</div>
				<div class="new-c-vs-p" id="<? if(get_field('top2vsid')){ the_field('top2vsid'); } else { the_field('top1idvsoption','options'); } ?>" >
					<? the_field('new-cta-info-p3'); ?>
				</div>
			</div>
			</div></a>
		<a class="btn-cta-s8" id="<? if(get_field('topindividual')){ the_field('top1idid','option'); } else {the_field('top1idid','option');} ?>" href="<? if(get_field('link-bonus-c-box-3')){echo'/top1';}else {?>/top1 <?} ?>"><? if(get_field('edit_text_button')[0] == 1) { the_field('button_text-c-vs');} else { ?> Jouer maintenant <? } ?></a>
	</div>
</div>
<? }
	$myvariable = ob_get_clean();
	return $myvariable;
}
 
add_shortcode( 'test-block', 'test_block' );

function posts_shortcode2($atts, $content = NULL)
{
    $atts = shortcode_atts(
        [
            'orderby' => 'title',
            'posts_per_page' => '4'
        ], $atts, 'recent-posts' );
    $query = new WP_Query( $atts );
    $output = '<div class="recent-posts2"> <h2  class="fnjss">Articles récents</h2>';
	$a = 0;
    while($query->have_posts()) : $query->the_post();
		if($a == 2 || $a == 4){
			$prevhtml = '<div class="colul22">';
			$ensfhtml = '';
		} else if ($a == 3 || $a == 5) {
			$prevhtml = '';
			$ensfhtml = '</div>';
		} else {
			$prevhtml = '';
			$ensfhtml = '';
		}
	 if( has_post_thumbnail() ){
			$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
			
		
        $output .= $prevhtml .'<div class="kvadrat-post2"  style="background-image: url('.$feat_image_url.');"><a href="' . get_permalink() . '"><p class="tilmjf2">'. get_the_title()  . '</p></a></div>'. $ensfhtml;
		$a = $a+1;} 
    endwhile;
    wp_reset_query();
    return $output . '</div>';
}
add_shortcode('post_new', 'posts_shortcode2');

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2019.03.03
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home']     = 'Accueil'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search']   = 'Résultats de la recherche pour la requête "%s"'; // текст для страницы с результатами поиска
	$text['tag']      = 'Posts tagués "%s"'; // текст для страницы тега
	$text['author']   = 'Articles de l"auteur %s'; // текст для страницы автора
	$text['404']      = 'Erreur 404'; // текст для страницы 404
	$text['page']     = 'Page %s'; // текст 'Страница N'
	$text['cpage']    = 'Page de commentaires %s'; // текст 'Страница комментариев N'

	$wrap_before    = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after     = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep            = '<span class="breadcrumbs__separator"> › </span>'; // разделитель между "крошками"
	$before         = '<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"
	$after          = '</span>'; // тег после текущей "крошки"

	$show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_url       = home_url('/');
	$link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '</span>';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );

	if ( is_home() || is_front_page() ) {

		if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

	} else {

		$position = 0;

		echo $wrap_before;

		if ( $show_home_link ) {
			$position += 1;
			echo $home_link;
		}

		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $show_home_link ) echo $sep;
				echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['search'], get_search_query() ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}

		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_time('Y') . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_month() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_day() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
			$position += 1;
			echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$position += 1;
				$post_type = get_post_type_object( get_post_type() );
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) echo $sep . $before . get_the_title() . $after;
				elseif ( $show_last_sep ) echo $sep;
			} else {
				$cat = get_the_category(); $catID = $cat[0]->cat_ID;
				$parents = get_ancestors( $catID, 'category' );
				$parents = array_reverse( $parents );
				$parents[] = $catID;
				foreach ( $parents as $cat ) {
					$position += 1;
					if ( $position > 1 ) echo $sep;
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
				if ( get_query_var( 'cpage' ) ) {
					$position += 1;
					echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
					echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				}  else { if(get_field('edit_breadcrumbs')[0] == 1){
					if ( $show_current ) echo $sep . $before . get_the_title() . $after;
					elseif ( $show_last_sep ) echo $sep;
				} if(get_field('edit_breadcrumbs')[0] == 2){
					if ( $show_current ) echo   '<span class="breadcrumbs__separator"> › </span>'. $before; echo the_field('title_for_breadcrumbs') ; echo  $after;
					
				}
						}
			}

		} elseif ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . $post_type->label . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_attachment() ) {
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
			$parents = get_ancestors( $catID, 'category' );
			$parents = array_reverse( $parents );
			$parents[] = $catID;
			foreach ( $parents as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			$position += 1;
			echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;

		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
			}
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$tagID = get_query_var( 'tag_id' );
				echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}

		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . $text['404'] . $after;
			elseif ( $show_last_sep ) echo $sep;

		} elseif ( has_post_format() && ! is_singular() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			echo get_post_format_string( get_post_format() );
		}

		echo $wrap_after;

	}
} // end of dimox_breadcrumbs()

function posts_shortcode1($atts, $content = NULL)
{
    
    ?>

<?php
    $wp_query = new WP_Query(array(
        "post_type" => "post",
        "post_status" => "publish",
        "posts_per_page" => 8
    ));
    
    if($wp_query->have_posts()) {
    $enil = 0;
        while($wp_query->have_posts()) {
        
            $wp_query->the_post();
            if($enil <= 3 ) {$enil = $enil + 1;continue;}
    
?>

<div class="gorixpost">
	 <a href="<?php the_permalink(); ?>" class="">
    <div class="photogor thumbnail-container">
        <?php echo get_the_post_thumbnail() ?>
    </div>
    <div class="photogortitl">
       
      <p class="titlegoif"><?php the_title(); ?></p>
    </div></a>
</div>

<?php $enil = $enil + 1; if($enil == 11){break;}
    wp_reset_query();
}
    }
}
add_shortcode('post_gorizont', 'posts_shortcode1');

function the_corenavi() {
    global $wp_query, $wp_rewrite;
    $pages = $out = '';
    $max   = $wp_query->max_num_pages;
    if ( ! $current = get_query_var( 'paged' ) ) {
        $current = 1;
    }
    $a['base']    = str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) );
    $a['total']   = $max;
    $a['current'] = $current;

    $total          = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size']  = 3; //сколько ссылок показывать слева и справа от текущей
    $a['end_size']  = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = '<'; //текст ссылки "Предыдущая страница"
    $a['next_text'] = '>'; //текст ссылки "Следующая страница"
    $a['prev_next'] = false;


    if ( $max > 1 ) {
        $out .= '<div class="paginate_links">';
    }
    if ( $total == 1 && $max > 1 ) {
        $pages = '<span>' . $current . ' из ' . $max . '</span>' . "\r\n";
    }
    $out .= $pages . paginate_links( $a );
    if ( $max > 1 ) {
        $out .= '</div>';
    }

    return print $out;
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, $count);
        return "250 SHARES";
		 $count = rand(270, 700);
    }
    return $count.'<br><span> SHARES</span>';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = rand(270, 700);
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, $count);
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function artabr_menu_no_link($no_link){
$in_link = '!<li(.*?)class="(.*?)current-menu-item(.*?)"><a(.*?)>(.*?)</a>!si';
$out_link = '<li$1class="\\2current-menu-item\\3">$5';
return preg_replace($in_link, $out_link, $no_link );
}
add_filter('wp_nav_menu', 'artabr_menu_no_link');


/********************************slot************/
function slots( $atts ){
	ob_start();

/*style slot*/?>
<style>
	.slots_s {
    display: flex;
    flex-wrap: wrap;
}
	.slots_s .bl-slot {
    display: flex;
    flex-direction: column;
    flex: 0 0 25%;
    justify-content: center;
    align-items: center;
}
	.slots_s .bl-slot a {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px;
    text-decoration: none !IMPORTANT;
    transition: 1s all;
    font-weight: 500;
}
	.slots_s .bl-slot a p {
    margin-top: 3px;
}
	.nav_slots a {
    margin: 10px;
}
.nav_slots {
    display: flex;
    justify-content: center;
    background: #dfdfdf;
    -moz-border-radius: 2px 2px 0 0;
    -webkit-border-radius: 2px 2px 0 0;
    border-radius: 2px 2px 0 0;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background-color: #d0d0d0;
    -moz-box-shadow: inset 0 0 0 1px rgba(0,0,1,.5);
    -webkit-box-shadow: inset 0 0 0 1px rgb(0 0 1 / 50%);
    box-shadow: inset 0 0 0 1px rgb(0 0 1 / 50%);
    text-align: center;
}
	.nav_slots a.dont {
    pointer-events: none;
    color: #757575;
}
	.nav_slots a.activ {
    color: #000;
	}   .nav_slots a{
		cursor: pointer;
		text-decoration: none;
	}
	.slots_s img {
    object-fit: cover;
    object-position: center center;
    width: 100%;
    height: 100px !important;
}
	.slots_s .bl-slot a p {
    text-align: center;
    position: absolute;
    max-width: 132px;
    bottom: -70px;
    min-height: 50px;
}.slots_s .bl-slot a {
    position: relative;
    margin-bottom: 60px;
}
	@media (max-width: 767px){
		.slots_s .bl-slot {
			display: flex;
			flex-direction: column;
			flex: 0 0 50%;
			justify-content: center;
			align-items: center;
		}
	}
</style>
<?/*style slot*/?>
	<div class="slots"> 
			
		<?$rows = get_field('add_slots');
		$bym = count($rows);?>
	
			<div class="nav_slots"> 
						<a class="dont slot_1"><</a>
						<a class="dont slot_1">1</a>
						<a class="slot_3">2</a>
						<a class="slot_4">3</a>
						<a class="slot_4">></a>
	
	
			</div>


	<div class="slots_s"> 
	<?if($rows) { ?>
					<?php $a=0; foreach($rows as $row) {?>
						<div class="bl-slot">
							<a href="<?php echo $row['link_slot']; ?>">
								<img src="<?php echo $row['img_slot']; ?>" alt="<?php echo $row['name_slot']; ?>">					
								<p><?php echo $row['name_slot']; ?></p>
							</a>
							
						</div>							
					<?php $a+=1; } ?>
						
			<?php }?></div></div>
		
<script>
		var bym = <? echo ceil($bym/(4*get_field('s_lines')));?>;
		var count = 1; 
		disp_blok(count);
		document.querySelectorAll(".nav_slots a")[3].onclick=nextik1;
		document.querySelectorAll(".nav_slots a")[4].onclick=nextik;
		document.querySelectorAll(".nav_slots a")[1].onclick=nextik2;
		document.querySelectorAll(".nav_slots a")[0].onclick=nextik3;
		document.querySelectorAll(".nav_slots a")[2].onclick=nextik4;
		function nextik() {
			count+=1;
			perep(count);
		}
		function nextik3() {
			count-=1;
			perep(count);
		}
		function nextik1() {
			if(count != 1){
				count+=1;
				perep(count);				
			} else{				
				count=3;
				perep(count);
			}
		}
		function nextik2() {
			if(count < bym){
				count-=1;
				perep(count);				
			} else{				
				count=bym-2;
				perep(count);
			}
		}
		function nextik4() {
			if(count == 1){
				count=2;
				perep(count);				
			} else {				
				count=bym-1;
				perep(count);
			}
		}
		function perep(lop) {
			document.querySelectorAll(".slot_3")[0].classList.add('dont');			
			document.querySelectorAll(".nav_slots a")[0].classList.remove('dont');
			document.querySelectorAll(".nav_slots a")[1].classList.remove('dont');
			document.querySelectorAll(".nav_slots a")[3].classList.remove('dont');
			document.querySelectorAll(".nav_slots a")[4].classList.remove('dont');
			if(lop == 2) { 
				document.querySelectorAll(".nav_slots a")[1].innerText = 1;
				document.querySelectorAll(".nav_slots a")[2].innerText = 2;
				document.querySelectorAll(".nav_slots a")[3].innerText = 3;
				disp_blok(lop);
				
			} else if(lop == 1) {
				document.querySelectorAll(".slot_3")[0].classList.remove('dont'); 				
				document.querySelectorAll(".nav_slots a")[1].innerText = 1;
				document.querySelectorAll(".nav_slots a")[2].innerText = 2;
				document.querySelectorAll(".nav_slots a")[3].innerText = 3;
				document.querySelectorAll(".nav_slots a")[0].classList.add('dont');
				document.querySelectorAll(".nav_slots a")[1].classList.add('dont');
				disp_blok(lop);
			} else if(lop == bym){				
				document.querySelectorAll(".slot_3")[0].classList.remove('dont'); 				
				document.querySelectorAll(".nav_slots a")[1].innerText = lop-2;
				document.querySelectorAll(".nav_slots a")[2].innerText = lop-1;
				document.querySelectorAll(".nav_slots a")[3].innerText = lop;
				document.querySelectorAll(".nav_slots a")[3].classList.add('dont');
				document.querySelectorAll(".nav_slots a")[4].classList.add('dont');
				disp_blok(lop);
			} else {
				document.querySelectorAll(".nav_slots a")[0].classList.remove('dont');
				document.querySelectorAll(".nav_slots a")[1].classList.remove('dont');
				document.querySelectorAll(".nav_slots a")[1].innerText = lop-1;
				document.querySelectorAll(".nav_slots a")[2].innerText = lop;
				document.querySelectorAll(".nav_slots a")[3].innerText = lop+1;		
				disp_blok(lop);		
			}
			
		}
		function disp_blok(num){
			for(var i = 0; i < <? echo ceil($bym);?>;i++){
				document.querySelectorAll(".bl-slot")[i].style.display = 'none';
			}
			for(var i = num*<? echo get_field('s_lines')*4;?>-<? echo get_field('s_lines')*4;?>; i < num*<? echo get_field('s_lines')*4;?>;i++){
				document.querySelectorAll(".bl-slot")[i].style.display = 'block';
			}
		}
</script>	
		
		<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
 
add_shortcode( 'slots', 'slots' );
/********************************slot************/
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page('Options');
}

function sideid1($atts, $content = NULL)
{
	ob_start();	 ?>
	
	id="<? the_field('sidebar_id1','option'); ?>"
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('sideid1', 'sideid1');

function sideid2($atts, $content = NULL)
{
	ob_start();	 ?>
	
	id="<? the_field('sidebar_id2','option'); ?>"
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('sideid2', 'sideid2');

function sideid3($atts, $content = NULL)
{
	ob_start();	 ?>
	
	id="<? the_field('sidebar_id3','option'); ?>"
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('sideid3', 'sideid3');


 function tblank($atts, $content = NULL)
{
	ob_start();	 ?>
	
	target="_blank"
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('tblank', 'tblank'); 

 function bonusbutton($atts, $content = NULL)
{
	ob_start();	 ?>
	
	id="<? the_field('bonusid','option'); ?>"
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('bonusbutton', 'bonusbutton'); 

function cta3element1($atts, $content = NULL)
{
	ob_start();	 ?>
	
	id="<? the_field('cta3element1_input','option'); ?>"
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('cta3element1', 'cta3element1');


function cta3element2($atts, $content = NULL)
{
	ob_start();	 ?>
	
	id="<? the_field('cta3element2_input','option'); ?>"
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('cta3element2', 'cta3element2');


function cta3element3($atts, $content = NULL)
{
	ob_start();	 ?>
	
	id="<? the_field('cta3element3_input','option'); ?>"
		
	<?php
	$myvariable = ob_get_clean();
	return $myvariable;
}
add_shortcode('cta3element3', 'cta3element3');


// запрещаем актив ссылки в коментах
function remove_link_comment($link_text) {
return strip_tags($link_text);
}
add_filter('pre_comment_content','remove_link_comment');
add_filter('comment_text','remove_link_comment');
