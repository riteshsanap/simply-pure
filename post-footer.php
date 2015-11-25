<?php 
/************************************************************************************/
/*	Post Footer	*/		
/************************************************************************************/		
 ?>

 <div id="post-footer-cols" class="pure-g">
 	<?php if(is_active_sidebar('post-footer')) : ?>
 	 <div id="post-footer" class="<?php echo simply_pure_sidebars_class('post-footer'); ?>">
	 	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('post-footer')); ?>	
	 </div>
	 <?php endif; if(is_active_sidebar('post-footer-2')) : ?>
	 <div id="post-footer" class="<?php echo simply_pure_sidebars_class('post-footer'); ?>">
	 	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('post-footer-2')); ?>
	 </div>
	 <?php endif; if(is_active_sidebar('post-footer-3')) : ?>
	 <div id="post-footer" class="<?php echo simply_pure_sidebars_class('post-footer'); ?>">
	 	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('post-footer-3')); ?>
	 </div>
	 <?php endif; ?>
	 <div class="clearfix"></div>
 </div>
