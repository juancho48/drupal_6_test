<?php if( count($node->field_callout_ref) && isset($node->field_callout_ref[0]['nid']) ): ?>
<div class="section grey<?php if($subheading) { print ' with_subheading'; }?>">
	<?php if($subheading) print $subheading; ?>
	<div class="callout_container set_of_3">
		<?php foreach( $node->field_callout_ref as $idx => $ref ): ?>
			<?php if( isset($ref['nid']) ): ?>
			<div class="callout_box callout_set_of_3 <?php print ($idx == 2) ? 'last' : ''; ?>">
				<?php print node_view(node_load($ref['nid'])); ?>
			</div>
			<?php endif; ?>
		<?php endforeach;?>
	</div>
</div>
<?php endif; ?>
