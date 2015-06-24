<?php print theme('imagecache', 'page_masthead_image', $node->field_masthead_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node page node-page">
				<div class="section">
					<div class="wysiwyg">
						<?php print $node->content['body']['#value']; ?>				
					</div>
				</div>
				<?php print theme('wistar_content_callouts', $node); ?>				
			</div>
		</div>
	</div>
</div>
