<div id="microsite_menu">
	<div class="header">
		<h1><?php print l($parent->title, $parent->path);?></h1>
		<?php if($parent->field_lab_subtitle[0]['value']): ?>
			<h2><?php print l($parent->field_lab_subtitle[0]['value'], $parent->path); ?></h2>				
		<?php endif;?>					
	</div>
	<div class="microsite_menu_container">
		<div class="microsite_menu_elements">
			<?php $menu = module_invoke('menu_block', 'block', 'view', 9); ?>
			<?php print $menu['content'];?>					
		</div>					
	</div>
	<?php if(isset($parent->field_lab_info[0]['value']) && $parent->field_lab_info[0]['value']): ?>
		<div class="microsite_info_container">
			<div class="microsite_info_elements">
				<?php print $parent->field_lab_info[0]['value']; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
