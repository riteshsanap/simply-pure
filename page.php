<?php get_header(); ?>
	<div id="primary">
		<?php if (have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-header">
				<h1 class="post-title">
					<?php the_title(); ?>
				</h1>
				<?php pure_post_meta(); ?>
			</div>
			<div class="post-body">
				<?php pure_post_thumbnail(); ?>
				<?php the_content(); ?>
				<div class="navigation">
				<?php wp_link_pages(array('next_or_number'=>'next', 'previouspagelink' => ' &laquo; '.__('Previous Page','purecss'), 'nextpagelink'=>__('Next Page','purecss').' &raquo;')); ?>
				</div>

			</div>
			<div class="post-footer">
			<?php get_template_part('post-footer'); ?>
				<div class="post-tags post-meta" itemprop="keywords">
				<?php the_tags(); ?>	
				</div>
			</div>
			<div class="navigation">
			<div class="alignleft">
					<?php previous_post_link(); ?>
			</div>    
			<div class="alignright">
				<?php next_post_link(); ?>
			</div>	
			</div> <!-- end .Navigation -->
		</article>
		<div class="clearfix"></div>
		<?php comments_template(); ?> 
		<?php endwhile; endif; ?>
	</div>
<div class="clearfix"></div>
<?php get_footer(); ?>
