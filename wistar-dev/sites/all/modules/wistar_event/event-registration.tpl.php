<script type="text/javascript">
	$(function() {
		$('label').inFieldLabels();
		$('label').each(function() { 
			$(this).html($(this).html().replace(':', '')); 
		});				
		
		$('#edit-ticket').change(function(e) {
			var idx = $(this).val();
			$('.selected', '.ticket-descriptions').removeClass('selected');

			var selector = '#ticket-description-' + idx;
			if($(selector).length > 0) {
				$(selector).addClass('selected');
			}
		});
		
		$('.ticket-description-wrapper').click(function(e) {
			var id = $(this).attr('id');
			//var idx = id.substr(id.length -1, id.length);
			var idx = id.replace('ticket-description-','');
			$('#edit-ticket').val(idx).trigger('change');
			
		});
	});
</script>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 14);?>
		<div class="content">			
			<?php print theme('wistar_content_heading', $event, 'Registration: ' . $event->title);?>
			<div id="node-<?php print $node->nid;?>" class="node page node-page">
				<div class="section">
					<div class="wysiwyg">			
						<?php print drupal_get_form('wistar_event_registration_form', $event); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
