<?php $donation_confirmation = drupal_get_form('wistar_donation_confirmation_page'); ?>
<div id="init-give-forms"></div>
<img width="975" height="325" src="<?php print file_create_url('sites/default/files/imagecache/page_masthead_image/page_masthead_images/header_2_0_0.jpg'); ?>">
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs'); ?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node); ?>
			<div id="node-<?php print $node->nid; ?>" class="node page node-page">
				<div class="section">
					<?php print theme('status_messages'); ?>
					<?php print $donation_confirmation; ?>
				</div>
			</div>
		</div>
	</div>
</div>
