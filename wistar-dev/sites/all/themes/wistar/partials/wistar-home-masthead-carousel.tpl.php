<div id="home_masthead_carousel_container">
	<div id="home_masthead_carousel_elements">
		<div class="sliver sliver_left">
			<?php $idx = 2; ?>
			<?php print theme('imagecache', 'desat', $node->field_home_masthead_image[$idx]['filepath'])?>
		</div>
		<ul id="home_masthead_carousel">
			<?php foreach( range(0,3) as $idx ):?>
		    	<li class="slide-<?php print $idx; ?><?php if($idx == 0) echo ' active_image';?>">
					<div class="image color">
						<img width="1260px" src="/<?php print $node->field_home_masthead_image[$idx]['filepath'];?>" alt="<?php print $node->field_home_masthead_title[$idx]['value'];?>" />				
					</div>
		    		<div class="image desat">
		    			<?php $attr = array(); ?>
		    			<?php if($idx==0):?><?php $attr['style'] = "opacity: 0;filter: alpha(opacity=0);";?><?php endif;?>
						<?php print theme('imagecache', 'desat', $node->field_home_masthead_image[$idx]['filepath'], 'Wistar', 'Wistar', $attr)?>		    		
		    		</div>
					<div class="overlay_contents">
						<h1><?php print $node->field_home_masthead_title[$idx]['value'];?></h1>
						<p>
							<?php print $node->field_home_masthead_body[$idx]['value'];?>
							<br />
							<?php print theme('wistar_read_more', $node->field_home_masthead_link[$idx]['title'], $node->field_home_masthead_link[$idx]['url']); ?>
						</p>	
					</div>
				</li>				
			<?php endforeach; ?>
		</ul>
		<div class="sliver sliver_right">
			<?php $idx = 1; ?>
			<?php print theme('imagecache', 'desat', $node->field_home_masthead_image[$idx]['filepath'])?>
		</div>
		<div class="slide_body_container">
			<div class="slide_body_elements"></div>
			<div class="indicators">
				<?php foreach( range(0,3) as $subidx ):?>						
					<a href="#" class="indic-<?php print $subidx;?> <?php print ($subidx === 0) ? 'active' : 'inactive' ;?>">&nbsp;</a>
				<?php endforeach; ?>			
			</div>
		</div>
	</div>
	<div class="arrow prev"></div>
	<div class="arrow next"></div>
</div>

