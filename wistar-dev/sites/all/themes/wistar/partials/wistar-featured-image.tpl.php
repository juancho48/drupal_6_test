<?php if($node->nid && $node->status > 0):?>
<script type="text/javascript">
	$(function() {
		$('#featured_image').tabSlideOut({
			tabHandle: '#featured_image > .ahandle',                              
			pathToTabImage: '/sites/all/themes/wistar/images/layout/iotw_tab.jpg', 
			pathToTabImageOpen: '/sites/all/themes/wistar/images/layout/iotw_tab_open.jpg', 
			imageHeight: '45px',
			imageWidth: '45px',  
			tabLocation: 'right',
			speed: 300,        
			action: 'click',    
			topPos: '352px',   
			innerContentWidth: '325px',
			fixedPosition: false,
			onOut: function() {
				var $div = $('#page_container');
				if($.browser.msie) {
					$('#page_elements, #content_head_container').css('margin-left', "-10000000px");
				}
				else {
					$div.animate({opacity: 0.0}, 400);			
				}
			},
			onIn: function() {
				var $div = $('#page_container');
				if($.browser.msie) {
					$('#page_elements, #content_head_container').css('margin-left', "auto");
				}
				else {
					$div.animate({opacity: 1.0}, 400);				
				}
			}
		});		
	});
</script>
<div id="featured_image">
    <a class="ahandle" href="#">&nbsp;</a>    
    <div class="sliding_tab_inner">
		<div class="image_title">
			<?php print $node->title; ?>
		</div>
		<div id="node-<?php print $node->nid;?>" class="node featured_image-node featured_image_content wysiwyg">
			<?php if($node->field_featured_image_thumb[0]['filepath']):?>
				<?php print theme('imagecache', 'featured_image_thumb', $node->field_featured_image_thumb[0]['filepath']); ?>
			<?php endif; ?>
			<?php print $node->body;?>
			<?php if($node->field_gallery_link[0]['url']):?>
				<br />
				<div class="featured_link_wrapper">
					<?php $url = url($node->field_gallery_link[0]['url']); ?>
					<?php print theme('wistar_read_more', $node->field_gallery_link[0]['title'], $url);?>
				</div>
			<?php endif;?>
		</div>
	</div>
</div>
<?php endif;?>
