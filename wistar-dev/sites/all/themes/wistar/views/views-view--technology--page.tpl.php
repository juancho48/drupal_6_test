<?php $parent = node_load(167);?>
<?php print theme('imagecache', 'page_masthead_image', $parent->field_masthead_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb( )); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node, drupal_get_title());?>
			<div class="node technology node-technology">
				<div class="section">
					<?php if($rows): ?>
						<!-- start expandable list -->
						<div class="expandable_list_container">
							<div class="expandable_list_elements">
								<ul class="expandable_list">
									<?php foreach( $view->result as $idx => $result ): ?>
										<li>
											<a class="anchor" href="#"><?php print $result->node_title; ?><span class="icon">&nbsp;</span></a>				
											<div class="expandable_content expandable_content_multicolumn node" id="node-<?php print $result->nid ?>">
												<div class="expandable_content_inner">
													<div class="body">
														<?php print $view->render_field('field_technology_desc_value', $idx); ?>
													</div>					
													<?php if($result->node_data_field_technology_desc_field_hide_read_more_value < 1):?>																						
														<div class="links">
															<?php print theme('wistar_read_more', null, url('node/' . $result->nid)); ?>											
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
					<?php else: ?>
						<div class="wysiwyg">
							<?php print $empty; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
