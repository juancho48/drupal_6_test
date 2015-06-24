<?php menu_set_active_item('news-and-media/focus-newsletter'); ?>
<?php print theme('breadcrumb', drupal_get_breadcrumb()); ?>
<div class="vertical_tab_container">
	<div class="vertical_tab_elements">
		<?php print theme('wistar_vertical_tabs', 3);?>
		<div class="content">			
			<div id="content-header">
				<?php print theme('wistar_content_heading', $node);?>
				<div id="newsletter-navigation">
					<?php $node->prevnext_type = 'article'; ?>
					<?php print theme('wistar_page_navigation', $node);?>
					<?php menu_set_active_item('node/'.$node->nid); ?>
				</div>
			</div>
			<div id="node-<?php print $node->nid;?>" class="node page node-page node-article-page">
				<div class="section">
					<div class="article-share"><?php print theme('wistar_share', $node->nid);?></div>
					<div class="wysiwyg">
						<div id="content">
							<h1 class="page-title"><?php print $title; ?></h1>
							<?php if(!empty($node->field_article_subtitle[0]['value'])): ?>
								<h2 class="subtitle"><?php print $node->field_article_subtitle[0]['value']; ?></h2>
							<?php endif; ?>
							<?php if(!empty($node->field_article_witten_by[0]['value'])): ?>
								<div class="witten-by"><label><?php print t('Written by: '); ?></label><?php print $node->field_article_witten_by[0]['value']; ?></div>
							<?php endif; ?>
							<?php if(!empty($content)): ?>
								<div class="content"><?php print $content; ?></div>
							<?php endif; ?>
						</div>
						<div id="sidebar">
							<?php if(!empty($node->field_article_scientist[0]['view'])): ?>
								<div class="scientist">
									<h2><?php print t('Related Scientists:'); ?></h2>
									<?php foreach($node->field_article_scientist as $scientist):?>
									<?php if(strpos($scientist['view'], 'node-unpublished')!==false) continue;?>
									<div class="views-row"><?php echo $scientist['view']; ?></div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<?php if(!empty($node->taxonomy)): ?>
								<div class="terms">
									<span class="label"><?php print t('Tagged:'); ?></span>
									<?php $terms_output = array(); ?>
									<?php $taxonomy_base_path = 'taxonomy/term/'; ?>
									<?php $taxonomy_base_path = 'news-and-media/focus-newsletter/articles/'; ?>
									<?php foreach($node->taxonomy as $tid=>$term): ?>
										<?php $term_count = taxonomy_term_count_nodes($tid);?>
										<?php $name =str_replace(' ','-',$term->name); ?>
										<?php $term_link = l($term->name, $taxonomy_base_path.$name); ?>
										<?php $terms_output[] = ' <span class="term">'.$term_link.' ('.$term_count.')</span>'; ?>
									<?php endforeach; ?>
									<?php $terms_output = implode(',', $terms_output); ?>
									<?php print $terms_output; ?>
								</div>
							<?php endif; ?>
							<div class="testimonials">
							<?php if(!empty($node->field_article_testimonial_body[0]['value'])): ?>
								<div class="body"><?php print $node->field_article_testimonial_body[0]['value']; ?></div>
							<?php endif; ?>
							<?php if(!empty($node->field_article_testimonial_name[0]['value'])): ?>
								<div class="name">- <?php print $node->field_article_testimonial_name[0]['value']; ?></div>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
