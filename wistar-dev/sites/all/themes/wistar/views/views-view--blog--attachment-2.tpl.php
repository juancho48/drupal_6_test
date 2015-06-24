<div class="list_filters">
	<ul>
		<li>
			<?php $base = '/wistar-today/wistar-wire/archive/'; ?>
			<span>Blog Archive</span>
			<ul>
				<li>
					<a href="/wistar-today/wistar-wire">View All</a>		
				</li>
				<?php foreach($view->result as $idx=>$result): ?>
					<li>
						<a href="<?php print $base . $result->node_data_field_post_date_field_post_date_value; ?>">
							<?php print $result->node_data_field_post_date_field_post_date_value . ' Archive'; ?>
						</a>
					</li>	
				<?php endforeach; ?>
			</ul>
		</li>
	</ul>
</div>
