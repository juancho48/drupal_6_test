<?php if(isset($node->field_masthead_image[0]['filepath']) && $node->field_masthead_image[0]['filepath']): ?>
	<?php print theme('imagecache', 'page_masthead_image', $node->field_masthead_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php endif; ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node experts node-experts">
				<div class="section">
					<div class="wysiwyg">					
						<?php print $node->content['body']['#value']; ?>				
						<?php if($node->field_experts_subject[0]['value'] && $subjects_cnt = count($node->field_experts_subject)): ?>
							<table>
								<thead>
									<tr>
										<th class="bordered">Subject</th>
										<th>Scientists</th>
									</tr>
								</thead>
								<tbody>
								<?php $i = 0;while($i < $subjects_cnt):?>
									<?php $class = ($i+1 == $subjects_cnt) ? ' last' : '';?>								
									<tr class="row-<?php print $i . $class; ?>">
										<td class="bordered"><?php print $node->field_experts_subject[$i]['value']; ?></td>
										<td>
										<?php
											$j = 1;
											$experts = array();
											while($j <= 6){
												$cur_scientist_field = field_expert_scientist . $j;
												$cur_scientist = $node->$cur_scientist_field;
												if($cur_scientist[$i]['view']) $experts[] = $cur_scientist[$i]['view'];
												$j++;
											}
											print join(', ', $experts);
										?>
										</td>
									</tr>		
									<?php $i++;	?>
								<?php endwhile;	?>
								</tbody>
							</table>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
