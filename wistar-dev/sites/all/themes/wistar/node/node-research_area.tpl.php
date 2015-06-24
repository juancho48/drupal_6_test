<?php 
	if($our_science = wistar_theme_get_active('our_science')) {
		print theme('wistar_callout_header_four_up', 
			$our_science, 
			$node->field_callout_main_text[0]['value'], 
			$node->field_callout_body_text[0]['value'],
			wistar_str2class($node->title)
		); 
	}
?>
<?php print theme('breadcrumb', drupal_get_breadcrumb( )); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node research-area node-research-area">
				<?php if(isset($node->field_intro_text[0]['value']) && $node->field_intro_text[0]['value']): ?>
					<div class="section first no_pad">
						<p class="intro_text">
							<?php print $node->field_intro_text[0]['value'] ?>
						</p>				
					</div>
				<?php endif;?>
				<div class="section">
					<!-- stare expandable list -->
					<div class="expandable_list_container">
						<div class="expandable_list_elements">
							<ul class="expandable_list">
								<?php foreach( $node->field_topics as $idx => $topic ): ?>
									<?php $topic = node_load($topic['nid']); ?>
									<li>
										<a class="anchor" href="#"><?php print $topic->title; ?><span class="icon">&nbsp;</span></a>				
										<div class="expandable_content expandable_content_multicolumn node" id="node-<?php print $topic->nid ?>">
											<div class="expandable_content_inner">
												<div class="body">
													<?php print $topic->field_topic_description[0]['value']; ?>
												</div>			
												<?php if(count($topic->field_topic_scientists[0]['items']) && $topic->field_topic_scientists[0]['items'][0]['nid']): ?>
												<div class="list">
													<h5>Associated Faculty:</h5>
													<ul>
														<?php foreach($topic->field_topic_scientists[0]['items'] as $idx => $scientist): ?>
															<li><?php print theme_wistar_read_more($scientist['title'], url('node/' . $scientist['nid']))?></li>
														<?php endforeach; ?>
													</ul>
												</div>
												<?php endif; ?>
												<?php if(count($topic->field_topic_technologies[0]['items']) && $topic->field_topic_technologies[0]['items'][0]['nid']): ?>
												<div class="list">
													<h5>Associated Technologies:</h5>
													<ul>
														<?php foreach($topic->field_topic_technologies[0]['items'] as $idx => $technology): ?>
															<li><?php print theme_wistar_read_more($technology['title'], url('node/' . $technology['nid']))?></li>
														<?php endforeach; ?>
													</ul>
												</div>
												<?php endif; ?>												
											</div>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<!-- end expandable list -->
				</div>
			</div>
		</div>
	</div>
</div>
