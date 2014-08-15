<?php

$cp_options;
$theme_name;

function WP_Control_Panel($options, $name, $short_name) {
	
	global $cp_options;
	global $theme_name;
	
	if (! is_array($options)) {
		die("Expects an array");
	}
	
	if (empty($short_name)) {
		die("Short name must be provided");
	}
	
	if (empty($options)) {
		die("Array cannot be empty");
	}
	
	if (! is_string($name)) {
		die("Name needs to be of type string");
	}
	elseif (empty($name)) {
		die("Name cannot be empty");
	}
	else {
		$theme_name = $name;
	}
		
	
	for ($i = 0; $i < count($options); $i++) {
		if(array_key_exists('id', $options[$i])) {
			$options[$i]['id'] = $short_name . $options[$i]['id'];
		}
	}
	
	$cp_options = $options;
	
	foreach($cp_options as $option) {
		if ((array_key_exists('id', $option) === true) && (get_option($option['id']) === false)) {
			add_option($option['id'], $option['std']);
		}
	}
}

function add_menu() {
	global $cp_options;
	global $theme_name;
	
	
	if ($_GET['page'] == basename(__FILE__)) {
		
		if ($_REQUEST['action'] == 'save') {
		
			foreach ($cp_options as $option) {
				update_option($option['id'], stripslashes($_REQUEST[$option['id']]));
			}
			
			header("Location: themes.php?page=functions.php&saved=true");
			die;
		}			
	}
	
	add_menu_page($theme_name . ' Theme Control Panel', $theme_name . ' Theme Control Panel', 10, basename(__FILE__), 'show_cp_page');
}

function admin_head() {
	
	global $cp_options;
	global $theme_name;
	
	print '<style type="text/css">';
?>

<?php
		print '</style>';
	}
	
function add_page() {
		add_action('admin_menu', 'add_menu');
		add_action('admin_head', 'admin_head');
}
	
