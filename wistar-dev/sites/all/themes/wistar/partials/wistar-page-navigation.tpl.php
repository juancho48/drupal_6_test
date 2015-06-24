<?php $prevnext_type = ''; ?>
<?php if(!empty($node->prevnext_type)): ?>
	<?php $prevnext_type = ' ' . $node->prevnext_type; ?>
<?php endif; ?>
<?php if($node->type == 'newsletter'): ?>
<?php $navigation_options = wistar_page_navigation_newsletter(); ?>
<?php elseif($node->type == 'article'): ?>
<?php $navigation_options = wistar_page_navigation_article($node->field_article_newsletter[0]['nid']); ?>
<?php endif; ?>
<?php foreach($navigation_options as $key=>$option): ?>
	<?php if($option['nid'] == $node->nid): ?>
		<?php $key_prev = $key-1; ?>
		<?php $key_next = $key+1; ?>
		<?php if($key == '0'): ?>
			<?php $prev_nid = ''; ?>
		<?php else: ?>
			<?php $prev_nid = $navigation_options[$key_prev]['nid']; ?>
		<?php endif; ?>
		<?php $next_nid = $navigation_options[$key_next]['nid']; ?>
		<?php $current_last_option = $key; ?>
	<?php endif; ?>
	<?php $last_option = $key; ?>
<?php endforeach; ?>
<?php if(!empty($prev_nid)): ?>
	<a class="prev" href="<?php print base_path().'node/'.$prev_nid; ?>"><span>&lt</span><?php print 'Previous'.$prevnext_type; ?></a>
<?php endif; ?>
<?php if(!empty($next_nid) && $current_last_option <= $last_option ): ?>
	<a class="next" href="<?php print base_path().'node/'.$next_nid; ?>"><?php print 'Next'.$prevnext_type; ?><span>&gt</span></a>
<?php endif; ?>