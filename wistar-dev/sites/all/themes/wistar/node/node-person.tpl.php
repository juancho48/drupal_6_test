<?php print theme('breadcrumb', drupal_get_breadcrumb( )); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 4);?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $node);?>
			<div id="node-<?php print $node->nid;?>" class="node scientist node-scientist scientist_detail_container">
				<div class="section">
					<div class="bio_container">
						<div class="bio_elements">
							<div class="bio_picture">
								<img src="/<?php print $node->field_profile_picture[0]['filepath'];?>" alt="<?php print $node->title;?>"/>
							</div>
							<div class="bio_body">
								<h2><?php print $node->title; ?></h2>
								<?php if(count($node->field_professional_title) && $node->field_professional_title[0]['value'] ): ?>
									<ul class="professional_titles">
									<?php foreach($node->field_professional_title as $idx => $ptitle): ?>
										<li><?php print $ptitle['value']; ?></li>
									<?php endforeach;?>
									</ul>
								<?php endif; ?>
								<?php if(count($node->field_contact_information) && $node->field_contact_information[0]['value'] ): ?>
									<ul class="bio_list contact_information">
									<?php foreach($node->field_contact_information as $idx => $info): ?>
										<li><?php print $info['value']; ?></li>
									<?php endforeach;?>
									</ul>
								<?php endif; ?>								
							</div>
						</div>
					</div>
					<div class="section_container">
						<div class="section_elements">
							<?php foreach($node->field_section_name as $idx => $name): ?>
								<div class="section">
									<div class="section_name"><?php print $name['value']; ?></div>
									<div class="section_content">
										<?php print $node->field_section_content[$idx]['value']; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
