		<?php if (have_posts()) : $postCount = 0; $sticky = 0;?>
		<?php while(have_posts()) : the_post(); $postCount++; ?>
		<?php if(is_home()) : ?>
		<?php if (is_sticky() ) {
			$sticky++;
			echo '<h6 class="content-subhead">'.__('Sticky Posts', 'purecss').'</h6>';
		 } elseif( ($sticky!=0 && $postCount == $sticky+1) || ($sticky==0 && $postCount==1)) {
			echo '<h6 class="content-subhead">'.__('Recent Posts', 'purecss').'</h6>';
		}
		//echo $postCount;
		?>
	<?php endif; ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
			<header class="post-header">
				<h2 class="post-title" itemprop="headline">
				<?php if(get_theme_mod('display_avatar', true)) { 
					echo get_avatar( get_the_author_meta( 'ID' ), 48); 
				} ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				<?php pure_post_meta(); ?>
			</header>
			<div class="post-body" itemprop="articleBody">
				<?php pure_post_thumbnail(); ?>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</article>
		<?php endwhile; endif; ?>
