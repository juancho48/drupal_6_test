<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<h3 class="with_borders">Scientists</h3>
			<div class="node page view">
				<div id="block-block-4" class="section block no_pad">
					<?php $block = module_invoke('block', 'block', 'view' , 4); print $block['content']?>
				</div>
			  <?php if($rows): ?>				
				<div class="section">
					<div class="list_container">
						<div class="list_elements">
							<ul class="list">
								<?php foreach( $view->result as $idx => $base ): ?>
									<li>
										<?php 
											$scientist = node_load($base->nid);
											if( $scientist->type == 'scientist' ) {
												$url = url('node/' . $scientist->nid);
											}
											else {
												if(isset($scientist->field_person_link[0]['url']) && $scientist->field_person_link[0]['url']) {
													$url = $scientist->field_person_link[0]['url'];
												}
												else {
													$url = null;
												}
											}												
										?>
										<?php if($url):?>
											<a class="anchor" href="<?php print $url; ?>">
										<?php else: ?>
											<span class="anchor" >
										<?php endif;?>				
											<?php print $scientist->title; ?>
										<?php if($url):?>
											</a>
										<?php else: ?>
											</span>
										<?php endif;?>	
										<div class="list_content">
											<div class="list_content_inner">
												<?php if($scientist->field_professional_title[0]['value']): ?>
													<div class="body">
														<?php foreach($scientist->field_professional_title as $prof_title): ?>
															<div><?php print $prof_title['value'];?></div>
														<?php endforeach; ?>
													</div>			
												<?php endif; ?>
												<div class="list">
													
												</div>
											</div>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
