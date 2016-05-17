<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?><?php if ( is_single() ) { ?>&raquo; Blog Archive<?php } ?><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="author" content="http://valendesigns.com">
<?php wp_head(); ?>

</head>
<body>
<div id="wrapper">
	<div id="header"><img style="top:0px;position:relative;left:61%;" src="http://www.t0asted.com/getwindmill/wm_logo_round.png">
    	<div id="site-meta">
  <h1 style="font-size:40px;"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>">
			<?php bloginfo('name'); ?></a></h1>
        	<span class="description"><center><?php bloginfo('description'); ?></center></span>
        </div>
  <?php include(TEMPLATEPATH . "/searchform.php"); ?>
		<!-- Menu Tabs -->
		<ul id="navigation">
		<!--<li <?php if (is_home()) { echo 'class="current_page_item"'; } ?>>
<a href="<?php echo get_option('home'); ?>">Home</a></li>-->
            <?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order'); ?>
<li><a href="http://github.com/windmill/windmill/blob/master/LICENSE.txt">License</a></li>
<li><a href="http://wiki.github.com/windmill/windmill/">Documentation</a></li>
		</ul>	
	</div>
    
