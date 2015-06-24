<?php if(count($quicklinks)):?>
	<div class="sidebar_container quicklinks_container">
		<div class="quicklinks_elements">
			<h4>Quicklinks</h4>
			<ul>
				<?php foreach($quicklinks as $link):?>
					<li><?php print l($link['title'], $link['url'], $link); ?></li>			
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
<?php endif;?>
