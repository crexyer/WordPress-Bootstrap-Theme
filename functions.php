<?php
function bootstrap_setup() {
	// Load language
	load_theme_textdomain ( 'Bootstrap', get_template_directory () . '/languages' );
	
	if (function_exists ( 'register_nav_menu' )) {
		register_nav_menu ( 'primary', __ ( 'Navigation Menu', 'Bootstrap' ) );
	}
}
add_action ( 'after_setup_theme', 'bootstrap_setup' );
function bootstrap_widgets_init() {
	if (function_exists ( 'register_sidebar' )) {
		register_sidebar ( array (
				'before_widget' => '<div class="widget-panel">',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				'after_widget' => '</div>' 
		) );
	}
}

add_action ( 'widgets_init', 'bootstrap_widgets_init' );
class Walker_Nav_Bootstrap extends Walker_Nav_Menu {
	var $tree_type = array (
			'post_type',
			'taxonomy',
			'custom' 
	);
	var $db_fields = array (
			'parent' => 'menu_item_parent',
			'id' => 'db_id' 
	);
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat ( "\t", $depth );
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$indent = ($depth) ? str_repeat ( "\t", $depth ) : '';
		
		if ($args->has_children) {
			$class_names = ' class="dropdown"';
		} else {
			$class_names = '';
		}
		$output .= $indent . '<li' . $class_names . '>';
		
		$atts = array ();
		$atts ['title'] = ! empty ( $item->attr_title ) ? $item->attr_title : '';
		$atts ['target'] = ! empty ( $item->target ) ? $item->target : '';
		$atts ['rel'] = ! empty ( $item->xfn ) ? $item->xfn : '';
		$atts ['href'] = ! empty ( $item->url ) ? $item->url : '';
		
		if ($args->has_children) {
			$atts ['class'] = 'dropdown-toggle';
			$atts ['data-toggle'] = 'dropdown';
		}
		
		$atts = apply_filters ( 'nav_menu_link_attributes', $atts, $item, $args );
		$attributes = '';
		
