<?php //print theme('breadcrumb', drupal_get_breadcrumb( )); ?>
<?php if(arg(0) == 'events'){
		$crumbs = drupal_get_breadcrumb();
		if(empty($crumbs[4])){
			unset($crumbs[3]);
		}
		drupal_set_breadcrumb($crumbs);	
		print theme('breadcrumb', drupal_get_breadcrumb( ));
	}
?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div class="node technology node-technology">
				<div class="section">
					<?php if($rows): ?>
					<!-- store expandable list -->
					<div class="expandable_list_container">
						<div class="expandable_list_elements">
							<ul class="expandable_list">
								<?php foreach( $view->result as $idx => $result ): ?>
									<li>
										<a class="anchor" href="#">
											<?php print $result->node_title; ?>
											<?php if($date = $view->render_field('field_event_date_value', $idx)): ?>
												<?php print ' - ' . $date; ?>
											<?php endif; ?>
											<span class="icon">&nbsp;</span>
										</a>				
										<div class="expandable_content expandable_content_multicolumn node" id="node-<?php print $result->nid ?>">
											<div class="expandable_content_inner">
												<div class="body list">
													<?php print $view->render_field('body', $idx); ?>
													<?php print theme('wistar_read_more', null, url('node/' . $result->nid)); ?>											
												</div>		
												<div class="list">
													<?php print $view->render_field('field_event_image_fid', $idx); ?>												
												</div>																		
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
