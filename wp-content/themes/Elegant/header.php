<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>



<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/960.css" type="text/css" media="screen" />




<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/comment-reply.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jqueryslidemenu.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/shlomb.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/shorwa.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js"></script>


<?php
	
	$theme_scheme = get_option(SHORT_NAME . 'theme_scheme');
	$theme_dir = get_bloginfo("stylesheet_directory");
	
	if ($theme_scheme == 'Black Style') {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/black/black.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/black/jqueryslidemenu-b.css" type="text/css" media="screen" />';
		
	}
	


	else {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/default/style.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/default/jqueryslidemenu.css" type="text/css" media="screen" />';
		
	}
?>



<!--[if lte IE 7]>
<style type="text/css">
html .jqueryslidemenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->


<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/Cantarell_500.font.js"></script>

 <script type="text/javascript">
 
     Cufon.replace('h1', { hover: true, fontFamily: 'Cantarell' });
     Cufon.replace('h2', { hover: true, fontFamily: 'Cantarell' });
     Cufon.replace('h3', { hover: true, fontFamily: 'Cantarell' });
     Cufon.replace('h4', { hover: true, fontFamily: 'Cantarell' });
     Cufon.replace('h5', { hover: true, fontFamily: 'Cantarell' });
     Cufon.replace('h6', { hover: true, fontFamily: 'Cantarell' });
     Cufon.replace('.latest-title', { hover: true, fontFamily: 'Cantarell' });
	 Cufon.replace('.latest-disc-small', { hover: true, fontFamily: 'Cantarell' });
	 Cufon.replace('.intro-d', { hover: true, fontFamily: 'Cantarell' });
	 Cufon.replace('.aff-hd', { hover: true, fontFamily: 'Cantarell' });
	 Cufon.replace('.txt-wgt', { hover: true, fontFamily: 'Cantarell' });
	 Cufon.replace('.sider-22 h2', { hover: true, fontFamily: 'Cantarell' });
	 Cufon.replace('#comments', { hover: true, fontFamily: 'Cantarell' });
     </script>

 

<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto({theme:'light_rounded'});
		});
	</script>

<?php wp_get_archives('type=monthly&format=link'); ?>



<style type="text/css" media="screen">
<?php 
	
	
	$body_image = get_option(SHORT_NAME . 'body_image');
	
	$body_image = trim($body_image);
	
	if ($body_image == "") {
	
	
	}
	else {
		echo 'body{ background:url("' . $body_image . '");}';
	}
?>
</style>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.innerfade.js"></script>





<script type="text/javascript">
	   $(document).ready(
				function(){					
					$('ul#doi').innerfade({
						speed: 1000,
						timeout: 3000,
						type: 'sequence',
						containerheight: '220px'
					});
			});
</script>
<?php wp_head(); ?>

</head>

<body>
 <div class="container_12">
	  <div id="main">
	     <div class="top-border"></div>
		 
	        <div class="pager">
	            <div class="header">
		
	            <div class="grid_8">
		 
		        <div class="logo"><?php the_logo(); ?>
		        </div><!-- end: logo -->
		
		        </div><!-- end: grid_8 -->

               <div class="grid_4">
		       <div class="search-main"> <div class="search-box">
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" size="15" class="search-field" name="s" id="s" value="SEARCH OUR SITE" onfocus="if(this.value == 'SEARCH OUR SITE') {this.value = '';}" onblur="if (this.value == '') {this.value = 'SEARCH OUR SITE';}"/>
<div class="spo"><input  type="submit" class="search-go" value="" /></div>	
</form></div><!-- end: search-box --></div>
	           </div><!-- end: grid_4 -->
			   
			    <div class="grid_12">
				<div class="jqm-main">
                     <div id="myslidemenu" class="jqueryslidemenu">
                       <?php wp_nav_menu( array( 'menu_id' => 'nav', 'menu_class' => 'jqueryslidemenu', 'theme_location' => 'primary' ) ); ?>
					    
                    </div><!-- end: top-menu --> </div>
				</div><!-- end: grid_12 --> 
        </div><!-- end: header --> 
		