		foreach ( $atts as $attr => $value ) {
			if (! empty ( $value )) {
				$value = ('href' === $attr) ? esc_url ( $value ) : esc_attr ( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters ( 'the_title', $item->title, $item->ID ) . $args->link_after;
		
		if ($args->has_children) {
			$item_output .= ' <b class="caret"></b>';
		}
		
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$id_field = $this->db_fields ['id'];
		
		if (is_object ( $args [0] )) {
			$args [0]->has_children = ! empty ( $children_elements [$element->$id_field] );
		}
		
		return parent::display_element ( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}
function bootstrap_wp_title($title, $sep) {
	global $paged, $page;
	
	if (is_feed ())
		return $title;
		
		// Add the site name.
	$title .= get_bloginfo ( 'name' );
	
	// Add the site description for the home/front page.
	$site_description = get_bloginfo ( 'description', 'display' );
	if ($site_description && (is_home () || is_front_page ()))
		$title = "$title $sep $site_description";
		
		// Add a page number if necessary.
	if ($paged >= 2 || $page >= 2)
		$title = "$title $sep " . sprintf ( __ ( 'Page %s', 'Bootstrap' ), max ( $paged, $page ) );
	
	return $title;
}
add_filter ( 'wp_title', 'bootstrap_wp_title', 10, 2 );
function bootstrap_paginate_links_core($args = '') {
	$defaults = array (
			'base' => '%_%', // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
			'format' => '?page=%#%', // ?page=%#% : %#% is replaced by the page number
			'total' => 1,
			'current' => 0,
			'show_all' => false,
			'prev_next' => true,
			'prev_text' => __ ( 'Previous' ),
			'next_text' => __ ( 'Next' ),
			'end_size' => 1,
			'mid_size' => 2,
			'type' => 'plain',
			'add_args' => false, // array of query args to add
			'add_fragment' => '' 
	);
	
	$args = wp_parse_args ( $args, $defaults );
	extract ( $args, EXTR_SKIP );
	
	// Who knows what else people pass in $args
	$total = ( int ) $total;
	if ($total < 2)
		return;
	$current = ( int ) $current;
	$end_size = 0 < ( int ) $end_size ? ( int ) $end_size : 1; // Out of bounds? Make it the default.
	$mid_size = 0 <= ( int ) $mid_size ? ( int ) $mid_size : 2;
	$add_args = is_array ( $add_args ) ? $add_args : false;
	$r = '';
	$page_links = array ();
	$n = 0;
	$dots = false;
	
	if ($prev_next && $current && 1 < $current) :
		$link = str_replace ( '%_%', 2 == $current ? '' : $format, $base );
		$link = str_replace ( '%#%', $current - 1, $link );
		if ($add_args)
			$link = add_query_arg ( $add_args, $link );
		$link .= $add_fragment;
		$page_links [] = '<a class="btn btn-default prev" href="' . esc_url ( apply_filters ( 'paginate_links', $link ) ) . '">' . $prev_text . '</a>';
	
	
	
	
	
	endif;
	for($n = 1; $n <= $total; $n ++) :
		$n_display = number_format_i18n ( $n );
		if ($n == $current) :
			$page_links [] = '<a class="btn btn-default active">' . $n_display . '</a>';
			$dots = true;
		 else :
			if ($show_all || ($n <= $end_size || ($current && $n >= $current - $mid_size && $n <= $current + $mid_size) || $n > $total - $end_size)) :
				$link = str_replace ( '%_%', 1 == $n ? '' : $format, $base );
				$link = str_replace ( '%#%', $n, $link );
				if ($add_args)
					$link = add_query_arg ( $add_args, $link );
				$link .= $add_fragment;
				$page_links [] = '<a class="btn btn-default" href="' . esc_url ( apply_filters ( 'paginate_links', $link ) ) . '">' . $n_display . '</a>';
				$dots = true;
			 elseif ($dots && ! $show_all) :
				$page_links [] = '<a class="btn btn-default dots">&hellip;</a>';
				$dots = false;
			endif;
		endif;
	endfor
	;
	if ($prev_next && $current && ($current < $total || - 1 == $total)) :
		$link = str_replace ( '%_%', $format, $base );
		$link = str_replace ( '%#%', $current + 1, $link );
		if ($add_args)
			$link = add_query_arg ( $add_args, $link );
		$link .= $add_fragment;
		$page_links [] = '<a class="btn btn-default next" href="' . esc_url ( apply_filters ( 'paginate_links', $link ) ) . '">' . $next_text . '</a>';
	
	
	
	
	
	endif;
	switch ($type) :
		case 'array' :
			return $page_links;
			break;
		case 'list' :
			$r .= '<ul class="page-numbers">' . "\n\t" . '<li>';
			$r .= join ( "</li>\n\t<li>", $page_links );
			$r .= "</li>\n</ul>\n";
			break;
		default :
			$r = join ( "\n", $page_links );
			break;
	endswitch
	;
	return $r;
}
function bootstrap_paginate_links() {
	global $wp_query;
	
	$big = 999999999; // need an unlikely integer
	$output = bootstrap_paginate_links_core ( array (
			'base' => str_replace ( $big, '%#%', esc_url ( get_pagenum_link ( $big ) ) ),
			'format' => '',
			'current' => max ( 1, get_query_var ( 'paged' ) ),
			'total' => $wp_query->max_num_pages,
			'prev_text' => '<span class="glyphicon glyphicon-chevron-left"></span> ' . __ ( 'Previous', 'Bootstrap' ),
			'next_text' => __ ( 'Next', 'Bootstrap' ) . ' <span class="glyphicon glyphicon-chevron-right"></span>' 
	) );
	
	if ($output != "") {
		echo '<div class="btn-group paginate-nav-links">' . $output . '</div>';
	}
}
function bootstrap_link_pages_core($args = '') {
	$defaults = array (
			'before' => '<p>',
			'after' => '</p>',
			'link_before' => '',
			'link_after' => '',
			'next_or_number' => 'number',
			'separator' => ' ',
			'nextpagelink' => __ ( 'Next' ),
			'previouspagelink' => __ ( 'Previous' ),
			'pagelink' => '%',
			'echo' => 1 
	);
	
	$r = wp_parse_args ( $args, $defaults );
	$r = apply_filters ( 'wp_link_pages_args', $r );
	extract ( $r, EXTR_SKIP );
	
	global $page, $numpages, $multipage, $more;
	
	$output = '';
	if ($multipage) {
		if ('number' == $next_or_number) {
			$output .= $before;
			for($i = 1; $i <= $numpages; $i ++) {
				$link = $link_before . str_replace ( '%', $i, $pagelink ) . $link_after;
				if ($i != $page || ! $more && 1 == $page) {
					$link = bootstrap_link_page_helper ( $i ) . $link . '</a>';
				} else {
					$link = '<a class="btn btn-default active">' . $i . '</a>';
				}
				$link = apply_filters ( 'wp_link_pages_link', $link, $i );
				$output .= $separator . $link;
			}
			$output .= $after;
		} elseif ($more) {
			$output .= $before;
			$i = $page - 1;
			if ($i) {
				$link = bootstrap_link_page_helper ( $i ) . $link_before . $previouspagelink . $link_after . '</a>';
				$link = apply_filters ( 'wp_link_pages_link', $link, $i );
				$output .= $separator . $link;
			}
			$i = $page + 1;
			if ($i <= $numpages) {
				$link = bootstrap_link_page_helper ( $i ) . $link_before . $nextpagelink . $link_after . '</a>';
				$link = apply_filters ( 'wp_link_pages_link', $link, $i );
				$output .= $separator . $link;
			}
			$output .= $after;
		}
	}
	
	$output = apply_filters ( 'bootstrap_link_pages_core', $output, $args );
	
	if ($echo)
		echo $output;
	
	return $output;
}
function bootstrap_link_page_helper($i) {
	global $wp_rewrite;
	$post = get_post ();
	
	if (1 == $i) {
		$url = get_permalink ();
	} else {
		if ('' == get_option ( 'permalink_structure' ) || in_array ( $post->post_status, array (
				'draft',
				'pending' 
		) ))
			$url = add_query_arg ( 'page', $i, get_permalink () );
		elseif ('page' == get_option ( 'show_on_front' ) && get_option ( 'page_on_front' ) == $post->ID)
			$url = trailingslashit ( get_permalink () ) . user_trailingslashit ( "$wp_rewrite->pagination_base/" . $i, 'single_paged' );
		else
			$url = trailingslashit ( get_permalink () ) . user_trailingslashit ( $i, 'single_paged' );
	}
	
	return '<a class="btn btn-default" href="' . esc_url ( $url ) . '">';
}
function bootstrap_link_pages() {
	$output = bootstrap_link_pages_core ( array (
			'before' => '<div class="btn-group pages-nav-links"><a class="btn btn-default"><span class="glyphicon glyphicon-align-left"></span> ' . __ ( 'Page number', 'Bootstrap' ) . '</a>',
			'after' => '</div>',
			'separator' => '',
			'next_or_number' => 'number',
			'pagelink' => '%',
			'echo' => 0 
	) );
	if ($output != "") {
		echo $output;
	}
}
function bootstrap_category() {
	$categories = get_the_category ();
	$separator = ' ';
	$output = '';
	if ($categories) {
		foreach ( $categories as $category ) {
			$output .= '<a href="' . get_category_link ( $category->term_id ) . '" title="' . esc_attr ( sprintf ( __ ( "View all posts in %s" ), $category->name ) ) . '">' . $category->cat_name . '</a>' . $separator;
		}
		echo trim ( $output, $separator );
	}
}
function bootstrap_tags() {
	$tags = get_the_tags ();
	$separator = ' ';
	$output = '';
	if ($tags) {
		foreach ( $tags as $tag ) {
			$output .= '<a href="' . get_tag_link ( $tag->term_id ) . '" title="' . esc_attr ( sprintf ( __ ( "View all posts in %s" ), $tag->name ) ) . '">' . $tag->name . '</a>' . $separator;
		}
		echo trim ( $output, $separator );
	}
}
function bootstrap_shortcode_button($atts, $content = '') {
	$json = json_decode ( $content, true );
	$length = count ( $json );
	$output = '';
	if ($length == 0)
		return $output;
	if ($length != 1)
		$output .= '<div class="btn-group">';
	foreach ( $json as $key => $val ) {
		if ($key == '_icon') {
			$output .= '<a class="btn btn-default"><span class="' . $val . ' icon"</span></a>';
		} else {
			$output .= '<a class="btn btn-default" href="' . $val . '" target="_blank">' . $key . '</a>';
		}
	}
	if ($length != 1)
		$output .= '</div>';
	
	return $output;
}
add_shortcode ( "button", "bootstrap_shortcode_button" );
function bootstrap_paginate_comments_links_core($args = array()) {
	global $wp_rewrite;
	
	if (! is_singular () || ! get_option ( 'page_comments' ))
		return;
	
	$page = get_query_var ( 'cpage' );
	if (! $page)
		$page = 1;
	$max_page = get_comment_pages_count ();
	$defaults = array (
			'base' => add_query_arg ( 'cpage', '%#%' ),
			'format' => '',
			'total' => $max_page,
			'current' => $page,
			'echo' => true,
			'add_fragment' => '#comments' 
	);
	if ($wp_rewrite->using_permalinks ())
		$defaults ['base'] = user_trailingslashit ( trailingslashit ( get_permalink () ) . 'comment-page-%#%', 'commentpaged' );
	
	$args = wp_parse_args ( $args, $defaults );
	$page_links = bootstrap_paginate_links_core ( $args );
	
	if ($args ['echo'])
		echo $page_links;
	else
		return $page_links;
}
function bootstrap_paginate_comments_links() {
	$output = bootstrap_paginate_comments_links_core ( array (
			'echo' => false,
			'prev_text' => '<span class="glyphicon glyphicon-chevron-left"></span> ' . __ ( 'Previous', 'Bootstrap' ),
			'next_text' => __ ( 'Next', 'Bootstrap' ) . ' <span class="glyphicon glyphicon-chevron-right"></span>' 
	) );
	
	if ($output != "") {
		echo '<div class="btn-group comments-nav-links">' . $output . '</div>';
	}
}

remove_filter ( 'the_content', 'wptexturize' );
require_once (TEMPLATEPATH . '/control.php');
?>