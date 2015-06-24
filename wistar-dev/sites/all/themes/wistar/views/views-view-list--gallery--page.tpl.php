<?php
// $Id: views-view-list.tpl.php,v 1.3 2008/09/30 19:47:11 merlinofchaos Exp $
/**
 * @file views-view-list.tpl.php
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<div class="item-list">
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <<?php print $options['type']; ?>>
    <?php foreach ($rows as $idx => $row): ?>
    <?php if ( $idx == 0 || ( $idx % 6 == 0) ): ?>
    <li>    
    <?php endif; ?>    
      <?php
        if ( ( $idx + 1 ) % 3 == 0 ) $classes[$idx] .= ' views-row-end-row';
        if ( ( $idx + 1 ) > 3 ) $classes[$idx] .= ' views-row-last-row';
      ?>
      <div id="node-<?php print $view->result[$idx]->nid; ?>" class="node <?php print $classes[$idx]; ?>">
        <?php print $row; ?>
      </div>
    <?php if ( (($idx + 1) % 6 == 0) && (($idx + 1) != count($rows)) ): ?>      
    </li>
    <?php endif; ?>
    <?php endforeach; ?>
    </li>
  </<?php print $options['type']; ?>>
</div>
