<div class="gallery_container">
  <div class="images_container">
  <?php foreach ( $images as $idx => $image ): ?>
    <div class="image_element image_element_<?php print $idx; ?>" rel="<?php print file_force_create_url($image['filepath']) . '?download=1';?>">
      <?php print theme('imagecache', 'album_full', $image['filepath']); ?>
      <div class="desc">
      <?php print $image['data']['description']; ?>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
  <div class="gallery_controls">
    <span class="gallery_control prev"><span class="arrow">&lt;</span>Previous</span>
    <div class="gallery_position">Image <span class="current">1</span> of <?php print count($images); ?></div>
    <span class="gallery_control next">Next<span class="arrow">&gt;</span></span>
  </div>
  <div class="thumbs_container">
    <?php foreach ( $images as $idx => $image ): ?>
      <?php
        $thumb_element_classes = array( 'thumb_element', 'thumb_element_' . $idx );
        if ( ($idx + 1) % $thumbs_per_row == 0 ) $thumb_element_classes[] = 'thumb_element_end_row';
        if ( $idx == 0 ) $thumb_element_classes[] = 'active';
      ?>
      <div class="<?php print join(' ', $thumb_element_classes); ?>">
        <?php print theme('imagecache', $thumb_preset, $image['filepath']); ?>
        <div class="thumb_element_indicator"></div>
      </div>
    <?php endforeach; ?>    
  </div>
  <div class="notice">
    <?php print $notice; ?>
  </div>
</div>
<script type="text/javascript">
	//<![CDATA[
	$(function() {
	  	// trigger an update to set up the download button
	  	update_gallery(0, '.content');		
	  	
		$('.thumb_element').click(function(){
		  var $container = $(this).parents('.gallery_container');	
		  var idx = $('.thumb_element', $container).index($(this));
		  update_gallery(idx, $container);		
		});			
	
		$('.gallery_controls span').click(function() {			    	
			var offset = 1;
			if($(this).hasClass('prev')){
			  offset = -1;
			}

			var $container = $(this).parents('.gallery_container');

			var total_images = $('.image_element', $container).length;			
			var cur_idx = $('.thumb_element', $container).index($('.thumb_element.active', $container));
			var new_idx = cur_idx + offset;			

			if(new_idx < 0){
			  new_idx = (total_images - 1);
			}
			else if(new_idx >= total_images){
			  new_idx = 0;
			}

			update_gallery(new_idx, $container);									
		});			

		function update_gallery(idx, $container){
			change_active_thumb(idx, $container);	
			change_current_image(idx, $container);
		}

		function change_current_image(idx, $container){
			$('.image_element', $container).hide();
			var $img_elem = $('.image_element', $container).eq(idx);
			$img_elem.show();
			$('a.download').attr('href', $img_elem.attr('rel'));
			$('.gallery_position .current').html(idx + 1);
		}

		function change_active_thumb(idx, $container){
			$('.thumb_element', $container).removeClass('active');
			$('.thumb_element', $container).eq(idx).addClass('active');		
		}		
	});
	//]]>
</script>
