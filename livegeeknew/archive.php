<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package livegeeknew
 */

get_header();
?>
<div class="container">
	<main id="primary" class="site-main archive-container">
		<h2><?php single_cat_title(); ?></h2>
 <?php
            $args = array_merge($wp_query->query, array(
                'posts_per_page' => 4,
                'nopaging' => true
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
                 the_corenavi(); ?>
             <?php else : get_template_part('empty'); ?>   
             <?php endif; ?>                     
             
             <?php if ($desc = get_the_archive_description()) : ?>
        <?php the_archive_description(); ?>                                        
                    <?php echo apply_filters('the_content', $desc) ?>                                        
                 </article>                 
             <?php endif; ?>
	</main> <?php
get_sidebar(); ?> </div><!-- #main -->

<?php
get_sidebar();
get_footer();
