<?php
// $Id: block_revisions.admin.inc,v 1.1.2.1 2010/03/23 06:53:07 mrbaileys Exp $

/**
 * @file
 * Admin functions and page callbacks for the Block Revisions module.
 */

/**
 * Confirmation form for reverting a revision.
 */
function block_revisions_revert_confirm($form_state, $revision) {
  $form['#block_revision'] = $revision;
  $delta = $revision->bid;
  return confirm_form($form, t('Are you sure you want to revert the revision?'), "admin/build/block/configure/block/$delta/revisions", t('This action cannot be undone.'), t('Revert'), t('Cancel'));
}

function block_revisions_revert_confirm_submit($form, &$form_state) {
  global $user;
  $revision = $form['#block_revision'];
  $delta = $revision->bid;
  $vid = $revision->vid;

  $message = t('Copy of the revision from !date.', array('!date' => format_date($revision->timestamp)));
  db_query("UPDATE {boxes} SET body = '%s', format = %d, uid = %d, timestamp = %d WHERE bid = %d", $revision->body, $revision->format, $user->uid, time(), $delta);
  block_revisions_create_revision($delta, $revision->body, $revision->format, $message);

  if (db_result(db_query('SELECT COUNT(vid) FROM {boxes_revisions} WHERE bid = %d', $delta)) > 1) {
    $form_state['redirect'] = "admin/build/block/configure/block/$delta/revisions";
  }
  else {
    $form_state['redirect'] = "admin/build/block/configure/block/$delta";
  }
}

/**
 * Confirmation form for revision deletion.
 */
function block_revisions_delete_confirm($form_state, $revision) {
  $form['#block_revision'] = $revision;
  $delta = $revision->bid;
  return confirm_form($form, t('Are you sure you want to delete the revision?'), "admin/build/block/configure/block/$delta/revisions", t('This action cannot be undone.'), t('Delete'), t('Cancel'));
}

function block_revisions_delete_confirm_submit($form, &$form_state) {
  $revision = $form['#block_revision'];
  $delta = $revision->bid;
  $vid = $revision->vid;

  db_query("DELETE FROM {boxes_revisions} WHERE bid = %d AND vid = %d", $delta, $vid);

  $title = db_result(db_query("SELECT info FROM {boxes} WHERE bid = %d", $delta));

  watchdog('content', "Deleted revision %revision for custom block '%title'.", array('%title' => $title, '%revision' => $revision->vid));
  drupal_set_message(t("Revision from %revision-date of custom block '%title' has been deleted.", array('%revision-date' => format_date($revision->timestamp), '%title' => $title)));

  if (db_result(db_query('SELECT COUNT(vid) FROM {boxes_revisions} WHERE bid = %d', $delta)) > 1) {
    $form_state['redirect'] = "admin/build/block/configure/block/$delta/revisions";
  }
  else {
    $form_state['redirect'] = "admin/build/block/configure/block/$delta";
  }
}

/**
 * Menu callback for the revisions overview page.
 *
 * This page lists all the revisions for a specific custom block.
 */
function block_revisions_overview($delta) {
  $output = '';

  // Fetch information about the block and the current revision from the database.
  $block = db_fetch_object(db_query('SELECT b.info, b.timestamp, b.uid FROM {boxes} b WHERE b.bid = %d', $delta));

  // Set the title for the page.
  drupal_set_title(t("Revisions for '%title' block", array('%title' => $block->info)));

  // Fetch a list of revisions for this custom block from the database.
  $revisions = block_revision_list($delta);
  $latest_revision = reset($revisions);

  // By comparing the timestamp of the block with the timestamp of the
  // most recent revision, we can determine if the block was altered
  // after that revision was created. If it is, warn the user that
  // the most recent revision differs from the actual block content.
  if ($block->timestamp !== $latest_revision->timestamp) {
    $account = user_load($block->uid);
    $output .= t('Warning: the block has been altered since the most recent revision. The latest, non-versioned, edit was made by !username on %timestamp.', array('!username' => theme_username($account), '%timestamp' => format_date($block->timestamp)));
  }

  $header = array(t('Revision'), array('data' => t('Operations'), 'colspan' => 2));
  $rows = array();

  foreach ($revisions as $revision) {
    $row = array();
    $operations = array();

    $row[] = array('data' => t('!date by !username', array('!date' => format_date($revision->timestamp, 'small'), '!username' => theme('username', $revision))) . (($revision->log != '') ? '<p class="revision-log">'. check_plain($revision->log) .'</p>' : ''));
    if ($revision->vid == 0) {
      $operations[] = array('data' => theme('placeholder', t('current revision')), 'class' => 'revision-current', 'colspan' => 2);
      $row[0]['class'] = 'revision-current';
    }
    else {
      $operations[] = l(t('revert'), "admin/build/block/revisions/revert/$delta/$revision->vid");
      $operations[] = l(t('delete'), "admin/build/block/revisions/delete/$delta/$revision->vid");
    }

    $rows[] = array_merge($row, $operations);
  }

  $output .= theme('table', $header, $rows);

  return $output;
}

/**
 * Return revision information for the given block.
 */
function block_revision_list($delta) {
  $revisions = array();

  $query = "SELECT vid, body, format, br.timestamp, br.log, u.uid, u.name FROM {boxes_revisions} br LEFT JOIN {users} u ON br.uid = u.uid WHERE br.bid = %d ORDER BY timestamp DESC";
  $result = db_query($query, $delta, $delta);
  while ($revision = db_fetch_object($result)) {
    $revisions[$revision->vid] = $revision;
  }

  return $revisions;
}