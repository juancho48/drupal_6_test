$(function() {	
	$('.expandable_list li a.anchor').live('click', function(e) {
		
		e.preventDefault();
		var $li = $(this).closest('li');
		var $content = $li.find('.expandable_content');

		// close others
		if( $('.open').length > 0 && $li.hasClass('open') ) {
			$li.find('.expandable_content').slideUp(500, function(){$li.removeClass('open');});
		}	
		else {
			$('.open', '.expandable_list').not($li).each(function(){
				$(this).removeClass('open');
				$(this).find('.expandable_content').slideUp(500);
			});
			
			$li.addClass('open');
			$content.slideDown(500);							
		}
	});	
})
