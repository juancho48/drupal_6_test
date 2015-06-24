<div id="microsite_container">
	<div id="microsite_elements" class="content">
		<?php $parent = node_load($node->field_microsite[0]['nid']);?>
		<?php print theme('wistar_microsite_menu', $parent); ?>
		<div id="microsite_content">
			<div id="node-<?php print $node->nid;?>" class="node node-microsite-subpage">
				<?php if( isset($node->field_lab_masthead_image[0]['view']) && $node->field_lab_masthead_image[0]['view'] ): ?>
					<div id="microsite_header">
						<?php print $node->field_lab_masthead_image[0]['view']; ?>
					</div>		
				<?php endif; ?>
				<div class="subpage_content">
					<h3 class="with_borders"><?php print $node->title;?></h3>
					<?php if($node->content['body']['#value']):?>
						<div class="section wysiwyg">
							<?php print $node->content['body']['#value']; ?>
						</div>
					<?php endif;?>
					<?php if( count($node->field_callout_ref) && $node->field_callout_ref[0]['nid'] ): ?>
						<div class="section grey">
							<div class="callout_container set_of_3">
								<?php foreach( $node->field_callout_ref as $idx => $ref ): ?>
									<div class="callout_box callout_set_of_3 <?php print ($idx == 2) ? 'last' : ''; ?>">							
										<?php $callout = node_load($ref['nid']); ?>
										<?php $callout->imagecache_preset = 'callout_set_of_3_microsite'; ?>									
										<?php print node_view($callout); ?>
									</div>
								<?php endforeach;?>
							</div>
						</div>			
					<?php endif; ?>	
					<?php if( !empty($node->field_file_upload[0]['view'])) : ?>
					<div class="files">
						<h3>Files</h3>	
						<?php foreach( $node->field_file_upload as $file ): ?>
							<?php print $file['view']; ?>
						<?php endforeach;?>
					</div>	
					<?php endif; ?>					
				</div>
				<?php if(isset($node->field_album[0]['nid'])):?>
					<div class="embedded_photo_gallery">
						<?php print theme('wistar_content_heading', $node, 'Photo Gallery');?>					
						<?php 
							$album = node_load($node->field_album[0]['nid']);
							$album->content_only = true;
							print node_view($album);
						?>
					</div>
				<?php endif; ?>				
			</div>
		</div>
	</div>
</div>

