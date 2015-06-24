<?php if(!$node->content_only):?>
	<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
	<div class="vertical_tab_container">
		<div class="vertical_tab_elements">
			<?php print theme('wistar_vertical_tabs', 16);?>
<?php endif;?>
			<div class="content node-album">			
				<?php if(!$node->content_only):?>
				  	<?php print theme('wistar_content_heading', null, l('Back to Gallery', 'news-and-media/gallery')); ?>
					<div class="post_links">			
			  			<span class="download_container"><a href="#" class="download">Download</a></span>
			  			<?php print theme('wistar_share', $node->nid); ?>  			
					</div>
				<?php endif;?>	
				<div id="node-<?php print $node->nid; ?>" class="node">
					<div class="section">
						<?php print theme('wistar_gallery', $node->field_album_images, 'album_thumb', 4, $node->field_album_notice[0]['value']); ?>
						<div class="wysiwyg">
							<h4><?php print $title; ?></h4>
							<div class="date"><?php print $node->field_album_date[0]['view']; ?></div>
							<?php if ( isset($node->field_album_location[0]['value']) && $location = $node->field_album_location[0]['value'] ): ?>
								<div class="location"><?php print nl2br($location); ?></div>
							<?php endif; ?>
							<div class="body">
								<?php print $node->content['body']['#value']; ?>				
							</div>
						</div>
					</div>
				</div>
			</div>
<?php if(!$node->content_only):?>
	</div>
</div>
<?php endif;?>

