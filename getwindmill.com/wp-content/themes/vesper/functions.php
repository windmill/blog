<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

remove_action('wp_head', 'pagenavi_css');
	
function wp_the_excerpt_reloaded($args='') {
	parse_str($args);
	if(!isset($excerpt_length)) $excerpt_length = 120; // length of excerpt in words. -1 to display all excerpt/content
	if(!isset($allowedtags)) $allowedtags = '<a>'; // HTML tags allowed in excerpt, 'all' to allow all tags.
	if(!isset($filter_type)) $filter_type = 'none'; // format filter used => 'content', 'excerpt', 'content_rss', 'excerpt_rss', 'none'
	if(!isset($use_more_link)) $use_more_link = 1; // display
	if(!isset($more_link_text)) $more_link_text = "(more...)";
	if(!isset($force_more)) $force_more = 1;
	if(!isset($fakeit)) $fakeit = 1;
	if(!isset($fix_tags)) $fix_tags = 1;
	if(!isset($no_more)) $no_more = 0;
	if(!isset($more_tag)) $more_tag = 'div';
	if(!isset($more_link_title)) $more_link_title = 'Continue reading this entry';
	if(!isset($showdots)) $showdots = 1;

	return the_excerpt_reloaded($excerpt_length, $allowedtags, $filter_type, $use_more_link, $more_link_text, $force_more, $fakeit, $fix_tags, $no_more, $more_tag, $more_link_title, $showdots);
}

function the_excerpt_reloaded($excerpt_length=120, $allowedtags='<a>', $filter_type='none', $use_more_link=true, $more_link_text="(more...)", $force_more=true, $fakeit=1, $fix_tags=true, $no_more=false, $more_tag='div', $more_link_title='Continue reading this entry', $showdots=true) {
	if(preg_match('%^content($|_rss)|^excerpt($|_rss)%', $filter_type)) {
		$filter_type = 'the_' . $filter_type;
	}
	echo get_the_excerpt_reloaded($excerpt_length, $allowedtags, $filter_type, $use_more_link, $more_link_text, $force_more, $fakeit, $no_more, $more_tag, $more_link_title, $showdots);
}

function get_the_excerpt_reloaded($excerpt_length, $allowedtags, $filter_type, $use_more_link, $more_link_text, $force_more, $fakeit, $no_more, $more_tag, $more_link_title, $showdots) {
	global $post;

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) { // and it doesn't match cookie
			if(is_feed()) { // if this runs in a feed
				$output = __('There is no excerpt because this is a protected post.');
			} else {
	            $output = get_the_password_form();
			}
		}
		return $output;
	}

	if($fakeit == 2) { // force content as excerpt
		$text = $post->post_content;
	} elseif($fakeit == 1) { // content as excerpt, if no excerpt
		$text = (empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
	} else { // excerpt no matter what
		$text = $post->post_excerpt;
	}

	if($excerpt_length < 0) {
		$output = $text;
	} else {
		if(!$no_more && strpos($text, '<!--more-->')) {
		    $text = explode('<!--more-->', $text, 2);
			$l = count($text[0]);
			$more_link = 1;
		} else {
			$text = explode(' ', $text);
			if(count($text) > $excerpt_length) {
				$l = $excerpt_length;
				$ellipsis = 1;
			} else {
				$l = count($text);
				$more_link_text = '';
				$ellipsis = 0;
			}
		}
		for ($i=0; $i<$l; $i++)
				$output .= $text[$i] . ' ';
	}

	if('all' != $allowed_tags) {
		$output = strip_tags($output, $allowedtags);
	}

//	$output = str_replace(array("\r\n", "\r", "\n", "  "), " ", $output);

	$output = rtrim($output, "\s\n\t\r\0\x0B");
	$output = ($fix_tags) ? $output : balanceTags($output);
	$output .= ($showdots && $ellipsis) ? '...' : '';

	switch($more_tag) {
		case('div') :
			$tag = 'div';
		break;
		case('span') :
			$tag = 'span';
		break;
		case('p') :
			$tag = 'p';
		break;
		default :
			$tag = 'span';
	}

	if ($use_more_link && $more_link_text) {
		if($force_more) {
			$output .= ' <span class="more-link"><a href="'. get_permalink($post->ID) . '#more-' . $post->ID .'" title="' . $more_link_title . '">' . $more_link_text . '</a></span>' . "\n";
		} else {
			$output .= ' <span class="more-link"><a href="'. get_permalink($post->ID) . '" title="' . $more_link_title . '">' . $more_link_text . '</a></span>' . "\n";
		}
	}
	$output = apply_filters($filter_type, $output);
	return $output;
}

?>
