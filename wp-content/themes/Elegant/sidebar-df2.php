<div class="m-blog-sidev2"><?php

	$ads = get_option(SHORT_NAME . 'doig');
	
	if ($ads != true) {
		$top_left = get_option(SHORT_NAME . 'top_left_ad');
		$top_right = get_option(SHORT_NAME . 'top_right_ad');
		$bottom_left = get_option(SHORT_NAME . 'bottom_left_ad');
		$bottom_right = get_option(SHORT_NAME . 'bottom_right_ad');
		
		$top_left = trim($top_left);
		$top_right = trim($top_right);
		$bottom_left = trim($bottom_left);
		$bottom_right = trim($bottom_right);
		
		$top_left_link = get_option(SHORT_NAME . 'top_left_ad_link');
		$top_right_link = get_option(SHORT_NAME . 'top_right_ad_link');
		$bottom_left_link = get_option(SHORT_NAME . 'bottom_left_ad_link');
		$bottom_right_link = get_option(SHORT_NAME . 'bottom_right_ad_link');
		
		$dir = get_bloginfo('template_directory');
		$phpThumb = "/phpThumb/phpThumb.php?src=";
		$attributes = "&amp;h=125&amp;w=125&amp;zc=1&amp;q=100";
		
		if ($top_left != "") {
			$top_left = $dir . $phpThumb . $top_left . $attributes . '"/>';
		}
		if ($top_right != "" ) {
			$top_right = $dir . $phpThumb . $top_right . $attributes . '"/>';
		}
		if ($bottom_left != "") {
			$bottom_left = $dir . $phpThumb . $bottom_left . $attributes . '"/>';
		}
		if ($bottom_right != "") {
			$bottom_right = $dir . $phpThumb . $bottom_right . $attributes . '"/>';
		}
?>
<div class="aff-main2"><div class="aff-hd">Affiliates</div>
								 <div class="ad-left"><a href="<?php echo $top_left_link; ?>"><img src="<?php if ($top_left != "") { echo $top_left; } else { bloginfo('stylesheet_directory'); ?>/images/aden.gif" border="0" alt="ads" /><?php } ?></a></div> 
				<div class="ad-right"><a href="<?php echo $top_right_link; ?>"><img src="<?php if ($top_right != "") { echo $top_right; } else { bloginfo('stylesheet_directory'); ?>/images/3docean.gif" border="0" alt="ads" /><?php } ?></a></div> 
				<div class="ad-left"><a href="<?php echo $bottom_left_link; ?>"><img src="<?php if ($bottom_left != "") { echo $bottom_left; } else { bloginfo('stylesheet_directory'); ?>/images/griver.gif" border="0" alt="ads" /><?php } ?></a></div> 
				<div class="ad-right"><a href="<?php echo $bottom_right_link; ?>"><img src="<?php if ($bottom_right != "") { echo $bottom_right; } else { bloginfo('stylesheet_directory'); ?>/images/tforest.gif" border="0" alt="ads" /><?php } ?></a></div> 
								</div>
								<div class="clear"></div>
								 <div class="s-bder3"></div><?php 
	}
?>
								<?php 	
if ( !function_exists('dynamic_sidebar') || 
!dynamic_sidebar("Blog-2-Sidebar-Widgets") ) : ?>


<div class="side-cats2">
<div class="sider-22">


<div class="woodo">
Now add some widgets!
</div></div></div>
	<?php endif; ?>	


		
</div></div> 
								









 </div>   


