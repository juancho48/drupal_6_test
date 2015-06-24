<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<h3 class="with_borders"><?php print menu_get_active_title();?></h3>
			<div class="node page view">
				<div class="section">
					<div class="list_container">
						<div class="list_filters">
							<ul>
								<li>
									<span>View By Year</span>
									<?php print $attachment_before; ?>
								</li>
							</ul>
						</div>					
						<div class="list_elements">
							<?php if(is_numeric($view->args[0])):?>
								<h3><?php print $view->args[0];?></h3>
							<?php endif; ?>						
							<ul class="list">
								<?php $max = count($view->result) - 1;?>
								<?php foreach($view->result as $idx => $result): ?>
									<li class="<?php if($idx == 0): ?>first<?php elseif($idx == $max):?>last<?php endif;?>">
										<div id="<?php print $result->nid; ?>" class="node">
											<a class="anchor" href="<?php print url('node/' . $result->nid); ?>">
												<?php print $result->node_title . ' - ' . $view->render_field('field_press_date_value', $idx); ?>
											</a>			
										</div>
										<?php	
										/*
										<div class="list_content">
											<div class="list_content_inner">
												<div class="body">
												print $view->render_field('field_teaser_value', $idx); 																	
												</div>
											</div>
										</div>
										*/
										?>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
