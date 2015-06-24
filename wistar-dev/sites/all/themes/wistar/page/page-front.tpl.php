<?php print theme('wistar_page_head', $head_title, $head, $meta, $scripts, $styles, $body_classes); ?>
<div id="header_container">
	<div id="header_elements">
		<?php print theme('wistar_logo');?>
		<?php print theme('wistar_nav');?>
		<?php print theme('wistar_tools');?>
	</div>
</div>					
<div id="page_container">
	<div id="page_elements">
		<div id="content_head_container">
			<?php if($homepage): ?>
				<?php print theme('wistar_home_masthead_carousel', $homepage); ?>
			<?php endif?>
		</div>
		<div id="content_container" class="<?php if($homepage): ?>with_carousel<?php endif;?>">
			<div id="content_elements">
				<div id="main_content">	
					<div class="node" id="node-<?php print $homepage->nid?>">				
					<div class="callout_container set_of_4" style="margin-top: 0;">
						<?php foreach( range(0,3) as $idx ): ?>
							<?php 
								$class = ($idx == 3) ? 'last' : '';
								$links = array(
									$homepage->field_callout_menu_link1[$idx], 
									$homepage->field_callout_menu_link2[$idx], 
									$homepage->field_callout_menu_link3[$idx]
								);

								$callout =  theme('wistar_callout_home',
									$homepage->field_home_callout_title[$idx]['value'],
									$homepage->field_home_callout_image[$idx]['filepath'],
									$homepage->field_home_callout_text[$idx]['value'],
									array(
										'class' => $class, 
										'imagecache' => 'callout_set_of_4', 
										'index' => $idx,
										'links' => $links
									)
								);
								if (strpos($callout,'[sign up form]') !== false) {
									$form = '<div class="sign_up">'.theme('wistar_sign_up_form').'</div>';
									$callout = str_replace('[sign up form]','',$callout);
									$callout = str_replace('<div class="callout_box_links lime">','<div class="callout_box_links form">'.$form,$callout);
								}
								
								print $callout;
							?>
						<?php endforeach;?>
					</div>
					<div id="wistar_wire_container">
						<div id="wistar_wire_elements">
							<div class="main_column">
								<h3 class="with_borders with_plus">From the Wistar Wire</h3>
								<?php print views_embed_view('wistar_wire', 'block_1'); ?>
							</div>
							<div class="side_column">
								<?php if( $quicktabs ): ?>
									<?php print $quicktabs; ?>
								<?php endif; ?>
								<?php 
									$callout =  theme('wistar_callout_home_video', $homepage);
									print $callout;													
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php print theme('wistar_page_footer', $messages, $closure, true, wistar_theme_get_alert()); ?>
