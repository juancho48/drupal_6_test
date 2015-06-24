<?php print theme('wistar_callout_header_single', $node); ?>
<?php //print theme('breadcrumb', drupal_get_breadcrumb( )); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', null, false);?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node">
				<?php $is_first = true; ?>
				<?php if(isset($node->field_intro_text[0]['value']) && $node->field_intro_text[0]['value']): ?>
					<div class="section<?php if($is_first) { echo ' first'; $is_first = false;}?>">
						<?php print $node->field_intro_text[0]['value'] ?>
					</div>
				<?php endif;?>
				
				<?php print theme('wistar_content_callouts', $node); ?>					
				
				<div class="section">				
					<div id="wistar_wire_container">
						<div id="wistar_wire_elements">
							<div class="main_column" style="width: 522px;">
								<h3 class="with_borders with_plus">From the Wistar Wire</h3>
								<?php print views_embed_view('wistar_wire', 'block_1'); ?>
							</div>
							<div class="side_column" style="width: 229px;">
								<?php 
									$quicktabs = quicktabs_load(1);
									print theme('quicktabs', $quicktabs); 
								?>
							</div>
						</div>
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>
