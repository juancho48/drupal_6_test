<div id="tools_container">
	<div id="tools_elements">
		<div id="slide_nav_tabs_container">
			<div id="slide_nav_tabs_elements">
				<ul id="slide_nav_tabs">
					<li id="find_a_scientist" class="tab"><a href="#">Find a Scientist<span class="close">&nbsp;x</span></a></li>
					<li id="technology_transfer" class="tab"><a href="/technology-transfer">Technology Transfer<span class="close">&nbsp;x</span></a></li>
				</ul>
			</div>
		</div>
		<div id="primary_search_container">
			<div id="primary_search">
				<?php $block = module_invoke('search', 'block', 'view'); ?>				
				<?php print $block['content']; ?>
			</div>
		</div>
	</div>
</div>
