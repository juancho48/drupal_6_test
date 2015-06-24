<script type="text/javascript">
	$(function() {
		$('#alert').tabSlideOut({
			tabHandle: '#alert > .ahandle',                              
			pathToTabImage: '/sites/all/themes/wistar/images/layout/weather_alert_tab.jpg', 
			pathToTabImageOpen: '/sites/all/themes/wistar/images/layout/weather_alert_tab_open.jpg', 
			imageHeight: '45px',
			imageWidth: '45px',  
			tabLocation: 'right',
			speed: 300,        
			action: 'click',    
			topPos: '400px',
			innerContentWidth: '325px',
			fixedPosition: false
		});		
	});
</script>
<div id="alert">
    <a class="ahandle" href="#">&nbsp;</a>    
    <div class="sliding_tab_inner">
		<div class="alert_title">
			<?php print $alert->title; ?>
		</div>
		<div id="node-<?php print $alert->nid;?>" class="node alert-node alert_content wysiwyg">
			<?php print $alert->body;?>
			<?php if($alert->field_alert_link[0]['url']):?>
				<br />
				<?php print theme('wistar_read_more', $alert->field_alert_link[0]['title'], $alert->field_alert_link[0]['url']);?>
			<?php endif;?>
		</div>
	</div>
</div>
