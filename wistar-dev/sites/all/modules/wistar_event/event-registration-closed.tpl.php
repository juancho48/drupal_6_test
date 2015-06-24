<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 14);?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $event, 'Registration Closed');?>
			<div id="node-<?php print $node->nid;?>" class="node page node-page">
				<div class="section">
					<div class="wysiwyg">			
						<h3><?php print $reason;?></h3>
						<p class="intro_text">
							Please view our event listing for information about other events and seminars.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
