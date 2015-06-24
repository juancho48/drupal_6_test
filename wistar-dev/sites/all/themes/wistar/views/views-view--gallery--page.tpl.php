<?php $proxy = node_load(variable_get('wistar_gallery_proxy_node', 1255));?>
<?php if(isset($proxy->field_masthead_image[0]['filepath']) && $proxy->field_masthead_image[0]['filepath']): ?>
	<?php print theme('imagecache', 'page_masthead_image', $proxy->field_masthead_image[0]['filepath'], '', '', array('style' => 'margin-bottom:10px;')); ?>
<?php endif; ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs'); ?>
		<div id="node-<?php print variable_get('wistar_gallery_proxy_node', 1255); ?>" class="content node gallery_carousel">			
			<h3 class="with_borders"><?php print drupal_get_title();?></h3>
			<div class="node page view">
				<div class="section">
				  <div class="wysiwyg">
				    <?php print $proxy->field_body[0]['value']; ?>
				  </div>
				  <h4>Photo Albums</h4>
			  </div>
			  <div class="section grey">
					<div class="<?php print $classes; ?>">
					  <?php if ($admin_links): ?>
						<div class="views-admin-links views-hide">
						  <?php print $admin_links; ?>
						</div>
					  <?php endif; ?>
					  <?php if ($header): ?>
						<div class="view-header">
						  <?php print $header; ?>
						</div>
					  <?php endif; ?>

					  <?php if ($exposed): ?>
						<div class="view-filters">
						  <?php print $exposed; ?>
						</div>
					  <?php endif; ?>

					  <?php if ($attachment_before): ?>
						<div class="attachment attachment-before">
						  <?php print $attachment_before; ?>
						</div>
					  <?php endif; ?>

					  <?php if ($rows): ?>
					  <span class="gallery_carousel_control gallery_carousel_prev">&nbsp;</span>
						<div class="view-content">
						  <?php print $rows; ?>
						</div>
					  <span class="gallery_carousel_control gallery_carousel_next">&nbsp;</span>						
					  <?php elseif ($empty): ?>
						<div class="view-empty">
						  <?php print $empty; ?>
						</div>
					  <?php endif; ?>

					  <?php if ($pager): ?>
						<?php print $pager; ?>
					  <?php endif; ?>

					  <?php if ($more): ?>
						<?php print $more; ?>
					  <?php endif; ?>

					  <?php if ($footer): ?>
						<div class="view-footer">
						  <?php print $footer; ?>
						</div>
					  <?php endif; ?>

					  <?php if ($feed_icon): ?>
						<div class="feed-icon">
						  <?php print $feed_icon; ?>
						</div>
					  <?php endif; ?>
					</div>
				</div>
				<div class="section">
				  <h4>Videos</h4>				
				  <?php if ($attachment_after): ?>
					<div class="attachment attachment-after">
					  <span class="video_carousel_control video_carousel_prev">&nbsp;</span>					
					  <?php print $attachment_after; ?>
					  <span class="video_carousel_control video_carousel_next">&nbsp;</span>							  
					</div>
				  <?php endif; ?>				
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
//<![CDATA[
      
   $('.view-gallery .item-list').eq(0).jCarouselLite({
      visible:    1,
      circular:   false,
      btnNext:    '.gallery_carousel .gallery_carousel_next',
      btnPrev:    '.gallery_carousel .gallery_carousel_prev'
   });
   
   $('.view-gallery .item-list').eq(1).jCarouselLite({
      visible:    3,
      circular:   false,
      btnNext:    '.attachment-after .video_carousel_next',
      btnPrev:    '.attachment-after .video_carousel_prev'
   });   
    
//]]>
</script>
