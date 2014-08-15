<?php get_header(); ?>


  <div class="grid_12">
	                            <div id="breadcrumb-main">
	                               <div class="breadcrumb-content">You are here: <a href="<?php bloginfo('url'); ?>"> &raquo; Home</a> &raquo; Portfolio</div>
								     <div class="portfolio-heading"><h2><?php $frti= get_option(SHORT_NAME . 'frti'); echo $frti; ?></h2></div>
                                </div><!-- end: breadcrumb-main --> 
								
                              
								<div class="clear"></div>
								  <div class="sup-menu">
                                               

                        </div><!-- end: sub-menu -->
								
	                        </div><!-- end: grid_12 --> 							
							<div class="grid_12">
			
						  <div class="portfolio-main">
										  <?php 
	
		$cat2 = get_option(SHORT_NAME . 'category_20');
		$featured_posts_count = get_option(SHORT_NAME . 'featured_posts_count');
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		$args = array(	
		
		            'cat' => $cat2,
					'showposts' => $featured_posts_count,
					'post__not_in' => $do_not_duplicate,
					'paged' => get_query_var('paged')
					
					);
					
						
		
		query_posts($args);
		if (have_posts() && (! ($cat2 < 0))) {
			while (have_posts()) : the_post();
				$image = get_post_meta($post->ID, "Image", $single = true); ?>
						    <div class="portfolio-content">
							<div class="shada1">
							<div class="port-thumb">	<?php if ($image !== '') { ?>
							<a href="<?php echo $image; ?>" title="<?php the_title(); ?>" rel="prettyPhoto[group]">
<img src="<?php bloginfo('template_directory'); ?>/phpThumb/phpThumb.php?src=<?php echo $image; ?>&amp;h=130&amp;w=289&amp;zc=1&amp;q=100"  style="border:none;" /></a>
						<?php }
						else {
							echo '';
						} ?></div></div>
							<div class="portfolio-title"><h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
							<div class="portfolio-description"><p> <?php the_excerpt(); ?>   </p></div>
                            <div class="portfolio-read-link"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read more </a></div>
                            </div><!-- end: portfolio-content --> 	<?php endwhile; 		}
		else {
			print_emp_cat('2', $cat2);
		}
	?> 
	<div class="clear"></div></div>					
	
	<div class="pagi-po">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
			</div><div class="clear"></div>
	</div></div>


<?php get_footer(); ?>