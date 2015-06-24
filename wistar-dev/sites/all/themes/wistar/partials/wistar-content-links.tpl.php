<div class="section">
	<div class="section_links">
		<?php if($links_header = $node->field_links_header[0]['value']): ?>
		<h4><?php print $links_header; ?></h4>
		<?php endif; ?>
		<?php foreach( $node->field_links_link as $idx => $link_field ): ?>
		<div class="link<?php print ($idx == 2) ? ' last' : ''; ?>">
		<?php $url = isset($link_field['url']) ? url($link_field['url']) : false; ?>
		<?php if($image_path = $node->field_links_image[$idx]['filepath']): ?>
			<?php if($url): ?>						
				<a href="<?php print $url; ?>" class="image_link">
			<?php endif; ?>
				<?php print theme('image', $image_path); ?>
			<?php if($url): ?>				
				</a>
			<?php endif ?>
		<?php endif; ?>
		<?php if($url): ?>
			<?php print $link_field['view']; ?>
		<?php endif; ?>
		</div>
		<?php endforeach;?>
	</div>
</div>	
