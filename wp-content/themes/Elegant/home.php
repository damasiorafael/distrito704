<?php
	
	$layout = get_option(SHORT_NAME . 'theme_layout');
	
	if ($layout == 'Portfolio 1') {
		require_once(TEMPLATEPATH . '/layout/portfolio.php');
	}
	else if ($layout == 'Portfolio 2') {
		require_once(TEMPLATEPATH . '/layout/portfolio2.php');
	}
	else if ($layout == 'Blog 1') {
		require_once(TEMPLATEPATH . '/layout/blog.php');
	}
	else if ($layout == 'Homepage 2') {
		require_once(TEMPLATEPATH . '/layout/home2.php');
	}
	else if ($layout == 'Blog 2') {
		require_once(TEMPLATEPATH . '/layout/blog2.php');
	}
	else {
		require_once(TEMPLATEPATH . '/layout/default.php');
	}
	
?>