<?php foreach( $view->result as $idx => $post ): ?>
	<?php 
		$classes = array();
		if( $idx === 0 ) $classes[] = 'first';
		if( $idx === (count($view->result) - 1) ) $classes[] = 'last';
	?>
	<div class="post_container<?php print ' ' . join(' ', $classes) ?>">
		<div class="post_elements">
			<div class="post_image">
				<?php print $view->render_field('field_post_image_fid', $idx); ?>
				<?php print theme('wistar_share', $post->nid);?>				
			</div>
			<div class="post_content">
				<h4><?php print $view->render_field('title', $idx);?></h4>
				<div class="post_meta"><?php print $view->render_field('field_post_date_value', $idx); ?></div>
				<div class="post_teaser">
					<?php print $view->render_field('field_teaser_value', $idx); ?>
					<?php print theme('wistar_read_more', 'Read More', url('node/' . $post->nid)); ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<?php if(!empty($footer)): ?>
	<div class="wistar_wire_footer"><?php print $footer; ?></div>
<?php endif; ?>
