<?php $link = $node->field_callout_read_more[$idx]; ?>
<div class="callout_box <?php if(isset($options['class'])) print $options['class'];?>">
	<?php if(isset($link['url']) && $link['url']):?>
		<a href="<?php print url($link['url']); ?>">
	<?php endif; ?>
			<?php print theme('imagecache', $options['imagecache'], $node->field_callout_image[$idx]['filepath']);?>
	<?php if(isset($link['url']) && $link['url']):?>
		</a>
	<?php endif; ?>		

	<div class="inner">
		<h4><?php print $node->field_callout_title[$idx]['value']?></h4>
		<?php print $node->field_callout_text[$idx]['value']; ?> <?php print theme('wistar_read_more', $link['display_title'], $link['url']);?>
	</div>
</div>
