<?php 

load_theme_textdomain('purecss', get_template_directory() . '/languages');
/************************************************************************************/
/*	Add Theme Support	*/		
/************************************************************************************/		
/**
 * For more information on add_theme_support visit 
 * http://codex.wordpress.org/Function_Reference/add_theme_support
 */
function simply_pure_theme_install() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( "custom-header", array('flex-height'=>true,'flex-width'=>true,));
	add_theme_support( "custom-background", array('default-color'=>'ffffff') );
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	// setting  $content_width to avoid overflow of videos and images added by wordpress media gallery
	if ( ! isset( $content_width ) ) $content_width = 900;
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
			'primary'   => __( 'Primary menu', 'purecss' ),
	) );
}
add_action( 'after_setup_theme', 'simply_pure_theme_install' );


/**
 * Register Widget Sidebars
 *
 * @version 1.0
 * @since   Simply Pure 1.0
 * @author Ritesh Sanap <riteshsanap@gmail.com>
 *
 */
function pure_sidebar_widgets() {
	register_sidebars(3, array(
        'name' => __('Footer - Widget Area %1$s', 'purecss'),
        'description' => __('Footer Sidebar', 'purecss'),
        'id' => 'footer-area',
        'before_widget' => '<div id="%1$s" class="%2$s widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

register_sidebars(3, array(
        'name' => __('Post Footer - Widget Area %1$s', 'purecss'),
        'description' => __('Footer Sidebar', 'purecss'),
        'id' => 'post-footer',
        'before_widget' => '<div id="%1$s" class="%2$s widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
register_sidebar(array(
        'name' => __('Sidebar', 'purecss'),
        'description' => __('Below Header', 'purecss'),
        'id' => 'sidebar-area',
        'before_widget' => '<section id="%1$s" class="%2$s widget">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

}
add_action('widgets_init', 'pure_sidebar_widgets');
/**
 * Add Stylesheet and scripts
 *
 * @version 1.0
 * @since   Simply Pure 1.0
 * @author Ritesh Sanap <riteshsanap@gmail.com>
 *
 */
function purecss_scripts_styles() {
	/**
	 * Enqueue StyleSheet
	 */
	wp_enqueue_style( 'purecss-style', get_stylesheet_uri(), array(), '0.3');

	/**
	 * Add JavaScript to animate Sidebar, when the sidebar is active i.e. atleast has 1 widget
	 */
	if(is_active_sidebar('sidebar-area')) {
		/**
		 * The Below script should be added in the footer so $in_footer is set to true
		 */
		wp_enqueue_script('purecss-script', get_template_directory_uri(). '/script.js', array(), '0.1', true);
	}
}
add_action( 'wp_enqueue_scripts', 'purecss_scripts_styles' );

function pure_author_link() {

	$authId = get_the_author_meta('ID');
	$niceName = get_the_author_meta('user_nicename');

	$link = sprintf('<a href="%1$s" title="%2$s" rel="author" itemprop="url"><span itemprop="name">%3$s</span></a>',
		esc_url( get_author_posts_url($authId, $niceName) ),
		esc_attr( sprintf( __( 'Posts by %s', 'purecss' ), get_the_author() ) ),
		get_the_author()
	);
	$link = _x('Published by','author of a post','purecss').' <span class="entry-author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">'. $link. '</span>';
	return $link;
}
function pure_post_time() {
	$time = _x('on','Publication date','purecss').' <time itemprop="datePublished" datetime="'. get_the_time('c').'">'. get_the_time(__('F j, Y', 'purecss')) . '</time>';
	return $time;
}

/**
 * Post Meta
 *
 * @version 1.0
 * @since   Simply Pure 1.0
 * @author Ritesh Sanap <riteshsanap@gmail.com>
 *
 * @return  string Simple HTML string
 */
function pure_post_meta() {
	echo '<p class="post-meta">';
	echo sprintf( _x('%1$s %2$s %3$s','Meta informations order', 'purecss'), pure_author_link(), pure_categories(), pure_post_time());
	edit_post_link(__('Edit','purecss'), ' - ');
	echo '</p>';
}

/**
 * Post Thumbnail
 *
 * @version 1.0
 * @since   Simply Pure 1.0
 * @author Ritesh Sanap <riteshsanap@gmail.com>
 *
 * @return  string 
 */
function pure_post_thumbnail() {
	// Check if the post has the thumbnail
	// && if it is blank or not
	if(has_post_thumbnail() && '' != get_the_post_thumbnail()) {
		echo '<div class="post-thumbnail">';
		the_post_thumbnail();
		echo '</div>';
	}
}

/**
 * Random colored categories by addming random CSS classes from an array.
 *
 * @version 1.0
 * @since   Simply Pure 1.0
 * @author Ritesh Sanap <riteshsanap@gmail.com>
 * 
 * @return  string Output echo'ed
 */
function pure_categories() {
	// get post categories
	$categories = get_the_category();

	// define CSS classes with different colors
	$colors = array('', 'post-green','post-blue','post-purple','post-red','post-yellow');
	$separator = ' '; // used for adding seperator in the categories
	$output = '';

	if($categories){ 
		foreach($categories as $category) {
			$color = array_rand($colors, 1); // call One random value from the array
			$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf(__('View all posts in %s','purecss'), $category->name ) ) . '" class="post-category '.$colors[$color].'">'.$category->cat_name.'</a>'.$separator;
		}
		$output = _x('Under','Before categories','purecss').'<span itemprop="keywords">'. $output. '</span>';
	return (trim($output, $separator));
	}

}

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @version 1.0
 * @since Simply Pure 1.0
 * @author Ritesh Sanap <riteshsanap@gmail.com>
 * 
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */

function purecss_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'purecss' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'purecss_wp_title', 10, 2 );
/**
 * Counts the number of sidebars with atleast a Single Widget
 * for more information visit : 
 * http://codex.wordpress.org/Function_Reference/is_active_sidebar
 *
 * @version 1.0
 * @since   Simply Pure 1.0
 * @author Ritesh Sanap <riteshsanap@gmail.com>
 *
 * @param   Array   $sidebars the List of sidebars that are active
 * @return  integer
 */
function pure_sidebar_active_count($sidebars) {
	$count = 0;
	foreach ($sidebars as $sidebar) {
		if(is_active_sidebar($sidebar)) {
			$count++;
		}
	}
	return $count;
}
/**
 * Class output for Footer and Post Footer widgets
 *
 * @version 1.0
 * @since   Simply Pure 1.0
 * @author Ritesh Sanap <riteshsanap@gmail.com>
 *
 * @param   string   $position
 * @return  string
 */
function pure_sidebars_class($position) {
	$sidebars = array();
	if($position == 'post-footer') {
		$sidebars = array('post-footer','post-footer-2','post-footer-3');
	} else {
		$sidebars = array('footer-area', 'footer-area-2', 'footer-area-3');
	}

	$class = 'pure-u-1';
	$class .= ' pure-u-sm-1-'. pure_sidebar_active_count($sidebars);
	return $class;
}
function pure_body_classes($classes) {
	if(get_theme_mod('sidebar_position') != 'right') {
		$classes[] = 'sidebar-left';
	}
	if(!is_active_sidebar('sidebar-area')) {
		$classes[] = 'header-full';
	} else {
		$classes[] = 'header-half';
	}

	if(!get_theme_mod('display_avatar', true)) {
		$classes[] = 'post-title-no-avatar';
	}
	return $classes;
}
add_filter( 'body_class', 'pure_body_classes' );
require get_template_directory(). '/customizer.php';

function purecss_archive_title() {
	$title = NULL;
	if(is_archive()) {
		$title = __('Archive: ','purecss'). single_month_title(' ', false);
	}
	if(is_category()) {
		  $title = __('Category: ','purecss'). single_cat_title('', false);
	}
	if(is_tag()) {
		 $title = __('Tag: ','purecss'). single_tag_title('', false);
	}
	if(is_author()) {
		$title = __('Author: ','purecss'). get_the_author();
	}

	return $title;
}
