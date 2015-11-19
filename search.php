<?php get_header(); ?>
	<main id="primary" itemscope="itemscope" itemtype="http://schema.org/Blog" itemprop="mainContentOfPage" role="main">
		<h1 class="content-subhead">
			<?php echo __('Search results for: ', 'simply-pure'). get_search_query(); ?>
		</h1>
		<?php if(!$wp_query->found_posts) : ?>
			<h3><?php _e('There are no content with this search keyword.');?></h3>
			<ul class="list404">
				<li><?php _e('Try using a different search keyword:');?>
					<?php get_template_part('searchform'); ?>
				</li>
				<li>
					<?php echo sprintf(__('Try Visiting the <a href="%1$s">Home Page</a>', 'simply-pure'),  esc_url(home_url()));?>
				</li>
				<li>
					<?php _e('Or, Take a look at the Recent posts:'); ?>
					<ul>
					<?php
							$recent_posts = wp_get_recent_posts();
							foreach( $recent_posts as $recent ){
								echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
							}
					?>
					</ul>
				</li>
			</ul>
		<?php endif; ?>
		<?php get_template_part('content-loop'); ?>
		<?php get_template_part('pagination'); ?>
	</main>
<div class="clearfix"></div>
<?php get_footer(); ?>