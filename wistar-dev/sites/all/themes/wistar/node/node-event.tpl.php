<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<?php $with_image = isset($node->field_event_image[0]['filepath']);?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<div class="tabs">
			<div class="tab_set">
				<span class="arrow"><</span><?php print l('Back to All Events', 'events', array('attributes' => array('class' => 'back_link')));?>
				<?php 
					$menu = module_invoke('menu_block', 'block', 'view', 14);
					print $menu['subject'];
					print $menu['content'];
				?>
			</div>			
		</div>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node event node-event">
				<div class="section">
					<div class="image_detail_container">
						<div class="image_detail_elements<?php if(!$with_image) print ' without_image'?>">
							<div class="detail_elements">
								<?php if($with_image):?>
									<div class="detail_picture">
										<img src="/<?php print $node->field_event_image[0]['filepath'];?>" alt="<?php print $node->title;?>"/>
									</div>
								<?php endif;?>
								<div class="detail_body wysiwyg">
									<h2><?php print $node->title; ?></h2>
									<p><?php print $node->field_event_date[0]['view'];?></p>
									<p><?php print $node->field_event_location[0]['view'];?></p>
									
									<?php if(isset($node->field_ticket_price[0]['value']) && $node->field_ticket_price[0]['value']): ?>
										<div class="wysiwyg register_link">
											<a class="callout_link" href="/<?php print drupal_get_path_alias('events/registration/' . $node->nid);?>">Register<span class="more_arrow">></span></a>	
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>	
					<div class="event_info_columns wysiwyg">
						<div class="main">
							<?php if(isset($node->content['body']['#value']) && $node->content['body']['#value']):?>
								<?php print $node->content['body']['#value']; ?>
							<?php endif; ?>
							<?php if(isset($node->field_event_more_info[0]['view']) && $node->field_event_more_info[0]['view']):?>
								<p>
									<i><?php print $node->field_event_more_info[0]['view']; ?></i>
								</p>
							<?php endif; ?>
						</div>
						<div class="sidebar">
							
						</div>
					</div>	
				</div>			
				<?php if( isset($node->field_bottom_wysiwyg[0]['view']) && $node->field_bottom_wysiwyg[0]['view']): ?>
					<div class="wysiwyg section">
						<?php print $node->field_bottom_wysiwyg[0]['view']; ?>
					</div>
				<?php endif; ?>

				<?php if( isset($node->field_event_bottom_header[0]['view']) && $node->field_event_bottom_header[0]['view']): ?>
					<?php $subheading = theme('wistar_content_heading', $node, $node->field_event_bottom_header[0]['view']);?>					
				<?php endif; ?>

				<?php $idx = 0; isset($node->field_bottom_title[0]['value']) ? $count = count($node->field_bottom_title) : $count = 0; ?>
				<?php if($count):?>
					<div class="bottom_content_container section <?php if($subheading) { print ' with_subheading'; }?>">
						<?php print $subheading;?>
						<div class="bottom_content_elements">
							<?php while($idx < $count): ?>
								<div class="content">
									<div class="image">
										<?php print $node->field_bottom_image[$idx]['view']; ?>
									</div>
									<div class="body wysiwyg">
										<h4><?php print $node->field_bottom_title[$idx]['value']; ?></h4>
										<p>
											<?php print $node->field_bottom_text[$idx]['view']; ?>
										</p>
									</div>
								</div>
								<?php $idx++; ?>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
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
