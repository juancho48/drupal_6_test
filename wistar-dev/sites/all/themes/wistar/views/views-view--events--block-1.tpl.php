<?php if($rows): ?>
<div class="events_list">
<?php foreach( $view->result as $idx => $event ): ?>
	<?php 
	  $classes = array();
	  if( $idx === 0 ) $classes[] = 'first';
	  if( $idx === (count($view->result) - 1) ) $classes[] = 'last';
  ?>
  <div class="event<?php print ' ' . join(' ', $classes) ?>">
	  <div class="date">
	    <?php print $view->render_field('field_event_date_value', $idx); ?>
	  </div>
	  <div class="title">
      <?php print $view->render_field('title', $idx); ?>
	  </div>
  </div>
<?php endforeach; ?>
</div>
<?php else: ?>
  <?php print $empty; ?>
<?php endif; ?>
<?php if(!empty($footer)): ?>
	<div class="events_footer"><?php print $footer; ?></div>
<?php endif; ?>
