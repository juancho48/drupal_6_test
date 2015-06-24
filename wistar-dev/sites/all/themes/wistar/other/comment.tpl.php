<?php 
	$date = $comment->timestamp;
	//$date = strtotime($date);
	$date_day = date('F d, Y', $date);
	$date_time = date('g\:i A', $date);
	//pa($date_day,1);
?>
<div class="comment<?php print ($comment->new) ? ' comment-new' : ''; print ' '. $status ?> clear-block">
	<div class="comment_title">
		<span class="comment_author">
			<?php print str_replace(' (not verified)','',$author); ?>
		</span>
		<span class="comment_datetime">
			<?php print "{$date_day} at {$date_time}";?>
		</span>
	</div>
	<div class="comment_body">
	    <?php print $content ?>	
	</div>	
</div>
