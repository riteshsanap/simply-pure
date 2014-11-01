<?php get_header(); ?>
	<main id="primary" itemscope="itemscope" itemtype="http://schema.org/Blog" itemprop="mainContentOfPage" role="main" class="padder404">
		<h1 class="content-subhead">
			404 - Page not Found
		</h1>
		<h3>The page you are looking for could not be found. Try the following Options:</h3>
		
		<ul class="list404">
			<li>Check the URL for any mistakes.</li>
			<li>Try Visiting the <a href="<?php echo esc_url( home_url() ) ?>">Home Page</a></li>
			<li>Or Try searching for the Page :
			<?php get_template_part('searchform'); ?>
			</li>
		</ul>
		
		</main>
<div class="clearfix"></div>
<?php get_footer(); ?>