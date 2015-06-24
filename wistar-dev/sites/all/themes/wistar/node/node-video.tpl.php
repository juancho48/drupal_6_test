<?php if($node->field_masthead_image[0]['filepath']):?>
	<?php print theme('imagecache', 'page_masthead_image', $node->field_masthead_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php endif; ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 16);?>
		<div class="content node-video">			
		  <?php print theme('wistar_content_heading', null, l('Back to Gallery', 'news-and-media/gallery')); ?>
		  <div class="post_links">			
  			<?php print theme('wistar_share', $node->nid); ?>  			
			</div>
			<div id="node-<?php print $node->nid; ?>" class="node">
				<div class="section">
					<div class="video_container">
						<?php print $node->field_video_content[0]['view']; ?>
					</div>
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
	</div>
</div>