function show_cp_page() {
	
	global $cp_options;
	global $theme_name;
		
		if ($_REQUEST['saved'] == true) {
			echo '<div class="updated fade" id="message" style="background:#ffe8e8; margin-bottom:25px;width:727px; border: 1px dotted #ca0000; padding:11px 0 11px 11px; margin-left: 5px; margin-top: 17px;"><p><strong> Elegant Settings Saved.</strong></p></div>';
		}
?>
		<div class="theme-settings">
		<h2 style="font-family: Georgia; font-size:22px; font-weight:normal; margin-left:5px;  font-style:italic; letter-spacing:1px; width:97.6%; height:29px; margin-bottom:0px; padding-bottom:7px; color:#555555; padding-bottom:10px;"><?php print $theme_name; ?> Settings<div style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color: #6F5D57;  padding-left:543px; padding-top:20px;">Theme by <a href="http://www.moonthemes.com">MoonThemes.com</a></div></h2>
		<div style="font-family:verdana; color#333; font-size:12px; margin-left:5px;">To easily customize the Eyegaze theme, you can use the menu below.</div>
		
		<form action="" method="post">
		<fieldset>
		<?php 
		foreach ($cp_options as $option) {
		
			switch ($option['type']) {
				
				case "title":
		?>		
				<h3 style="background:#d2eaff; width: 727px; border: 1px solid #c1ddf5; height:27px; padding-top:16px; padding-left:11px; padding-bottom:11px;font-family: Verdana; font-size:13px; color:#333; font-weight:normal; margin-top:18px;margin-left:5px; margin-bottom:0px; text-transform:uppercase; font-weight:bold; "><?php echo $option['name']; ?> <div style=" float:right; margin-top:-27px; padding-right:11px;"><div class="submit">
			<input style="width:86px; height:13px; padding-bottom:5px;" name="save" type="submit" value="Save changes" />
			<input type="hidden" name="action" id="action" value="save" />
			</div></div></h3>
			
		<?php
				break;
				
				case "text":
		?>		
		        <div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:31px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid#cae2f7;">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
				<input style="display:inline; float:left; width:147px; height:22px; border: 1px solid #dfdfdf; background:#fff;padding-top:3px;" name="<?php echo $option['id']; ?>" id="<?php echo $option['id']; ?>" type="<?php echo $option['type']; ?>" value="<?php if (get_option($option['id']) != "") { echo get_option($option['id']); } else { echo $option['std']; }?>" />
				<small style="display:inline; float:left; width:320px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /></div>
				
		<?php
				break;
				
				case "textarea":
		?><div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:149px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid#cae2f7; ">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
				<textarea style="display:inline; float:left; width:147px; height:140px; border: 1px solid #dfdfdf; background:#fff;padding-top:3px;" name="<?php echo $option['id']; ?>" type="<?php echo $option['type']; ?>" cols="30" rows=""><?php if (get_option($option['id']) != "") { echo get_option($option['id']); } else { echo $option['std']; } ?></textarea>
				<small style="display:inline; float:left; width:200px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /></div>
		<?php 	
				break;
				
				case "select":
		?>
		        <div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:31px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid #cae2f7;">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>" class="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
				<select style="display:inline; float:left; width:147px; height:22px; border: 1px solid #dfdfdf; background:#fff;padding-top:3px;" name="<?php echo $option['id']; ?>" id="<?php echo $option['id']; ?>">
					<?php foreach ($option['options'] as $op) { ?>
						<option <?php if (get_option($option['id']) == $op) { echo 'selected="selected"'; } elseif ($op == $option['std']) { echo 'selected="selected"'; } ?>><?php echo $op; ?></option>
		<?php
					}
		?>
				</select>
				<small style="display:inline; float:left; width:320px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /><br/></div>
		<?php
				break;
				
				case "selectcat":
		?>
		<div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:31px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid#cae2f7;">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>" class="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
		<div style="float:left; display:inline; width:149px;"><?php
				$old = get_option($option['id']) === false ? '-1' : get_option($option['id']);
				$args = array(	'depth' => 0,
								'hierarchical' => 1,
								'hide_empty' => 0,
								'name' => $option['id'],
								'class' => $option['id'],
								'selected' => $old,
								'show_option_none' => 'No category selected');
				wp_dropdown_categories($args);
		?></div>
				<small style="display:inline; float:left; width:320px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /></div>
		<?php
				break;				
				
				case "checkbox":
		?>
		<div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:31px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid#cae2f7;">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
				<?php if (get_option($option['id']) == 'true') { $checked = 'checked="checked"'; } elseif (get_option($option['id']) === false && $option['std'] == 'true') { $checked = 'checked="checked"'; } else { $checked = ""; } ?>
				<input style="display:inline; float:left; width:147px; height:22px; border: 1px solid #dfdfdf; background:#fff;padding-top:3px;" type="checkbox" name="<?php echo $option['id']; ?>" id="<?php echo $option['id']; ?>" value="true" <?php echo $checked; ?> />
				
				<small style="display:inline; float:left; width:320px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /></div>
		<?php
				break;
			}
		}
		?>
		
			<div style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color: #6F5D57; padding-bottom:35px; padding-left:5px; padding-top:20px;">Theme by <a href="http://www.moonthemes.com">MoonThemes.com</a></div>
		</form>
		</fieldset>
		</div>
<?php
	}

/**********************************************************************/
/*
/*	class WP_Control_Panel
/*	ends here
/*
/**********************************************************************/

