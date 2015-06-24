<?php $newsletter_article_reference = ''; ?>
<?php if(!empty($row->nid)) $newsletter_article_reference = wistar_select_newsletter_article_reference($row->nid); ?>
<?php if(!empty($newsletter_article_reference)): ?>
	<?php $output = str_replace('<a ', '<a class="more" ', $output); ?>
	<?php $output = str_replace('</a>', '<span class="more_arrow">&gt;</span></a>', $output); ?>
	<?php print $output; ?>
<?php endif; ?>