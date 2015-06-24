<?php
/**
 * @file
 * Administrative page callbacks for the wysiwyg_extra module.
 */


/**
 * Allow users to choose extra textareas
 */
function wysiwyg_extra_settings_form($form_state) {
  $form = array();

  $options = array(
    'site_mission' => t('Site information - Mission'),
    'site_footer' => t('Site information - Footer message'),
    'site_offline_message' => t('Site maintenance - Site offline message'),
    'user_registration_help' => t('User settings - User registration guidelines'),
  );

  if (module_exists('contact')) {
    $options['contact_form_information'] = t('Contact form settings - Additional information');
    $options['contact_form_global_message'] = t('Site-wide contact form - Message');
    $options['contact_form_user_message'] = t('Personal contact form - Message');
  }

  if (module_exists('taxonomy')) {
    $options['taxonomy_term_description'] = t('Taxonomy term - Description');
  }

  $form['wysiwyg_extra_options'] = array(
    '#type' => 'checkboxes',
    '#default_value' => variable_get('wysiwyg_extra_options', array()),
    '#title' => t('Additional textareas'),
    '#options' => $options,
  );

  $form = system_settings_form($form);
  return $form;
}