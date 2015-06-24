<?php print theme('wistar_landing_page_masthead_carousel', $node); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<div id="node-<?php print $node->nid;?>" class="node page node-page">
				<h3 class="with_borders with_plus">Press Releases</h3>
				<div class="section" style="padding-top: 10px;">
					<div id="wistar_wire_container">
						<div id="wistar_wire_elements">
							<div class="main_column" style="width: 100%;">
								<?php print views_embed_view('press', 'block_1'); ?>
							</div>
						</div>
					</div>
				</div>
				<?php if( isset($node->field_callouts_heading[0]['view']) && $node->field_callouts_heading[0]['view']): ?>
					<?php $subheading = theme('wistar_content_heading', $node, $node->field_callouts_heading[0]['view']);?>					
				<?php endif; ?>
				<?php print theme('wistar_content_callouts', $node, $subheading); ?>				
			</div>
		</div>
	</div>
</div>