$options = array(
					array(	"name" => "Theme Layout",
							"type" => "title"),
					array(	"name" => "Color Scheme",
							"desc" => "Select a color scheme for your blog here.",
							"id" => "theme_scheme",
							"type" => "select",
							"options" => array("Default", "Black Style"),
							"std" => "default"),
					array(	"name" => "Theme Layout",
							"desc" => "Select the theme layout for your blog here.",
							"id" => "theme_layout",
							"type" => "select",
							"options" => array("Homepage 1", "Homepage 2", "Portfolio 1", "Portfolio 2","Blog 1", "Blog 2"),
							"std" => "Homepage"),
					array(	"name" => "Logo Image",
							"desc" => "Enter the full URL of your custom logo image here. Note: recommended logo height is 164px, to avoid padding space problem. Check theme doc if you have big logo. ",
							"id" => "logo_image",
							"type" => "text",
							"std" => ""),
				    array(	"name" => "Background Image",
							"desc" => "Enter the full URL of website's background image here.",
							"id" => "body_image",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Homepages Slider Settings",
							"type" => "title"),
					array(	"name" => "Category for Slider",
							"desc" => "Select a category for Homepages Slider Images",
							"id" => "featured_cat",
							"type" => "selectcat",
							"std" => "-1"),
					array(	"name" => "Number of posts",
							"desc" => "Enter any number of post images you want in homepages slider gallery, you must at least have 2 posts.",
							"id" => "featured_posts_countr",
							"type" => "text",
							"std" => ""),	
                    array(	"name" => "Disable Sliding Gallery on Homepages",
							"desc" => "Check this box if you want to disable Sliding Gallery on Homepages Layout.",
							"id" => "disable_featured_contenth",
							"type" => "checkbox",
							"std" => ""),				
					array(	"name" => "Homepage 1 and Homepage 2 Middle Section Settings",
							"type" => "title"),		
					array(	"name" => "Featured Posts Text",
							"desc" => "Enter the featured post heading text for the hompage here",
					        "id"   => "fth",
							"type" => "textarea",
							"std" =>  "Featured Posts"),
					array(	"name" => "Featured Posts Small Text",
							"desc" => "Enter the featured post small text for the hompage here",
					        "id"   => "fths",
							"type" => "textarea",
							"std" =>  "Hey man, relax and browse all elegant great features with many nice options"),			
					array(	"name" => "Featured Posts",
							"desc" => "Select a category for featured posts ( which is in the middle section ) on your homepage.",
							"id" => "category_1",
							"type" => "selectcat",
							"std" => "-1"),
					array(	"name" => "Disable Featured Posts on Homepage",
							"desc" => "Check this box if you want to disable featured posts, which is on Homepage middle section.",
							"id" => "disable_featuredpost",
							"type" => "checkbox",
							"std" => ""),		
					array(	"name" => "Website Heading Text",
							"desc" => "Enter the website description heading text for the hompage here",
					        "id"   => "fthwh",
							"type" => "textarea",
							"std" =>  "Website of Company, Its so Nice!"),		
                    array(	"name" => "Website Description",
							"desc" => "Enter the website description text for the hompage here",
					        "id"   => "fthws",
							"type" => "textarea",
							"std" =>  "Enter the website description text here, go to elegant theme control panel to do so."),	
                    array(	"name" => "Disable Website Description text",
							"desc" => "Check this box if you want to disable website description text, which is below featured posts section on Homepage Layout.",
							"id" => "disable_webi",
							"type" => "checkbox",
							"std" => ""),		
                    array(	"name" => "Blog Posts setting on Homepage 1",
							"type" => "title"),	
                    array(	"name" => "Set Number of Posts",
							"desc" => "Enter any number of blog posts you want in homepage.",
					        "id"   => "full_blog_post_count",
							"type" => "text",
							"std" =>  "0"),								
					array(	"name" => "Advertisements ( Sidebar Section )",
							"type" => "title"),
					array(	"name" => "Disable Advertisements on Homepages",
							"desc" => "Check this box if you want to disable advertisements on homepages.",
							"id" => "ads_disable",
							"type" => "checkbox",
							"std" => ""),
					array(	"name" => "Top Left Ad Image URL",
							"desc" => "Enter the full URL for the top left ad image here.",
							"id" => "top_left_ad",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Top Left Ad Link",
							"desc" => "Enter the full URL where top left ad links to, you must include 'http://' for example: http://www.google.com",
							"id" => "top_left_ad_link",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Top Right Ad Image URL",
							"desc" => "Enter the full URL for the top right ad image here.",
							"id" => "top_right_ad",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Top Right Ad Link",
							"desc" => "Enter the full URL where top right ad links to, you must include 'http://' for example: http://www.google.com.",
							"id" => "top_right_ad_link",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Bottom Left Ad Image URL",
							"desc" => "Enter the full URL for the bottom left ad image here.",
							"id" => "bottom_left_ad",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Bottom Left Ad Link",
							"desc" => "Enter the full URL where bottom left ad links to, you must include 'http://' for example: http://www.google.com",
							"id" => "bottom_left_ad_link",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Bottom Right Ad Image URL",
							"desc" => "Enter the full URL for the bottom right ad image here.",
							"id" => "bottom_right_ad",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Bottom Right Ad Link",
							"desc" => "Enter the full URL where bottom right ad links to, you must include 'http://' for example: http://www.google.com",
							"id" => "bottom_right_ad_link",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Disable Advertisements on Blog Pages",
							"desc" => "Check this box if you want to disable advertisements on blog pages.",
							"id" => "doig",
							"type" => "checkbox",
							"std" => ""),			
					array(	"name" => "Portfolio 1 and Portfolio 2 Settings",
							"type" => "title"),			
					array(	"name" => "Portfolio Category",
							"desc" => "Select a category for the portfolio page. (same setting will be apply for both 'portfolio 1 and portfolio 2'",
							"id" => "category_20",
							"type" => "selectcat",
							"std" => "-1"),		
                    array(	"name" => "Number of posts",
							"desc" => "Enter any number of posts you wish to have in portfolio page.",
							"id" => "featured_posts_count",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Heading Text for Portfolio 1 Page",
							"desc" => "Enter a heading text for portfolio 1 page",
					        "id"   => "frti",
							"type" => "textarea",
							"std" =>  "Portfolio 3 Columns"),
                    array(	"name" => "Heading Text for Portfolio 2 Page",
							"desc" => "Enter a heading text for portfolio 2 page",
					        "id"   => "frte",
							"type" => "textarea",
							"std" =>  "Portfolio 1 Columns"),								
                    array(	"name" => "Settings for Blog 1 and Blog 2 Pages",
							"type" => "title"),	
					array(	"name" => "Heading Text for Blog 1 Page",
							"desc" => "Enter a heading text for blog 1 page",
					        "id"   => "blgi",
							"type" => "textarea",
							"std" =>  "The Blog"),	
                    array(	"name" => "Heading Text for Blog 2 Page",
							"desc" => "Enter a heading text for blog 2 page",
					        "id"   => "blge",
							"type" => "textarea",
							"std" =>  "The Blog"),								
					array(	"name" => "Set Number of Posts",
							"desc" => "Enter any number of posts you wish to have in a blog page.",
					        "id"   => "blog_post_count",
							"type" => "text",
							"std" =>  "0"),			
                    array(	"name" => "Footer Settings",
							"type" => "title"),	
				    array(	"name" => "Disable Footer Widgets Section",
							"desc" => "Check this box if you want to disable Footer widgets section.",
							"id" => "disable_foti",
							"type" => "checkbox",
							"std" => ""),	
                    		array(	"name" => "Footer Text",
							"desc" => "Enter footer copyright text or links",
					        "id"   => "ftrcrt",
							"type" => "textarea",
							"std" =>  "Copyright 2010")						
				
				);

