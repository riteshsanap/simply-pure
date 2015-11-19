<?php get_header(); ?>
	<main id="primary" itemscope="itemscope" itemtype="http://schema.org/Blog" itemprop="mainContentOfPage" role="main" class="padder404">
		<h1 class="content-subhead">
			<?php _e('404 - Page not Found', 'simply-pure'); ?>
		</h1>
		<h3><?php _e('The page you are looking for could not be found. Try the following Options:', 'simply-pure'); ?></h3>
		
		<ul class="list404">
			<li><?php _e('Check the URL for any mistakes.', 'simply-pure'); ?></li>
			<li><?php echo sprintf(__('Try Visiting the <a href="%1$s">Home Page</a>', 'simply-pure'),  esc_url(home_url()));?></li>
			<li><?php _e('Or Try searching for the Page :', 'simply-pure'); ?>
			<?php get_template_part('searchform'); ?>
			</li>
		</ul>
		
		</main>
<div class="clearfix"></div>
<?php get_footer(); ?>