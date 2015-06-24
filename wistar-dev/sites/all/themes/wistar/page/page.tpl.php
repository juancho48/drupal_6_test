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
			&nbsp;
		</div>
		<div id="content_container">
			<div id="content_elements">
				<div id="main_content">
					<?php if($tabs):?>
					<div class="tab_container">
						<?php print $tabs; ?>
					</div>
					<?php endif; ?>
					<?php print $content; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php print theme('wistar_page_footer', $messages, $closure, true, wistar_theme_get_alert()); ?>
