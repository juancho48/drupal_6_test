<?php print theme('wistar_callout_header_single', $node); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node">
				<?php if(isset($node->field_intro_text[0]['value']) && $node->field_intro_text[0]['value']): ?>
					<div class="section first">
						<?php print $node->field_intro_text[0]['value'] ?>
					</div>
				<?php endif;?>
				<div class="section">
					<?php $infographic_dim = image_get_info($node->field_infographic_image[0]['filepath']); ?>
					<div class="infographic" style="height: <?php print $infographic_dim['height'] . 'px';?>; width: <?php print $infographic_dim['width'] . 'px';?>; background: url('/<?php print $node->field_infographic_image[0]['filepath']; ?>') 0 0 no-repeat;">
						<?php foreach($node->field_number_labels as $idx => $label): ?>
							<div class="label label-<?php print $idx?>">
								<?php print $label['value']; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php print theme('wistar_content_callouts', $node); ?>									
			</div>
		</div>
	</div>
</div>
