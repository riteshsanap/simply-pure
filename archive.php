<?php get_header(); ?>
	<main id="primary" itemscope="itemscope" itemtype="http://schema.org/Blog" itemprop="mainContentOfPage" role="main">
		<h1 class="content-subhead">
			<?php echo simply_pure_archive_title(); ?>
		</h1>
		<?php get_template_part('content-loop'); ?>
		<?php get_template_part('pagination'); ?>
	</main>
<div class="clearfix"></div>
<?php get_footer(); ?>