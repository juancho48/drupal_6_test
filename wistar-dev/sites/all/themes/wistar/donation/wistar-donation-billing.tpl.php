<?php $donation_billing_form = drupal_get_form('wistar_donation_billing_form'); ?>
<div id="init-give-forms"></div>
<?php if(!empty($node->field_masthead_image[0])): ?>
<?php print theme('imagecache', 'page_masthead_image', $node->field_masthead_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php endif; ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs'); ?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node); ?>
			<div id="node-<?php print $node->nid; ?>" class="node page node-page">
				<div class="section">
					<?php print theme('status_messages'); ?>
					<?php print $donation_billing_form; ?>
				</div>
			</div>
		</div>
	</div>
</div>
