<?php
	$technology_tags_vid = 4;
	$technology_section_vid = 5;
	$technology_tags = array();
	if(count($node->taxonomy)) {
		foreach($node->taxonomy as $tid => $term) {
			if($term->vid == $technology_tags_vid) {
				$technology_tags[] = $term->name;
			}
			if($term->vid == $technology_section_vid) {
				$technology_section = $term->name;
				menu_set_active_item('technology-transfer/technologies/' . strtolower(preg_replace('/[^A-Za-z0-9]/', '-', $technology_section)));
			}
		}
	}

	$sections = array();
	
	if(count($node->field_technology_inventor_ref)) {
		foreach($node->field_technology_inventor_ref as $idx => $ref) {
			$sections['Inventor(s)'] .= '<div>'	. $ref['view'] . '</div>';
		}
	}
		
	if(isset($node->field_technology_inventors[0]['safe']) && $inventors = $node->field_technology_inventors[0]['safe']) {
		$sections['Inventor(s)'] .= $inventors;
	}
	
	$sections['Tech ID'] = (isset($node->field_technology_id[0]['safe']) && $id = $node->field_technology_id[0]['safe']) ? $id : null;
	$sections['Background'] = (isset($node->field_technology_background[0]['safe']) && $background = $node->field_technology_background[0]['safe']) ? $background : null;
	$sections['Description'] = (isset($node->field_technology_description[0]['safe']) && $description = $node->field_technology_description[0]['safe']) ? $description : null;
	$sections['Origin'] = (isset($node->field_technology_origin[0]['safe']) && $origin = $node->field_technology_origin[0]['safe']) ? $origin : null;
	$sections['Reactivity'] = (isset($node->field_technology_reactivity[0]['safe']) && $reactivity = $node->field_technology_reactivity[0]['safe']) ? $reactivity : null;	
	$sections['Clinical Studies'] = (isset($node->field_technology_studies[0]['safe']) && $studies = $node->field_technology_studies[0]['safe']) ? $studies : null;	
	$sections['Key Words'] = count($technology_tags) ? implode(', ', $technology_tags) : null;
	$sections['Isotope'] = (isset($node->field_technology_isotope[0]['safe']) && $isotope = $node->field_technology_isotope[0]['safe']) ? $isotope : null;
	$sections['Applications and Advantages'] = (isset($node->field_technology_advantages[0]['safe']) && $advantages = $node->field_technology_advantages[0]['safe']) ? $advantages : null;
	$sections['Intellectual Property Status'] = (isset($node->field_technology_status[0]['safe']) && $status = $node->field_technology_status[0]['safe']) ? $status : null;
	$sections['Licensing Opportunity'] = (isset($node->field_technology_licensing[0]['safe']) && $licensing = $node->field_technology_licensing[0]['safe']) ? $licensing : null;
	$sections['Relevant Publication(s)'] = (isset($node->field_technology_publications[0]['safe']) && $publications = $node->field_technology_publications[0]['safe']) ? $publications : null;	
	
?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 11);?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node technology node-technology">
				<div class="section_container">
					<div class="section_elements">
					<?php $extra = ' first'; ?>
					<?php foreach($sections as $name => $content): ?>
						<?php if($content): ?>
						<div class="section<?php print $extra; $extra = '';?>">
							<div class="section_name"><?php print $name; ?></div>
							<div class="section_content">
								<?php print $content; ?>
							</div>						
						</div>				
						<?php endif; ?>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
