<script type="text/javascript">
	$(function() {
		$('#quicklinks').tabSlideOut({
			tabHandle: '.qlhandle',                              
			pathToTabImage: '<?php echo base_path() ?>sites/all/themes/wistar/images/layout/quick_links_tab.jpg', 
			pathToTabImageOpen: '<?php echo base_path() ?>sites/all/themes/wistar/images/layout/quick_links_tab_open.jpg', 
			imageHeight: '147px',
			imageWidth: '45px',  
			tabLocation: 'right',
			speed: 300,        
			action: 'click',    
			topPos: '448px',
			innerContentWidth: '200px',
			fixedPosition: false
		});
		
		$('#quicklinks .expanded > a').click(function(e){
			e.preventDefault();
			var $ul = $(this).next('ul');

			if( $('.open', '#quicklinks').length > 0 && $ul.hasClass('open') ) {
				$ul.removeClass('open');
				$ul.slideUp(500);
			}
			else {
				// close others
				$('.open', '#quicklinks').not($ul).each(function(){
					$(this).removeClass('open');
					$(this).slideUp(500);
				});

				$ul.addClass('open');
				$ul.slideDown(500);									
			}
		});	
	});
</script>
<div id="quicklinks">
    <a class="qlhandle" href="#">&nbsp;</a>
    <div class="sliding_tab_inner">
		<?php 
			$sec_links = menu_tree_all_data('menu-quicklinks-side');
			print menu_tree_output( $sec_links );
		?>
	</div>
</div>
