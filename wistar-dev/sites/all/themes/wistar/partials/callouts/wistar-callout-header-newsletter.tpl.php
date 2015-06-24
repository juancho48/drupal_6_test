<div class="callout_header newsletter_callout">
	<div class="callout_body">
		<div class="single_container">
			<div class="image_link">
				<?php if(!empty($node->field_newsletter_callout_image[0]['filepath'])):?>
				<?php $image = theme('imagecache', 'callout_header_body_image', $node->field_newsletter_callout_image[0]['filepath']);?>
				<?php print $image; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="callout_main_text">
		<div class="current-issue"><?php print t('Current Issue'); ?></div>
		<?php if(!empty($node->field_newsletter_date[0]['value'])): ?>
			<div class="publication-date"><?php print $node->field_newsletter_date[0]['value']; ?></div>
		<?php endif;?>
		<h2><?php print $node->title; ?></h2>
		<?php if(!empty($node->body)): ?>
		<div class="content"><?php print $node->body; ?></div>
		<?php endif; ?>
		<?php $node_ref = wistar_select_newsletter_article_reference($node->nid); ?>
		<?php if(!empty($node_ref)): ?>
			<div class="view-node">
				<?php $more_link = l('View Our Current Issue<span class="more_arrow">&gt;</span>', 'node/'.$node->nid, array('html' => 'true')); ?>
				<?php print $more_link; ?>
			</div>
		<?php endif; ?>
		<?php if(!empty($node->field_newsletter_file[0]['filepath'])): ?>
			<?php $file = l('Download the pdf', $node->field_newsletter_file[0]['filepath'], array('absolute'=>TRUE)); ?>
			<?php $file = str_replace('</a>', '<span class="more_arrow">&gt;</span></a>', $file); ?>
			<div class="pdf-file"><?php print $file; ?></div>
		<?php endif; ?>
	</div>							
</div>