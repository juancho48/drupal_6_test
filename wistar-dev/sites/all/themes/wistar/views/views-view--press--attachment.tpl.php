<ul>
	<li>
		<a href="/news-and-media/press-releases">View All</a>		
	</li>
	<?php foreach($view->result as $idx=>$result): ?>
		<li>
			<a href="<?php print $result->url; ?>">
				<?php print $result->node_data_field_press_date_field_press_date_value . ' News Releases'; ?>
			</a>
		</li>	
	<?php endforeach; ?>
</ul>
