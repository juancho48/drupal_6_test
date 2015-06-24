<?php 
	$colors = array(
		'lime',
		'dark_blue',
		'orange',
		'teal'
	); 
	
	$idx = $attributes['index'];
?>
<div class="callout_box <?php if(isset($attributes['class'])) print $attributes['class'];?>">
	<h5><?php print $title ?></h5>
	<?php print theme('imagecache', $attributes['imagecache'],$image);?>
	<p>
		<?php print $text ?>
	</p>
	<div class="callout_box_links <?php print $colors[$idx]; ?>">
		<?php foreach( $attributes['links'] as $link ): ?> 
			<?php if( $link['url'] && $link['title'] ): ?>
				<?php print theme('wistar_read_more', $link['title'], $link['url']);?>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
