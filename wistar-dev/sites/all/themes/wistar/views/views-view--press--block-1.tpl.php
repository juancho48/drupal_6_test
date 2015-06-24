<?php foreach( $view->result as $idx => $post ): ?>
	<?php 
		$classes = array();
		if( $idx === 0 ) $classes[] = 'first';
		if( $idx === (count($view->result) - 1) ) $classes[] = 'last';
	?>
	<div class="post_container<?php print ' ' . join(' ', $classes) ?>">
		<div class="post_elements">
			<?php $image = $view->render_field('field_post_image_fid', $idx); ?>
			<?php if($image): ?>
				<div class="post_image">
					<?php print $image; ?>
				</div>
			<?php endif; ?>
			<div class="post_content" <?php if(!$image):?>style="margin-left: 0;"<?php endif;?>>
				<h4><?php print $view->render_field('title', $idx);?></h4>
				<div class="post_meta"><?php print $view->render_field('field_press_date_value', $idx); ?></div>
				<div class="post_teaser">
					<?php print $view->render_field('field_teaser_value', $idx); ?>
					<?php print theme('wistar_read_more', 'Read More', $view->render_field('path', $idx)); ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
