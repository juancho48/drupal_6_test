<?php if( !isset($node->imagecache_preset) ) $node->imagecache_preset = 'callout_set_of_3'; ?>
<div id="node-<?php print $node->nid; ?>" class="node">
	<?php $link = $node->field_callout_node_link[0]; ?>
	
	<?php if(isset($link['url']) && $link['url']): ?>
		<a href="<?php print $link['url']; ?>">
	<?php endif; ?>
		<?php print theme('imagecache', $node->imagecache_preset, $node->field_callout_node_image[0]['filepath']); ?>
	<?php if(isset($link['url']) && $link['url']):?>
		</a>
	<?php endif; ?>		

	<div class="inner">
		<h4><?php print $node->title; ?></h4>
		<?php print rtrim($node->field_callout_body[0]['value']) . '...'; ?> 
		<?php print theme('wistar_read_more', $link['display_title'], $link['url']); ?>
	</div>
</div>
