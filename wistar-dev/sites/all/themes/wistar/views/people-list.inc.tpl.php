<?php 
	$list = array();
	foreach( $view->style_plugin->rendered_fields as $row ) {
		$term = $row['name'];
		if(!isset($list[$term])) $list[$term] = array();
		$list[$term][] = node_load($row['nid']);
	}

	$proxy = node_load(969);
?>
<?php if(isset($proxy->field_masthead_image[0]['filepath']) && $proxy->field_masthead_image[0]['filepath']): ?>
	<?php print theme('imagecache', 'page_masthead_image', $proxy->field_masthead_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php endif; ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<h3 class="with_borders"><?php print menu_get_active_title();?></h3>
			<div id="node-969" class="node page view">
				<div class="section">
					<?php if(isset($proxy->field_body[0]['value']) && $proxy->field_body[0]['value']):?>
						<div class="intro_text">
							<?php print $proxy->field_body[0]['value']; ?>
						</div>
					<?php endif; ?>
					<div class="list_container">
						<div class="list_elements">
							<?php foreach($list as $heading => $nodes ): ?>
								<h3><?php print $heading;?></h3>
								<ul class="list">
									<?php $max = count($nodes) - 1;?>
									<?php foreach($nodes as $idx => $person): ?>
										<li class="<?php if($idx == 0): ?>first<?php elseif($idx == $max):?>last<?php endif;?>">
											<span class="anchor"><?php print $person->title; ?></span>				
											<div class="list_content">
												<div class="list_content_inner">
													<?php if($person->field_professional_title[0]['value']): ?>
														<div class="body">
															<?php foreach($person->field_professional_title as $prof_title): ?>
																<div><?php print $prof_title['value'];?></div>
															<?php endforeach; ?>
														</div>			
													<?php endif; ?>
													<?php if($person->field_contact_information[0]['value']): ?>
														<div class="body">
															<?php foreach($person->field_contact_information as $contact): ?>
																<div>
																	<?php if (strstr($contact['value'], '@wistar.org') ): ?>
																		<?php print l($contact['value'], 'mailto:' . $contact['value']); ?>
																	<?php else: ?>
																		<?php print $contact['value']; ?>
																	<?php endif; ?>
																</div>
															<?php endforeach; ?>
														</div>			
													<?php endif; ?>													
													<?php if(isset($person->field_person_link[0]['url']) && $url = $person->field_person_link[0]['url']): ?>
														<div class="body">
															<?php print theme('wistar_read_more', null, $url); ?>
														</div>
													<?php endif; ?>													
												</div>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
