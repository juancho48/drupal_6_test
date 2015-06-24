<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node page node-page">
				<div class="section">
					<div class="wysiwyg">					
						<?php print $node->field_body[0]['value'];?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
