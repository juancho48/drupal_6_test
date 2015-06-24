<?php print theme('wistar_page_head', $head_title, $head, $meta, $scripts, $styles, $body_classes, false, null); ?>
<div id="header_container">
	<div id="header_elements">
		<?php print theme('wistar_logo');?>
		<?php print theme('wistar_nav');?>
		<?php print theme('wistar_tools');?>
	</div>
</div>		
<script type="text/javascript">
	$(function(){
		jQuery.easing.def = "easeInOutQuint";
		var step = 400;
		var timeline_width = $('#timeline').width();
		var max_left_offset = 0 - (parseInt(timeline_width)) + parseInt($(window).width());
		var min_left_offset = 0;
		
		var offsets = [0, -1775, -2800, -4075];
		$('.timeline_navigation a').click(function(e) {
			e.preventDefault();
			var idx = $(this).attr('rel');
			var new_offset = offsets[idx].toString() + 'px';

			$('.active', '.timeline_navigation').removeClass('active');
			$(this).addClass('active');

			$('#timeline_stage').animate({'marginLeft': new_offset }, 600);
			return false;
		});
		
		$('.arrow.prev').click(function() {
			var left = $('#timeline_stage').css('marginLeft');
			cur_left = parseInt(left);
						
			if(cur_left <= min_left_offset) {
				if(Math.abs(cur_left) > step) {
					var new_offset = (cur_left + step);
				}
				else {
					var new_offset = 0;
				}
				updateActive(new_offset, offsets);
				$('#timeline_stage').animate({'marginLeft': new_offset.toString() + 'px' }, 300);
			}
		});

		$('.arrow.next').click(function() {
			var left = $('#timeline_stage').css('marginLeft');
			cur_left = parseInt(left);
			
			if(cur_left > max_left_offset) {
				if((cur_left - step) > max_left_offset) {
					var new_offset = (cur_left - step);
				}
				else {
					var new_offset = max_left_offset;
				}
	
				updateActive(new_offset, offsets);			
				$('#timeline_stage').animate({'marginLeft': new_offset.toString() + 'px' }, 300);			
			}
		});
		
		function updateActive(new_offset, offsets) {
			for(var i = 0; i < offsets.length; i++) {
				var val = offsets[i];
				if(Math.abs(new_offset) >= Math.abs(val)) {
					$('.active', '.timeline_navigation').removeClass('active');				
					$('.timeline_navigation a').eq(i).addClass('active');
				}		
			}
		}
	});
</script>			
<div id="page_container">
	<div id="page_elements">
		<div id="timeline_container">
			<div id="timeline_elements">
				<div id="timeline_breadcrumbs">
					<a class="back_link" href="/the-institute"><span class="back_arrow"><</span>Back To The Institute</a>
					<div class="breadcrumbs">
						<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
					</div>
				</div>
				<div id="timeline_header_container">
					<div id="timeline_header_elements">
						<div class="timeline_title">&nbsp;</div>
						<div class="timeline_navigation">
							<ul>
								<li><a rel="0" href="#" class="active">1892 <span class="more_arrow">></span></a></li>
								<li><a rel="1" href="#">1910 <span class="more_arrow">></span></a></li>
								<li><a rel="2" href="#">1962 <span class="more_arrow">></span></a></li>
								<li><a rel="3" href="#">1980 <span class="more_arrow">></span></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div id="timeline_stage">
					<?php print theme('wistar_timeline')?>
				</div>
			</div>
			<div class="arrow prev"></div>
			<div class="arrow next"></div>
		</div>
	</div>
</div>
<?php print theme('wistar_page_footer', $messages, $closure); ?>
