<?php get_header(); ?>
	<main id="primary" itemscope="itemscope" itemtype="http://schema.org/Blog" itemprop="mainContentOfPage" role="main">
		<?php get_template_part('content-loop'); ?>
		<?php get_template_part('pagination.php'); ?>
	</main>
<div class="clearfix"></div>
<?php get_footer(); ?>