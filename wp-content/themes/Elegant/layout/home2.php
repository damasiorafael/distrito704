

<?php get_header(); ?>


 <div class="grid_12">  <?php
	$disable_feat_contenth = get_option(SHORT_NAME . 'disable_featured_contenth');
	if (! $disable_feat_contenth) {
?> <div class="s-shado">
	                            <?php
	$do_not_duplicate[] = array();

	$featured_cat = get_option(SHORT_NAME . 'featured_cat');
	$featured_posts_countr = get_option(SHORT_NAME . 'featured_posts_countr');
				
	$args = array(	'cat' => $featured_cat,
					'showposts' => $featured_posts_countr,
					'post__not_in' => $do_not_duplicate);
		
	$featured_query = new WP_Query($args);
?>
	<ul id="doi">
<?php
	while ($featured_query->have_posts()) : $featured_query->the_post();
			$do_not_duplicate[] = $post->ID;
			$image = get_post_meta($post->ID, "Image", $single = true);

			if ($image !== '') { 
?>
			<li><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/phpThumb/phpThumb.php?src=<?php echo $image; ?>&amp;h=307&amp;w=940&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>" style="border:none;" /></a>
			</li>
<?php 		}
			else {
				echo '';
			} 
?>
<?php endwhile; ?>
</ul>
							   </div><?php
	}
?>
							   <?php
	$disable_featp = get_option(SHORT_NAME . 'disable_featuredpost');
	if (! $disable_featp) {
?> 
							   <div class="latest-main">
							   
							   <div class="latest-title"> <?php $fth= get_option(SHORT_NAME . 'fth'); echo $fth; ?>  <span class="latest-disc-small"> <?php $fths= get_option(SHORT_NAME . 'fths'); echo $fths; ?> </span></div>
							    
							   <div class="latest-content">
							 
							   <div class="portfolio-mainhm">
							    <?php 

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
							    <div class="portfolio-contenthm">
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
		?>
							   </div>   <div class="clear"></div>
							   		
							   </div>
	                        </div><!-- end: grid_12 --> <?php
	}
?>
	
	 <?php
	$disable_fet = get_option(SHORT_NAME . 'disable_webi');
	if (! $disable_fet) {
?> 
	                           <div class="grid_12"> 
							   <div class="intro-d"><?php $fthwh= get_option(SHORT_NAME . 'fthwh'); echo $fthwh; ?></div>
							     <div class="intro-d-p"><p><?php $fthws= get_option(SHORT_NAME . 'fthws'); echo $fthws; ?></p></div>
								 
							   </div>
                                <div class="clear"></div>
								  <?php
	}
?>
								</div></div>
<?php get_footer(); ?>
