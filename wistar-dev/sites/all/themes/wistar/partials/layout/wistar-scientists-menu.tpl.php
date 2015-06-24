<?php /*
<ul class="menu">
	<?php $count = 0; ?>
	<?php foreach($scientists as $idx => $scientist): ?>
		<?php $count++; ?>
		<li class="leaf">
			<a href="/<?php print drupal_get_path_alias('node/' . $scientist->nid);?>"><?php print $scientist->node_title; ?></a>
		</li>
		<?php if( $count % 8 === 0 ): ?>
		</ul><ul class="menu">
		<?php endif; ?>
	<?php endforeach; ?>
</ul> */

	$block = module_invoke('wistar_scientists', 'block', 'view', 0);
	print $block['content'];
?>
