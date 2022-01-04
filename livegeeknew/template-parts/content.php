<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package livegeeknew
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				livegeeknew_posted_on();
				
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	 <?php setPostViews(get_the_ID()); ?>

	<?php livegeeknew_post_thumbnail(); ?>
<!-- AddToAny BEGIN -->
	<div class="row row-views">
		<div class="col-md-4 views_blog">
			 <?php echo  getPostViews(get_the_ID()); ?>
		</div>
	<div class="col-md-8">
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_button_facebook classpc">Share on Facebook</a>
<a class="a2a_button_twitter classpc">Share on Twitter</a>
<a class="a2a_button_facebook classmob"></a>
<a class="a2a_button_twitter classmob"></a>
<a class="a2a_button_linkedin"></a>
<a class="a2a_button_pinterest"></a>
</div>
		</div>
		</div>
<!-- AddToAny END -->
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'livegeeknew' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'livegeeknew' ),
				'after'  => '</div>',
			)
		);
		?> <?php echo do_shortcode('[faqpost]'); ?>
								<? if(is_single()) { ?>
        <div class="block-avtora" style=" <?php if(get_field('cjdc')[0] == "1") { ?>display:none;<?php } ?> <?php if(get_field('cjdc')[0] == "2") { ?>display:none;<?php } ?>">
          <div class="avtor-left">
            <div class="virovphoto" style="background-image: url('/wp-content/uploads/2021/01/rio.jpg')"></div>
            <span class="name-avtor"><a href="/simon-rio-author/"><p>Simon Rio</p></a></span>
          </div>
          <div class="avtor-right"><p>Je suis né dans le sud de la France, plus précisément à Toulouse, où j’y ai fait mes études. Passionné des jeux vidéos, jusqu’à dire que je suis un geek, j’ai choisi de débuter ma vie dans le monde du jeu et plus précisément dans celui des casinos. En effet, j’ai commencé mes débuts en tant que bookmaker dans un casino terrestre, avant de m’intéresser davantage aux casinos en ligne.<br>
De nombreuses opportunités se sont offertes à moi, ce qui m’a permis d’apprendre à écrire sur le sujet du casino. Désormais, je suis rédacteur auprès de LiveGeek, un site en ligne spécialisé dans l’actualité des casinos en ligne. Vous y trouverez de nombreux de mes écrits. </p>
            <div class="avtorfull bot_soc"> 
              
            <a class="bot_soc_f" href="https://www.linkedin.com/in/simon-rio-7b305a203/"></a>
      
          </div>
          </div>
        </div>
      
       <?php if(get_field('cjdc')[0] == "2") { ?><div class="block-avtora" style=" <?php if(get_field('cjdc')[0] == "1") { ?>display:none;<?php } ?>">
          <div class="avtor-left">
            <div class="virovphoto" style="background-image: url(<?php echo the_field('avimg'); ?>)"></div>
            <span class="name-avtor"><?php echo the_field('name_avtor'); ?></span>
          </div>
          <div class="avtor-right"><?php echo the_field('text_avtor'); ?>
            <div class="avtorfull bot_soc"> 
              <?php if(get_field('faceb') != ""){?>
            <a class="bot_soc_f" href="<?php echo the_field('faceb') ?>"></a><?php }?>
            <?php if(get_field('twit') != ""){?>
            <a class="bot_soc_t" href="<?php echo the_field('twit') ?>"></a><?php }?>
            <?php if(get_field('idcar') != ""){?>
            <a class="bot_soc_i" href="<?php echo the_field('idcar') ?>"></a><?php }?>
          </div>
          </div>
        </div><?php }} ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php livegeeknew_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
