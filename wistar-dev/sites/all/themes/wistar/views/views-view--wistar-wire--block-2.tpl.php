<?php if(count($view->result)): ?>
	<div id="wistar_wire_container">
		<div id="wistar_wire_elements">
			<div class="main_column" style="width: 407px; float: none;">
				<h3 class="with_borders with_plus">From the Wistar Wire</h3>
				<?php foreach( $view->result as $idx => $post ): ?>
					<?php 
						$classes = array();
						if( $idx === 0 ) $classes[] = 'first';
						if( $idx === (count($view->result) - 1) ) $classes[] = 'last';
					?>
					<div class="microsite_post post_container<?php print ' ' . join(' ', $classes) ?>">
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
									<?php print theme('wistar_read_more', 'Read More', '/'); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