define("SHORT_NAME", "eye_gaze_");

WP_Control_Panel($options, "Elegant", SHORT_NAME);

add_page();




if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Home-Sidebar-Widgets',
'before_widget' => '<div class="side-cats"><div class="sider-22">',
'after_widget' => '</div></div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Widgets-for-Blog1-and-All-Pages',
'before_widget' => '<div class="side-cats2"><div class="sider-22">',
'after_widget' => '</div></div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Blog-2-Sidebar-Widgets',
'before_widget' => '<div class="side-cats2"><div class="sider-22">',
'after_widget' => '</div></div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Footer-Widgets',
        'before_widget' => '<div class="footer-kuch">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

/**********************Meta Box Starts Here*******************************/

	$new_meta_boxes = array("image" => array("name" => "Image", "std" => "", "title" => "Thumbnail",
											"description" => "To add a thumbnail to the post, paste the complete URL of the image above.")
							);


function new_meta_boxes() {
	global $post, $new_meta_boxes;
	
	foreach($new_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
		
		if ($meta_box_value == "")
			$meta_box_value = $meta_box['std'];
		
		echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
		echo '<h2>' . $meta_box['title'] . '</h2>';
		echo '<input type="text" name="' . $meta_box['name'] . '" value="' . $meta_box_value . '" size="55" /><br />';
		echo '<p><label for="' . $meta_box['name'] . '">' . $meta_box['description'] . '</label></p>';
		}
}

