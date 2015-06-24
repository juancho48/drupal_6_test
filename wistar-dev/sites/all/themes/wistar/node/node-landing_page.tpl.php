<?php $callout_images = (!empty($node->field_landing_page_callout_img[0]['fid'])) ? $node->field_landing_page_callout_img : ''; ?>
<?php $callout_links = (!empty($node->field_landing_page_callout_link[0]['url'])) ? $node->field_landing_page_callout_link : ''; ?>
<?php if(!empty($node->field_callout_link_image)): ?>
	<?php print theme('wistar_landing_page_masthead_carousel', $node); ?>
<?php endif; ?>

<?php if(!empty($node->field_masthead_singl_image[0]['filepath'])): ?>
	<?php print theme('imagecache', 'page_masthead_image', $node->field_masthead_singl_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php endif; ?>

<?php if (empty($node->field_callout_link_image)) : ?>
	<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<?php endif; ?>

<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node page node-page">
				<?php if (!empty($node->content['body']['#value'])): ?>
				<div class="section wysiwyg clear_section_wysiwyg">
					<?php print $node->content['body']['#value']; ?>				
				</div>
				<?php endif; ?>
				
				<?php if (!empty($callout_images)) : ?>
					<?php if (!empty($node->content['body']['#value'])): ?>
						<?php print theme('wistar_callout_landing_page_callout_img', $node, $callout_images, $callout_links, true); ?>
					<?php else : ?>
						<?php print theme('wistar_callout_landing_page_callout_img', $node, $callout_images, $callout_links); ?>
					<?php endif; ?>
				<?php endif; ?>
				<?php if( isset($node->field_callouts_heading[0]['view']) && $node->field_callouts_heading[0]['view']): ?>
					<?php $subheading = theme('wistar_content_heading', $node, $node->field_callouts_heading[0]['view']);?>					
				<?php endif; ?>
				<?php print theme('wistar_content_callouts', $node, $subheading); ?>				
			</div>
		</div>
	</div>
</div>
