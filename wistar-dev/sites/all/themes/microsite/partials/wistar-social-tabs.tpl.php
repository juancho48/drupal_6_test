<div id="social_tab_container">
	<div id="social_tab_elements" class="secondary_nav">
		<ul>
			<li class="tab">
				<span class="label">Share:</span>
				<a href="https://www.facebook.com/sharer.php?u=<?php print url('node/' . $node->nid, array('absolute' => true));?>" class="fb"></a><a href="https://twitter.com/home?status=<?php print url('node/' . $node->nid, array('absolute' => true));?>" class="twitter"></a>
			</li>
		</ul>
	</div>
</div>
