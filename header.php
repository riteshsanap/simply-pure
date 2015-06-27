<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="master-head" class="pure-g">
<div id="content" class="wrapper content pure-u-1 pure-u-md-3-4 pure-u-lg-18-24">
<?php $purehead = get_theme_mod('header_position', 'content-top-home');  ?>
<?php if( ( $purehead == 'content-top-home' && is_home() ) || ( $purehead !='sidebar-top' && $purehead =='content-top' || $purehead == 'both' ) ) : ?>
<div class="header">
	<?php if(!is_home()) : ?>
	    <h1>
	    <a href="<?php echo home_url(); ?>"><?php bloginfo('title'); ?></a>
	    </h1>
	    <?php else : ?>
	    <h1><?php bloginfo('title'); ?></h1>	
	    <?php endif; ?>
	    <h2><?php bloginfo('description'); ?></h2> 
</div>
<?php endif; ?>