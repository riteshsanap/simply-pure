<?php get_header(); ?>
	<div id="primary">
		<?php if (have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-header">
				<h1 class="post-title">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 48); ?>
					<?php the_title(); ?>
				</h1>
				<?php simply_pure_post_meta(); ?>
			</div>
			<div class="post-body">
				<?php simply_pure_post_thumbnail(); ?>
				<?php the_content(); ?>
				<div class="navigation">
				<?php wp_link_pages(array('next_or_number'=>'next', 'previouspagelink' => __(' &laquo; Previous Page', 'simply-pure'), 'nextpagelink'=> __('Next Page &raquo;', 'simply-pure'))); ?>
				</div>
				
			</div>
			<div class="post-footer">
				<div class="post-tags" itemprop="keywords">
				<?php the_tags(); ?>	
				</div>
			<?php get_template_part('post-footer'); ?>
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