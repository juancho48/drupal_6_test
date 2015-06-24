<?php
	if( isset($custom_title) && $custom_title != '' ) {
		$title = $custom_title;
	}
	else if( isset($node->field_content_heading[0]['value']) && $node->field_content_heading[0]['value'] ) {
		$title = $node->field_content_heading[0]['value'];
	}
	else {
		$title = $node->title;
	}
?>
<h3 class="with_borders"><?php print $title; ?></h3>
