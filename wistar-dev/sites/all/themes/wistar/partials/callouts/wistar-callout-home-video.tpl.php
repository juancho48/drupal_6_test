<?php if(isset($node->field_video_callout_image[$idx]['filepath']) && $node->field_video_callout_image[$idx]['filepath']):?>
<div class="callout_box video_callout">
	<a href="<?php print $node->field_video_callout_link[$idx]['url'];?>">
		<?php print theme('imagecache', 'callout_side_column', $node->field_video_callout_image[$idx]['filepath']);?>
	</a>
	<div class="inner">
		<h3><?php print $node->field_video_callout_title[$idx]['value'] ?></h3>
		<p>
			<?php print $node->field_video_callout_text[$idx]['value']; ?>
		</p>
		
		<?php print theme('wistar_read_more', $node->field_video_callout_link[$idx]['title'], $node->field_video_callout_link[$idx]['url']);?>		
	</div>	
</div>
<?php endif; ?>
