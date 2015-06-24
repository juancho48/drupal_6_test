<?php if(!empty($node->field_masthead_image[0])): ?>
<?php print theme('imagecache', 'page_masthead_image', $node->field_masthead_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php endif; ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 10);?>
		<div class="content">			
			<?php print theme('wistar_content_heading', null, 'Thank You for your Donation');?>
			<div id="node-<?php print $node->nid;?>" class="node page node-page">
				<div class="section">
					<div class="progress">
						<?php print wistar_theme_donation_progress_bar(1)	?>
					</div>
					<div class="intro_text">					
						<?php print $node->field_body[0]['value']; ?>
					</div>
				</div>
				<div class="section grey">
					<div class="transaction_details">
						<?php if(isset($_GET['tx'])):?>
							<p>
								Your Transaction ID: <strong><?php print check_plain($_GET['tx']);?></strong>
							</p>
						<?php endif;?>
						<?php if(isset($_GET['st'])):?>
							<p>
								Status: <strong><?php print check_plain($_GET['st']);?></strong>
							</p>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
