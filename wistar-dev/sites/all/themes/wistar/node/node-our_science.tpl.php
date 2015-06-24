<?php print theme('wistar_callout_header_four_up', $node); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', null, true);?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node">
				<div class="section first no_pad">			
					<?php if(isset($node->field_intro_text[0]['value']) && $node->field_intro_text[0]['value']): ?>
						<?php print $node->field_intro_text[0]['value'] ?>
					<?php endif;?>
				</div>
				
				<div class="section">
					<div class="callout_section_container grey">
						<?php $wistar_cancer_block = module_invoke('block', 'block', 'view', 3); ?>
						<div id="block-block-3" class="block">
							<?php print $wistar_cancer_block['content']; ?>
						</div>
					</div>				
				</div>
								
				<?php print theme('wistar_content_callouts', $node); ?>					
				
				<?php if( isset($node->field_links_link[0]['url']) && $node->field_links_link[0]['url'] ): ?>
				<?php print theme('wistar_content_links', $node); ?>		
				<?php endif; ?>									
			</div>
		</div>
	</div>
</div>
