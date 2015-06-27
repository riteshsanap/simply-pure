	<div class="wrapper sidebar pure-u-1 pure-u-lg-6-24">
		<div class="header" id="pure-main-header">
		<?php if(get_theme_mod('header_position') != 'content-top') : ?>
			<header class='site-header' role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
				<hgroup>
						<?php if(!is_home()) : ?>
							<h1 class="site_title" itemprop="headline"><a href="<?php echo home_url(); ?>"><?php bloginfo('title'); ?></a></h1>
						<?php else : ?>
							<h1 class="site_title" itemprop="headline"><?php bloginfo('title'); ?></h1>
						<?php endif; ?>
					</h1>
					<p class="site_description" itemprop="description"><?php bloginfo('description'); ?></p>
				</hgroup>
			</header>
		<?php endif; ?>
		<nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<?php wp_nav_menu(array(
				'theme_location'=>'primary',
				'container'=>'div',
				'container_class'=>'nav-container',
				'menu_class'=>'nav-list',
				'depth'=>-1,
			)); ?>
			</nav>
		</div>
		<?php if(is_active_sidebar('sidebar-area')) : ?>
		<aside id="widget-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-area')); ?>
			<div class="cleafix"></div>
		</aside>
		<?php endif; ?>
		<div class="clearfix"></div>
	</div>