<div class="post_share">
	<ul>
		<li class="target">
			<a href="#" class="anchor">Share<span>&nbsp;</span></a>
			<ul>
				<li class="facebook"><a href="https://www.facebook.com/sharer.php?u=<?php print url('node/' . $nid, array('absolute' => true));?><?php if($title):?>&t=<?php print $title?><?php endif;?>">Facebook</a></li>
				<li class="twitter"><a href="http://twitter.com/home?status=<?php print url('node/' . $nid, array('absolute' => true));?>">Twitter</a></li>			
			</ul>
		</li>
	</ul>
</div>			

