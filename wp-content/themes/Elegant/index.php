

<?php get_header(); ?>

 <div class="grid_12">   <div class="s-shado">
	                           <?php if (function_exists(s3slider_show())) { s3slider_show(); } ?>
							   </div>
							   
							   <div class="latest-main">
							   
							   <div class="latest-title"> Featured Posts  <span class="latest-disc-small"> Hey man, relax and browse all elegant great features with many nice options </span></div>
							    
							   <div class="latest-content">
							 
							   <div class="portfolio-main">
							    <?php 
	$cat1_show = get_option(SHORT_NAME . 'cat1_show');
	if ($cat1_show == true) {
		$cat1 = get_option(SHORT_NAME . 'category_1');
		
		$args = array(	'cat' => $cat1,
						'showposts' => 4);
		
		if ($duplicate != true) {
			$args = array(	'cat' => $cat1,
							'showposts' => 4,
							'post__not_in' => $do_not_duplicate);
		}
		
		$recent = new WP_Query($args);
		if ($recent->have_posts() && (! ($cat1 < 0))) {
			while ($recent->have_posts()) : $recent->the_post();
				$do_not_duplicate[] = $post->ID;
				$image = get_post_meta($post->ID, "Image", $single = true); ?>
							    <div class="portfolio-content">
									<?php if ($image !== '') { ?>
								<a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/phpThumb/phpThumb.php?src=<?php echo $image; ?>&amp;h=90&amp;w=221&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>" style="border:none;" /></a>
							<?php }
							else {
								echo '';
							} ?>
								</div>
							 <?php endwhile; 
		}
		else {
			print_emp_cat('1', $cat1);
		}
	}	?>
							   </div>   <div class="clear"></div>
							   		
							   </div>
	                        </div><!-- end: grid_12 --> 
	
	
	                           <div class="grid_12"> 
							   <div class="intro-d">Welcome to Company, Its so Nice!</div>
							     <div class="intro-d-p"><p>Apeirian eleifend forensibus at sit. Justo laboramus temporibus eu vis, eam reque temporibus omittantur in, pri erat takimata intellegat et. Simul congue electram sea ea, vis vidit illud sonet ex. Diam suscipit appareat ne eam, ea justo iriure insolens mei. Apeirian eleifend forensibus at sit. Justo laboramus temporibus eu vis, eam reque temporibus omittantur in, pri erat takimata intellegat et. Simul congue electram sea ea, vis vidit illud sonet ex. Diam suscipit appareat ne eam.</p></div>
								 
							   </div>
                                <div class="clear"></div>
								<div class="m-blog-main">
								
								<div class="m-blog-content">
								<?php 
	$post_count = get_option(SHORT_NAME . 'full_blog_post_count');
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	$args = array(	'posts_per_page' => $post_count,
					'paged' => $paged);
	query_posts($args);
		
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $image = get_post_meta($post->ID, "Image", $single = true); ?>

<?php if ($image !== '') { ?>
<div class="m-blog-all-e">
<div class="m-blog-thumb">
							<a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/phpThumb/phpThumb.php?src=<?php echo $image; ?>&amp;h=145&amp;w=145&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>" style="border:none;" /></a>
						<?php }
						else {
							echo '';
						} ?>
						</div>
						
		<div class="m-blog-entry"><div class="m-blog-title"><h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
		<div class="mrecent-author"> <?php the_time('F jS, Y') ?><span class="mrecent-autimg2"><span class="mrecent-authord"><?php the_category(', ') ?></span><span class="mrecent-autimg"><?php the_author() ?> </span><span class="mrecent-autimg3"><a href="<?php comments_link(); ?>"> <?php comments_number ('0','1','%'); ?> Comments</a></span></span></div>
		<p>  <?php the_excerpt(); ?>  </p>
		<div class="m-blog-mlink"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read more </a></div>
		</div><div class="clear"></div>
		</div>
		<div class="clear"></div>
		<?php endwhile; ?> 
<div class="pagi">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
			</div>
		<?php else : ?>
		
			<div class="bg-oo">
		<div class="cate-oops">Oops! No Posts Found </div>
		<div class="cate-aeros">Sorry, but you are looking for something that isn't here. </div></div>

		<?php endif; ?>		
								</div>
								
								
								
		
										

   
	
	            
               
				 
		  

<?php get_sidebar(); ?>
<?php get_footer(); ?>
