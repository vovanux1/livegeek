<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package livegeeknew
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- .entry-header -->
<div style="display:flex;" class="search-flex">
	
	<?php livegeeknew_post_thumbnail(); ?>
<div style="display:flex;flex-direction:column;justify-content:start;" class="search-flex-column">
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta" style="display:none">
			<?php
			livegeeknew_posted_on();
			livegeeknew_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header>
	
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	</div>
	</div>
	<footer class="entry-footer" style="display:none;">
		<?php livegeeknew_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
