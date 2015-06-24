<?php //$node, $callout_images, $callout_links, $wysiwyg_content; ?>
<?php if (!empty($callout_images) && !empty($callout_links)) : ?>
	<div class="section<?php if ($wysiwyg_content) print ' section_clear_top'; ?>">
		<div class="callout_landing_page narrow">
			<div class="landing_page_container has_active">
				<?php foreach ($callout_images as $key => $image) : ?>
					<?php $callout_image = (!empty($image['filepath'])) ? $image['filepath'] : ''; ?>
					<?php $callout_url = (!empty($callout_links[$key]['url'])) ? $callout_links[$key]['url'] : ''; ?>
					<?php $callout_title = (!empty($callout_links[$key]['title'])) ? $callout_links[$key]['title'] : ''; ?>
					<div class="image_link">
						<a class="off" href="/<?php print drupal_get_path_alias($callout_url);?>">
							<?php print theme('imagecache', 'callout_header_four_up_325x133', $callout_image);?>
							<?php if (!empty($callout_title)) : ?>
								<div class="image_label landing-label"><div class="image_label_holder"><?php print $callout_title; ?></div></div>
							<?php endif; ?>
						</a>
						<a class="on" href="/<?php print drupal_get_path_alias($callout_url);?>">
							<?php print theme('imagecache', 'callout_header_four_up_desat_325x133', $callout_image);?>
							<?php if (!empty($callout_title)) : ?>
								<div class="image_label landing-label"><div class="image_label_holder"><?php print $callout_title; ?></div></div>
							<?php endif; ?>
							<div class="overlay">&nbsp;</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>