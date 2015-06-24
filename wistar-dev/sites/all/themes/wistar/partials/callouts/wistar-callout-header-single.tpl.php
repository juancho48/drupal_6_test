<div class="callout_header single">
	<div class="callout_main_text">
		<h2><?php print $node->field_callout_main_text[0]['safe']; ?></h2>
		<p>
			<?php print $node->field_callout_body_text[0]['safe']; ?>
		</p>
	</div>		
	<div class="callout_body">
		<div class="single_container">
			<div class="image_link">
				<?php $image = theme('imagecache', 'callout_header_body_image', $node->field_callout_link_image[0]['filepath']);?>
				<?php $link = $node->field_callout_link[0] ;?>
				<?php $content = $image; ?> <?php // . "<div class=\"image_label\">{$node->title}</div>"; ?>
				<?php if(isset($link['url']) && $link['url']): ?>
					<a href="<?php print url($link['url']); ?>" <?php if($link['attributes']['target']) print 'target="' . $link['attributes']['target'] . '"'; ?>>
				<?php endif; ?>
					<?php print $content; ?>
				<?php if(isset($link['url']) && $link['url']): ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>						
</div>

