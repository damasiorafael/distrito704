<?php /*
Template Name: contact
*/
if(is_page('contact')) {
   if (get_query_var('paged'))
      $paged = get_query_var('paged');
   else $paged = 1;
   query_posts("paged=$paged");
}   
	  
?>

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
							
							
							<div class="blogg-contenty"> 	<div class="blogp2-heading"><h2><?php the_title(); ?></h2></div>
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="pportfoliobp-descriptionbp"><p> <?php the_content(); ?> </p></div>
                          
		</div></div>
<?php endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>