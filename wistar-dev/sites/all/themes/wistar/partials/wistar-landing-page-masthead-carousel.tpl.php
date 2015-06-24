<?php if(count($node->field_callout_main_text) > 1): ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#landing_page_masthead_carousel_elements').jCarouselLite({
				circular: true,
				visible: 1,
				scroll: 1,
				speed: 800,
				btnNext: ".next",
				btnPrev: ".prev",
				easing: "swing"
			});
		});
	</script>
<?php endif; ?>
<?php $list_output = ''; ?>
<?php if(!empty($node->field_callout_main_text)): ?>
	<?php foreach( range(0, count($node->field_callout_main_text) - 1 ) as $idx ):?>
		<?php 
		if (!empty($node->field_callout_main_text[$idx]['safe']) || 
			!empty($node->field_callout_body_text[$idx]['safe']) || 
			!empty($node->field_callout_link[$idx]['url']) || 
			!empty($node->field_callout_link_image[$idx]['filepath'])):
		?>
			<?php 
				$list_output .= '<li>';
				$list_output .= 	'<div class="callout_header single" style="width: 989px;">';
				$list_output .= 		'<div class="callout_main_text">';
				if (!empty($node->field_callout_main_text[$idx]['safe'])) {
					$list_output .= 		'<h2>' . $node->field_callout_main_text[$idx]['safe'] . '</h2>';
				}
				if (!empty($node->field_callout_body_text[$idx]['safe'])) {
					$list_output .= 		'<p>' . $node->field_callout_body_text[$idx]['safe'] . '</p>';
				}
				
				$link = $node->field_callout_link[$idx];
				if (!empty($link['url'])) {
					$list_output .= 		'<a href="' . url($link['url']) . '" class="more"';
												if($link['attributes']['target']) {
					$list_output .= 				' target="' . $link['attributes']['target'] . '"';
												}
					$list_output .= 		'>'. $link['display_title'] . '<span class="more_arrow">&gt;</span></a>';
				}
				$list_output .= 		'</div>';
				$list_output .= 		'<div class="callout_body">';
				if ($node->field_callout_link_image[$idx]['filepath']) {
					$list_output .= 		'<div class="single_container">';
					$list_output .= 			'<div class="image_link">';
					$list_output .= 				theme('imagecache', 'callout_header_body_image', $node->field_callout_link_image[$idx]['filepath']);
					$list_output .= 			'</div>';
					$list_output .= 		'</div>';
				}
				$list_output .= 		'</div>';
				$list_output .= 	'</div>';
				$list_output .= '</li>';
			?>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php if (!empty($list_output)): ?>
		<div id="landing_page_masthead_carousel_container">
			<?php // HACKS - make IE7 stop being an asshole ?>
			<div id="landing_page_masthead_carousel_elements" style="width: 10000px;">
				<ul id="landing_page_masthead_carousel" style="width: 100000px; height: 433px;">
					<?php print $list_output; ?>
				</ul>
			</div>
			<?php if(count($node->field_callout_main_text) > 1): ?>
				<div class="arrow prev"></div>
				<div class="arrow next"></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
<?php endif; ?>
