<?php menu_set_active_item('news-and-media/focus-magazine'); ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 3);?>
		<?php menu_set_active_item('node/'.$node->nid); ?>
		<div class="content">			
			<div id="content-header">
				<?php print theme('wistar_content_heading', null, t('Focus Magazine'));?>
				<div id="newsletter-navigation">
					<?php $node->prevnext_type = 'newsletter'; ?>
					<?php $navigation = theme('wistar_page_navigation', $node); 
						$navigation = str_replace('newsletter','Issue',$navigation);
						echo $navigation;
					?>
				</div>
			</div>
			<div id="node-<?php print $node->nid; ?>" class="node-page-newsletter node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">
				<div class="section">
					<div class="wysiwyg">	
						<div class="content">
							<?php if(!empty($node->field_newsletter_image[0]['view'])): ?>
								<div class="image"><?php print $node->field_newsletter_image[0]['view']; ?></div>
							<?php endif;?>
							<div class="content-holder">
								<?php if(!empty($node->field_newsletter_date[0]['value'])): ?>
									<div class="publication-date"><?php print $node->field_newsletter_date[0]['value']; ?></div>
								<?php endif;?>
								<div class="title"><?php print $title; ?></div>
								<?php if(!empty($node->body)): ?>
								<div class="content"><?php print $node->body; ?></div>
								<?php endif; ?>
								<?php if(!empty($node->field_newsletter_file[0]['view'])): ?>
									<?php //pa($node,1); ?>
									<?php $file = strip_tags($node->field_newsletter_file[0]['view'], '<div><a><span>'); ?>
									<?php $file = str_replace('</a></div>', '<span class="more_arrow">&gt;</span></a></div>', $file); ?>
									<?php $file_name = '/'.$node->field_newsletter_file[0]['filename'].'/'; ?>
									<?php $file = preg_replace($file_name, t('Download the pdf'), $file);; ?>
									<div class="pdf-file"><?php print $file; ?></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="section_container">
						<div class="section_elements">
							<?php $output = trim(views_embed_view($name = 'newsletter_article_reference', $display_id = 'block_1')); ?>
							<?php if(!empty($output)): ?>
								<div class="newsletter-section">
									<div class="section_name"><h2><?php print t('Table of Contents'); ?></h2></div>
									<div class="section_content"><?php print $output;?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
