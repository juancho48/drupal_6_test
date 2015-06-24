<script type="text/javascript">
//<![CDATA[
	$(function() {
		if($('body').hasClass('our-science')) {
			var selector = '.tabs > .tab_set > div > .menu > li.expanded';
			var $scope = $(selector);
			var $handles = $(selector + ' > a');
		
			// apply the open class to the active-trail
			$('.tab_set > div > ul > li.active-trail > ul').addClass('open');
		
			$handles.click(function(e){
				e.preventDefault();
				var $ul = $(this).next('ul');			
				if( !($('.open', $scope).length > 0 && $ul.hasClass('open')) ) {
					// close others
					$('.open', $scope).each(function(){
						$(this).removeClass('open');
						$(this).slideUp(100);
					});

					$ul.addClass('open');
					$ul.slideDown(100);
				}
			});	
		}
	});
//]]>
</script>
<div class="tabs">
	<?php $bid = $bid ? $bid : WISTAR_MENU_BLOCK_ID;?>
	<?php $menu = module_invoke('menu_block', 'block', 'view', $bid); ?>
	<div class="tab_set">
		<?php print $menu['subject'];?>
		<?php print $menu['content'];?>
	</div>			
</div>