function create_meta_box() {
	if (function_exists('add_meta_box'))  {
		add_meta_box('new-meta-boxes', 'Eelegant Theme Post Thumbnail Settings', 'new_meta_boxes', 'post', 'normal', 'high');
	}
}

function print_emp_feat($cat_id) {
	
	if ($cat_id < 0) {
?>
	<div class="ftbox">
		<div class="title"></div>
		<div class="fpostbox">
			<div class="fpost-content">
				<div class="fpost-title"><a href="" rel="bookmark" title="No category selected">No category selected</a></div>
			</div>
		</div>
	</div>
<?php
	}
	else {
?>
	<div class="ftbox">
		<div class="title"></div>
		<div class="fpostbox">
			<div class="fpost-content">
				<div class="fpost-title"><a href="<?php echo get_category_link($cat_id); ?>" rel="bookmark" title="Permanent Link to ">No posts in <?php echo get_cat_name($cat_id); ?> category</a></div>
			</div>
		</div>
	</div>
<?php
	}
}

register_nav_menus( array(
        'primary' => __( 'Primary Navigation'),
                
    ) );
// remove menu container div
function my_wp_nav_menu_args( $args = '' )
{
    $args['container'] = false;
    return $args;
} // function
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );



function the_more_button() {
	$theme_scheme = get_option(SHORT_NAME . 'theme_scheme');
	$theme_dir = get_bloginfo("stylesheet_directory");
	
	if ($theme_scheme == 'Snowy') {
		echo $theme_dir . '/styles/snowy/morerr2.gif';
	}
	else if ($theme_scheme == 'Cool Grey') {
		echo $theme_dir . '/styles/cool-grey/morerr2.gif';
	}
	else if ($theme_scheme == 'Dark Blue') {
		echo $theme_dir . '/styles/dark-blue/morerr2.gif';
	}
	else if ($theme_scheme == 'Ice Blue') {
		echo $theme_dir . '/styles/ice-blue/morerr2.gif';
	}
	else {
		echo $theme_dir . '/styles/default/morerr2.gif';
	}
}

function the_subscribe_heading() {
	$heading = get_option(SHORT_NAME . 'subscribe_heading');
	echo $heading;
}

function the_subscribe_text() {
	$text = get_option(SHORT_NAME . 'subscribe_text');
	echo $text;
}

function print_emp_cat($cat_num, $cat_id) {
	
	if ($cat_id < 0) {
?>
		<div class="cat<?php echo $cat_num; ?>-box">
			<div class="cat<?php echo $cat_num; ?>-head">
				<div class="cat<?php echo $cat_num; ?>-head-title"><a href="" title="No category seleced" rel="category">No category selected</a></div>
			</div>
			
			<div class="cat<?php echo $cat_num; ?>-content">
			</div>
		</div>
<?php
	}
	else {
?>
		<div class="cat<?php echo $cat_num; ?>-box">
			<div class="cat<?php echo $cat_num; ?>-head">
				<div class="cat<?php echo $cat_num; ?>-head-title"><a href="<?php echo get_category_link($cat_id); ?>" title="View all posts in " rel="category">No posts in <?php echo get_cat_name($cat_id); ?> category</a></div>
			</div>
			
			<div class="cat<?php echo $cat_num; ?>-content">
			</div>
		</div>
<?php
	}
}

