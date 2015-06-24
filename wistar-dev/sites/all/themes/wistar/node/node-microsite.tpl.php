<div id="node-<?php print $node->nid;?>" class="node">
	<div id="microsite_container">
		<div id="microsite_elements">
			<?php print theme('wistar_microsite_menu', $node); ?>
			<div id="microsite_content">
				<?php if( isset($node->field_lab_masthead_image[0]['view']) && $node->field_lab_masthead_image[0]['view'] ): ?>
					<div id="microsite_header">
						<?php print $node->field_lab_masthead_image[0]['view']; ?>
					</div>		
				<?php else: ?>
					<?php if($node->field_scientist[0]['items'][0]['nid']):?>
						<?php $scientist = node_load($node->field_scientist[0]['items'][0]['nid']);?>
						<div id="microsite_header" class="image_detail_container">
							<div class="image_detail_elements" style="margin-bottom: inherit;">
								<div class="detail_elements" style="height: 240px;">
									<div class="detail_picture">
										<img src="/<?php print $scientist->field_profile_picture[0]['filepath'];?>" alt="<?php print $scientist->title;?>"/>
									</div>
									<div class="detail_body">
										<h2><?php print $scientist->title; ?></h2>
										<?php if(count($scientist->field_professional_title) && $scientist->field_professional_title[0]['value'] ): ?>
											<ul class="bio_list professional_titles">
											<?php foreach($scientist->field_professional_title as $idx => $ptitle): ?>
												<li><?php print $ptitle['value']; ?></li>
											<?php endforeach;?>
											</ul>
										<?php endif; ?>
										<?php if(count($scientist->field_contact_information) && $scientist->field_contact_information[0]['value'] ): ?>
											<ul class="bio_list contact_information">
											<?php foreach($scientist->field_contact_information as $idx => $info): ?>
												<li><?php print $info['value']; ?></li>
											<?php endforeach;?>
											</ul>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif;?>
				<?php endif; ?>				
				<?php if($node->field_intro_text_title[0]['value'] && $node->field_intro_text[0]['value']): ?>
					<div class="intro">			
						<h3 class="with_borders"><?php print $node->field_intro_text_title[0]['value'];?></h3>
						<div class="text wysiwyg">
							<?php print $node->field_intro_text[0]['value']; ?>
						</div>
					</div>
				<?php endif; ?>	
				<div class="subcolumn_container">
					<div class="subcolumn_elements">
						<?php if(count($node->field_lab_quicklinks) && !empty($node->field_lab_quicklinks[0]['url'])):?>
						<div class="left column set_of_2">
							<?php else: ?>
							<div class="left column set_of_2 one-column">
						<?php endif; ?>
							<?php $callout_side = 'left_callout';?>
							<?php foreach($node->field_microsite_callout_image as $idx => $image): ?>
								<?php if($image['filepath']): ?>
									<div class="callout_container <?php print $callout_side; ?>">
										<div class="callout_elements">
											<?php if(!empty($node->field_callout_link[$idx])): ?>
												<?php $link = $node->field_callout_link[$idx]; ?>
												<a href="<?php print $link['url'];?>" class="more"><img src="/<?php print $image['filepath']?>" alt="callout" /></a>
											<?php else: ?>
												<img src="/<?php print $image['filepath']; ?>" alt="callout" />
											<?php endif; ?>	
											<div class="inner">
												<h5><?php print $node->field_callout_title[$idx]['value']; ?></h5>
												<p><?php print $node->field_callout_text[$idx]['value']; ?></p>
												<?php if(isset($link['url']) && $link['url']): ?>
													<a href="<?php print $link['url']; ?>" class="more"><?php print $link['title'];?><span class="more_arrow">&gt;</span></a>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<?php if(count($node->field_lab_quicklinks) && !empty($node->field_lab_quicklinks[0]['url'])):?>
										<?php if($callout_side == 'left_callout'): ?>
											<?php $callout_side = 'right_callout'; ?>
										<?php else: ?>
											<?php $callout_side = 'left_callout'; ?>
										<?php endif; ?>
									<?php endif; ?>
								<?php endif;?>
							<?php endforeach; ?>
						</div>
						<div class="right column">
							<?php if(count($node->field_lab_quicklinks) && $node->field_lab_quicklinks[0]['url']):?>
							<?php //pa($node->field_lab_quicklinks,1); ?>
							<?php print theme('wistar_microsite_sidebar_quicklinks', $node->field_lab_quicklinks); ?>
							<?php endif;?>
							<?php if(isset($node->field_video_callout_image[0]['view']) &&	$node->field_video_callout_image[0]['view']): ?>
								<div class="sidebar_container">
									<?php $callout = theme('wistar_callout_home_video', $node); print $callout;?>
								</div>
							<?php endif; ?>
						</div>	
					</div>						
				</div>		
			</div>
		</div>
	</div>
</div>
