<?php print theme('breadcrumb', drupal_get_breadcrumb( )); ?>
<script type="text/javascript">
	$(function() {
		var hash = window.location.hash;
		if(hash) {
			hash = hash.substring(1);
			var $term = $('a[name="' + hash + '"]');
			if($term.length) {
				setTimeout(1000, $term.trigger('click'));
			}
		}
	});
</script>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs');?>
		<div class="content">			
			<?php print theme('wistar_content_heading', null, 'Glossary');?>
			<div class="node research-area node-research-area">
				<div class="section">
					<!-- stare expandable list -->
					<div class="expandable_list_container">
						<div class="expandable_list_elements">
							<ul class="expandable_list">
								<?php foreach( $view->result as $idx => $result ): ?>
									<li>
										<a class="anchor" href="#" name="<?php print wistar_str2class($result->node_title);?>"><?php print $result->node_title; ?><span class="icon">&nbsp;</span></a>				
										<div class="expandable_content expandable_content_multicolumn node" id="node-<?php print $result->nid ?>">
											<div class="expandable_content_inner">
												<div class="body">
													<?php print $view->render_field('field_glossary_definition_value', $idx); ?>
												</div>														
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
