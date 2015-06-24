<div id="nav_container">
	<div id="nav_elements">
		<div id="secondary_nav_container">
			<?php
				// TODO: we have to print this menu manually, as the default 
				// $secondary_links variable is not fully loaded (lacks children)
				$sec_links = menu_tree_all_data('secondary-links');
				print menu_tree_output( $sec_links );
			?>
		</div>
		<div id="primary_nav_container">
			<ul id="primary_nav">
				<?php // TODO: rendering manually for now ?>
				<?php $node = node_load(1);?>
				<?php print node_view($node);?>
				<?php $node = node_load(2);?>											
				<?php print node_view($node);?>
				<?php $node = node_load(3);?>
				<?php print node_view($node);?>
			</ul>
		</div>
	</div>
</div>

