<li class="menu_tab node <?php print wistar_get_node_section_classes($node); ?>" id="node-<?php print $node->nid; ?>">
	<?php if( $node->field_menu_tab_parent[0]['nid'] && is_numeric($node->field_menu_tab_parent[0]['nid']) ): ?>
		<?php $parent = node_load($node->field_menu_tab_parent[0]['nid']); ?>
		<?php $url = base_path() . $parent->path; ?>
	<?php else: ?>
		<?php $url = base_path(); ?>
	<?php endif; ?>
	<a href="<?php print $url;?>" class="menu_anchor"><?php print $node->title?></a>
	<ul class="submenu">
		<li class="column_container">
			<div class="left">
				<?php if( isset($node->field_menu_tab_left_heading[0]['safe']) && $node->field_menu_tab_left_heading[0]['safe'] ): ?>
					<h3><?php print $node->field_menu_tab_left_heading[0]['safe']?></h3>
				<?php endif; ?>
				<?php foreach(range(0,3) as $idx):?>
					<?php if( isset($node->field_menu_tab_left_link[$idx]['url']) ): ?>
					<a class="menu_link" href="/<?php print $node->field_menu_tab_left_link[$idx]['url'];?>">
						<?php if( isset($node->field_menu_tab_left_image[$idx]['filepath']) ): ?>
						<img src="/<?php print $node->field_menu_tab_left_image[$idx]['filepath'];?>" alt="<?php print $node->field_menu_tab_left_image[$idx]['data']['alt'];?>" />
						<div class="menu_link_title">
							<?php print $node->field_menu_tab_left_link[$idx]['title'];?>
						</div>
						<?php endif; ?>
					</a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="right">
				<?php if( isset($node->field_right_column[0]['safe']) && $node->field_right_column[0]['safe'] ): ?>
					<h3><?php print $node->field_right_column[0]['safe']?></h3>
				<?php endif; ?>
				<div class="links">
					<?php foreach(range(0,count($node->field_menu_tab_right_link)) as $idx):?>
						<?php if(isset($node->field_menu_tab_right_image[$idx]['filepath']) && $node->field_menu_tab_right_image[$idx]['filepath']): ?>
							<a class="menu_link_image" href="/<?php print $node->field_menu_tab_right_link[$idx]['url'];?>">
								<img src="/<?php print $node->field_menu_tab_right_image[$idx]['filepath'];?>" alt="<?php print $node->field_menu_tab_right_image[$idx]['data']['alt'];?>" />
							</a>
						<?php else: ?>
							<a class="menu_link" href="/<?php print $node->field_menu_tab_right_link[$idx]['url'];?>">
								<?php print $node->field_menu_tab_right_link[$idx]['title']; ?>
							</a>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</li>
	</ul>
</li>
