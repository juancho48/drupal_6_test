<div class="callout_header four_up">
	<div class="callout_main_text">
		<h2 class="<?php $main_text ? print 'alt' : print '';?>">
			<?php print $main_text ? $main_text : $node->field_callout_main_text[0]['value']; ?>
		</h2>
		<p>
			<?php print $body_text ? $body_text : $node->field_callout_body_text[0]['value']; ?>
		</p>
	</div>					
	<div class="callout_body">
		<h3 class="with_borders">Research Areas</h3>
		<div class="four_up_container <?php if( $active && $active != '') print 'has_active'; ?>">
			<?php foreach( range(0,3) as $idx ): ?>
				<?php $research_area = node_load( $node->field_research_area[$idx]['nid']); ?>
				<div class="image_link <?php print ($active && $active == wistar_str2class($research_area->title)) ? 'active' : 'inactive' ?>">
					<a class="off" href="/<?php print drupal_get_path_alias('node/' . $research_area->nid);?>">
						<?php print theme('imagecache', 'callout_header_four_up', $node->field_featured_research_image[$idx]['filepath']);?>
						<div class="image_label"><?php print $research_area->title ?></div>
					</a>
					<a class="on" href="/<?php print drupal_get_path_alias('node/' . $research_area->nid);?>">
						<?php print theme('imagecache', 'callout_header_four_up_desat', $node->field_featured_research_image[$idx]['filepath']);?>
						<div class="image_label"><?php print $research_area->title ?></div>
						<div class="overlay">&nbsp;</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>						
</div>

