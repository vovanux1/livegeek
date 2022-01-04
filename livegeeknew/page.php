<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package livegeeknew
 */

get_header();
if(is_front_page()) { echo do_shortcode('[psac_post_carousel  slide_show="5" show_date="false" show_author="false" show_tags="false" show_comments="false" show_content="false" media_size="medium" sliderheight="150" limit="12" dots="false"  autoplay_interval="7000"]'); }
?>

<div class="container" id="#maincontainer">
<? if(is_paged())
{
	
            $args = array_merge($wp_query->query, array(
                'posts_per_page' => 4,
                'nopaging' => true
            ));
            query_posts($args);

            if (have_posts()) :
            // begin
                                 $aTools_out = '<div class="post-tile-list col-213-23" style="margin-top:10px;">';
                    while (have_posts()) :
                        the_post();
                        $aTools_out .= ''

                            . '<div class="post-tile-list__col-213">'
                            . '<a class="post-tile-i goto" href="'
                            . get_permalink()
                            . '"'
                            . ' title="'
                            . esc_attr(get_the_title())
                            . '">'

                            . '<figure class="post-tile-img">'
                            . get_the_post_thumbnail()
                            . '</figure>'
                            . '<div class="post-tile-title">'
                            . get_the_title()
                            . '</div>'
                            . '</a>'
                            . '</div>';
                    endwhile;
                    $aTools_out .= '</div>';

                    echo $aTools_out;
                    //end
                 the_corenavi(); ?>
             <?php else : get_template_part('empty'); ?>   
             <?php endif; ?>                     
             
             <?php if ($desc = get_the_archive_description()) : ?>
        <?php the_archive_description(); ?>                                        
                    <?php echo apply_filters('the_content', $desc) ?>                                        
                 </article>                 
             <?php endif; 
} 
	else { ?>
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
	?> 
	
</div><?php 
				if(is_home() || is_front_page() ){
?> <div class="container"> <? echo do_shortcode('[post_new]'); ?> </div> <? 
?><div class="container container-first"><div class="col-md-8"><span>LATEST NEWS</span> </div><div class="col-md-4"> <span>A LA UNE</span></div></div> <div class="container"><div class="col-md-8"><span class="alanu-mob">LATEST NEWS.</span>
	 <?php
            $args = array_merge($wp_query->query, array(
                'posts_per_page' => 4,
                'nopaging' => false
            ));
            query_posts($args);

            if (have_posts()) :
            // begin
                                 $aTools_out = '<div class="post-tile-list">';
                    while (have_posts()) :
                        the_post();
                        $aTools_out .= ''

                            . '<div class="post-tile-list__col">'
                            . '<div class="post-tile-i goto" '
                           
                           
                            . '>'

                            . '<figure class="post-tile-img">'
                            . get_the_post_thumbnail()
                            . '</figure>'
                            . '<div class="photogortitl"><div class="post-tile-title">'
                            . get_the_title()
                            . '</div>'
							.'<p class="goedesh">'
							. get_the_excerpt()
							.'</p>'
							. '<a href=" '
							. get_the_permalink()
							. '" class="jeg_readmore">Read more</a> '
							.'</div>'
							
                            . '</div>'
                            . '</div>';
                    endwhile;
                    $aTools_out .= '</div>';

                    echo $aTools_out;
                    //end
                 ?>
             <?php else : get_template_part('empty'); ?>   
             <?php endif; ?>                     
             
             <?php if ($desc = get_the_archive_description()) : ?>
        <?php the_archive_description(); ?>                                        
                    <?php echo apply_filters('the_content', $desc) ?>                                        
                 </article>                 
             <?php endif; ?>  
	</div><div class="col-md-4">
		<span class="alanu-mob">A LA UNE.</span>
<?
					echo do_shortcode('[post_gorizont]'); ?>
		
	</div></div> <?
				}} ?><?
get_footer();
