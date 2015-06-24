<?php 
	$message = wistar_event_get_message_from_registration($registration);
?>
<?php print theme('imagecache', 'page_masthead_image', $proxy->field_masthead_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 14);?>
		<div class="content">			
			<?php print theme('wistar_content_heading', null, 'Thank You for Registering');?>
			<div id="node-<?php print $proxy->nid;?>" class="node page node-page">
				<div class="section">
					<div class="progress">
						<?php print wistar_theme_donation_progress_bar(1, array('Event Registration', 'Confirmation')); ?>
					</div>
					<div class="intro_text">					
						<?php print nl2br($message); ?>
					</div>
				</div>
				<div class="section grey">					
					<div class="transaction_details">
						<?php if(isset($_REQUEST['txn_id'])):?>
							<p>
								Your Transaction ID: <strong><?php print check_plain($_REQUEST['txn_id']);?></strong>
							</p>
						<?php endif;?>
						<?php if(isset($_REQUEST['payment_status'])):?>
							<p>
								Payment Status: <strong><?php print check_plain($_REQUEST['payment_status']);?></strong>
							</p>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
