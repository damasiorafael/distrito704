<?php get_header(); ?>

  <div class="grid_12">
	                       
								
	                             <div class="breadcrumbb-contentb"><div class="breadcrumbs">You are here:
<?php
if(function_exists('bcn_display'))
{
    bcn_display();
}
?>
</div></div>
								    
                            
                              
							
				
								
	                        </div><!-- end: grid_12 --> 
							
							
							<div class="blogg-contenty"> 	<div class="blogp-heading"><h2>Search Results for: <span style="color:#ababab;"><?php the_search_query(); ?></span></h2></div>
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  <?php $image = get_post_meta($post->ID, "Image", $single = true); ?>


						 
						
							<div class="portb-thumbb">	<?php if ($image !== '') { ?> <a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/phpThumb/phpThumb.php?src=<?php echo $image; ?>&amp;h=225&amp;w=647&amp;zc=1&amp;q=100" alt="<?php the_title(); ?>" style="border:none;" /></a>
						<?php }
						else {
							echo '';
						} ?></div>
						
						    	<div class="portfoliob-titleb"><h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
								<div class="mrecentb-authorb"> <?php the_time('F jS, Y') ?><span class="mrecent-autimg2"><span class="mrecent-authord"><?php the_category(', ') ?></span><span class="mrecent-autimg"><?php the_author() ?> </span><span class="mrecent-autimg3"><a href="<?php comments_link(); ?>"> <?php comments_number ('0','1','%'); ?> Comments</a></span></span></div>
							<div class="blog1ent-entry"><p> <?php the_excerpt(); ?>   </p></div>
                            <div class="portfoliob-readb-linkb"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read more &raquo; </a></div>
                           					<?php endwhile; ?> 
<div class="pagi">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
			</div>
		<?php else : ?>
		
			<div class="bg-oo">
		<div class="cate-oops">Oops! No Posts Found </div>
		<div class="cate-aeros">Sorry, but you are looking for something that isn't here. </div></div>

		<?php endif; ?>	
		</div></div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>