<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 14);?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node page node-press">
				<div class="section">
					<h2 class="press"><?php print $node->title;?></h2>
					<?php //print theme('wistar_share', $node->nid);?>
					<div class="post_share">
						<ul>
							<li class="target">
								<a href="#" class="anchor">Share<span>&nbsp;</span></a>
								<div class="addthis_toolbox addthis_default_style addthis_16x16_style">
									<ul>
										<li class="facebook"><a class="addthis_button_facebook"><?php echo t('Facebook'); ?></a></li>
										<li class="twitter"><a class="addthis_button_twitter"><?php echo t('Twitter'); ?></a></li>
										<li class="email"><a class="addthis_button_email"><?php echo t('Email'); ?></a></li>
										<?php //pa($node,1); ?>
										<?php if (!empty($node->field_print_this_file[0]['filepath'])): ?>
											<li class="print-this"><?php 
												echo l('<span></span>'.t('Print'),
														$node->field_print_this_file[0]['filepath'],
														array('attributes' => array('rel' => 'external', 'class' => 'print'),'html' => 'true')
													 ); 
											?></li>
										<?php endif; ?>
									</ul>
								</div>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
							</li>
						</ul>
					</div>
					<div class="meta"><?php print $node->field_press_date[0]['view']; ?></div>
					<div class="wysiwyg">
						<?php if($node->field_post_image[0]['filepath']):?>
							<div class="view-field-field-post-image">
							<?php print theme('imagecache', 'press_release_image', $node->field_post_image[0]['filepath']); ?>
							<?php if(!empty($node->field_post_image[0]['data']['alt'])): ?>
								<div class="blog-image-alt">
									<?php print($node->field_post_image[0]['data']['alt']); ?>
								</div>
							<?php endif; ?>
							</div>
						<?php endif;?>
						<?php print $node->field_body[0]['view']; ?>	
						<?php foreach($node->field_file as $key => $value){ print $value['view']; } ?>	
					</div>
				</div>
				<?php if(isset($node->field_album[0]['nid'])):?>
					<div class="embedded_photo_gallery section">
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
