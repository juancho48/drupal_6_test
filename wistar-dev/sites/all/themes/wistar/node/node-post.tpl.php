<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php //print theme('wistar_vertical_tabs_custom', l('Back to Events', 'events', array('attributes' => array('class' => 'back_link'))));?>
		<?php print theme('wistar_vertical_tabs', 13);?>		
		<div class="content">			
			<h3 class="with_borders"><a href="/wistar-today/wistar-wire">&lt; Back to List</a></h3>
			<div id="node-<?php print $node->nid;?>" class="node post node-post">
				<div class="view view-blog view-id-blog view-display-id-page_1 view-dom-id-2">
					<div class="section">
						<?php if(FALSE):?>
						<div class="attachment attachment-before">
							<?php if(count($node->field_related_posts) && $node->field_related_posts[0]['nid']):?>
								<h2>Related Posts</h2>
								<div class="view-content">
									<ul>
									<?php foreach($node->field_related_posts as $idx => $post):?>
										<?php $post = node_load($post['nid']); ?>
										<li><?php print l($post->title, $post->path);?></li>
									<?php endforeach; ?>
									</ul>
								</div>
							<?php endif;?>
							<?php if(count($node->taxonomy)):?>
								<div class="view-content">
									<?php $term_arr = array();?>
									<?php foreach($node->taxonomy as $tid => $term):?>
										<?php $term_arr[] = l($term->name, 'wistar-today/wistar-wire/' . strtolower(str_replace(' ', '-', $term->name)));?>
									<?php endforeach; ?>
									<div class="views-field-tid">
										<label class="views-label-tid">Tagged:</label>
										<span class="field-content"><?php print join(', ', $term_arr);?></span>
									</div>
								</div>
							<?php endif;?>
						</div>
						<?php endif;?>
						<div class="view-content">
							<div class="views-row views-row-1 views-row-odd views-row-first">    
								<div class="views-field-title">
									<span class="field-content"><?php print $node->title;?></span>
								</div>
								<?php print theme('wistar_share', $node->nid);?>				
								<div class="views-field-field-post-date-value">
				        			<span class="field-content"><?php print $node->field_post_date[0]['view']; ?></span>
				        		</div>
		  						<div class="views-field-name">
				  					<label class="views-label-name">Posted by:</label>
				        			<span class="field-content"><?php print $node->name;?></span>
		 						</div>  
		 						<div class="views-field-field-teaser-value">
									<div class="field-content wysiwyg">
                      <?php if(isset($node->field_post_image[0]) && $node->field_post_image):?>
    									<div class="view-field-field-post-image">
                        <?php //pa($node->field_post_image,1); ?>
    										<?php print '<a href="' . url($node->field_post_image[0]['filepath']) . '" class="fancybox-image">' . theme('imagecache', 'post_image', $node->field_post_image[0]['filepath']) . '</a>';?>

    										<?php if(!empty($node->field_post_image[0]['data']['alt'])): ?>
    											<div class="blog-image-alt">
    												<?php print($node->field_post_image[0]['data']['alt']); ?>
    											</div>
    										<?php endif; ?>
    									</div>
    								<?php endif;?>
										<?php print $node->field_body[0]['value'];?>
									</div>
								</div>
		            		</div>
		            	</div>
						<div class="pagination">
							<?php if( $node->prev && is_numeric($node->prev) ):?>
								<div class="prev"><a href="<?php print url('node/' . $node->prev);?>"><span class="more_arrow"><</span>&nbsp;Previous Post</a></div>
							<?php endif; ?>
							<?php if( $node->next && is_numeric($node->next) ):?>								
								<div class="next"><a href="<?php print url('node/' . $node->next);?>">Next Post&nbsp;<span class="more_arrow">></span></a></div>
							<?php endif; ?>	
						</div>		            
		            </div>
		            <script type="text/javascript">
		            	$(function() {
		            		$('label').inFieldLabels();
		            	});
		            </script>
		            <?php // DISABLED PER REQUEST OF BLUECADET ?>
					<?php //if(false):?>
					<?php if($node->nid == '1790'):?>
		            <div class="section view-content">
						<?php //pa($node,1); ?>
		            	<?php print $node->comments;?>
		            	<div id="comment_form">
							<div class="comment_form_label">Add Comment</div>
			            	<?php print $node->comment_form;?>		            
		            	</div>
		            </div>
					<?php endif;?>
		            <?php //endif;?>
				</div>
			</div>
		</div>
	</div>
</div>