function the_logo() {
	$logo_image = get_option(SHORT_NAME . 'logo_image');
	$logo_image = trim($logo_image);	
	
	$logo_height = get_option(SHORT_NAME . 'logo_height');
	$logo_width = get_option(SHORT_NAME . 'logo_width');
	
	$height_max = false;
	$width_max = false;
	
	define('MAX_WIDTH', 639);
	define('MAX_HEIGHT', 599);
	
	if ($logo_image != "") {
		$user_resize_height = false;
		$user_resize_width = false;
		
		if (! empty($logo_height)) {
			$user_resize_height = true;
		}
		
		if (! empty($logo_width)) {
			$user_resize_width = true;
		}
		
		if ($user_resize_width == true || $user_resize_height == true) {
			
			if ($logo_height > MAX_HEIGHT) {
				$logo_height = MAX_HEIGHT;
			}
			
			if ($logo_width > MAX_WIDTH) {
				$logo_width = MAX_WIDTH;
			}
		}
		
		$size = getimagesize($logo_image);
		
		if ($user_resize_width != true) {
			if ($size[0] > MAX_WIDTH) {
				$logo_width = MAX_WIDTH;
			}
			else {
				$logo_width = $size[0];
			}
		}
		
		if ($user_resize_height != true) {
			if ($size[1] > MAX_HEIGHT) {
				$logo_height = MAX_HEIGHT;
			}
			else {
				$logo_height = $size[1];
			}
		}
		
		echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('template_directory') . '/phpThumb/phpThumb.php?src=' . $logo_image . '&h=' . $logo_height . '&w=' . $logo_width . '&zc=1&q=100" border="0" /></a></div>';
	}
	else {		
		$theme_scheme = get_option(SHORT_NAME . 'theme_scheme');
			
		if ($theme_scheme == 'Black Style') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/css/black/images/logo2.jpg"' . ' border="0" alt="logo" /></a></div>';
		}
		else if ($theme_scheme == 'Books Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/BooksGaze/books/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Business Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/BusinessGaze/business/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Cars Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/CarsGaze/cars/logo.jpg"' . ' border="0" alt="logo" /></a></div>';	
		}
		else if ($theme_scheme == 'Gold Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/GoldGaze/gold/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Health Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/HealthGaze/health/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Paint Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/PaintGaze/paint/logo.jpg"' . ' border="0" alt="logo" /></a></div>';	
		}
		else if ($theme_scheme == 'Rose Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/RoseGaze/rose/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Street Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/StreetGaze/street/logo.jpg"' . ' border="0" alt="logo" /></a></div>';	
		}
		else {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/images/logo2.jpg"' . ' border="0" alt="logo" /></a></div>';	
		}
	}
}

function save_postdata($post_id) {
	global $post, $new_meta_boxes;
	
	foreach($new_meta_boxes as $meta_box) {
		// Verify input
		if (! wp_verify_nonce($_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__))) {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type']) {
			if (! current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		}
		else {
			if (! current_user_can('edit_post', $post_id)) {
				return $post_id;
			}
		}
		$data = $_POST[$meta_box['name']];
		
		if (get_post_meta($post_id, $meta_box['name']) == "") {
			add_post_meta($post_id, $meta_box['name'], $data, true);
		}
		elseif ($data != get_post_meta($post_id, $meta_box['name'], true)) {
			update_post_meta($post_id, $meta_box['name'], $data);
		}
		elseif ($data == "") {
			delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
		}
	}
}
	add_action('admin_menu', 'create_meta_box');
	add_action('save_post', 'save_postdata');
	
/**********************Meta Box Ends Here*******************************/

?>