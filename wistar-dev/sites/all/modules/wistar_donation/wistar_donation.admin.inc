<?php 

/**
 *	settings form
 */	
function wistar_donation_admin_donations_settings_form(&$form_state){
	$form['donations_settings'] = array(
		'#type' => 'fieldset',
		'#title' => t('Donations settings'),
		'#weight' => 1,
		'#collapsible' => FALSE,
		'#collapsed' => FALSE,
	);
	$form['donations_settings']['wistar_donation_give_node_id'] = array(
		'#type' => 'textfield',
		'#title' => t('Donate Online node id'),
		'#default_value' => variable_get('wistar_donation_give_node_id', ''),
	);
	$form['donations_settings']['wistar_donation_giving_in_memory_node_id'] = array(
		'#type' => 'textfield',
		'#title' => t('Give today in Honor or Memory node id'),
		'#default_value' => variable_get('wistar_donation_giving_in_memory_node_id', ''),
	);
	$form['donations_settings']['wistar_donation_give_research_node_id'] = array(
		'#type' => 'textfield',
		'#title' => t('Give to an area of research node id'),
		'#default_value' => variable_get('wistar_donation_give_research_node_id', ''),
	);
	$form['donations_settings']['wistar_donation_result_node_id'] = array(
		'#type' => 'textfield',
		'#title' => t('Result node id'),
		'#default_value' => variable_get('wistar_donation_result_node_id', ''),
	);
	
	$form['cancel'] = array(
		'#value' => t('Back to donations list'),
		'#type' => 'submit',
		'#weight' => 10,
		'#submit' => array('wistar_donation_admin_donations_settings_form_back_to_list'),
	);
	$form['update'] = array(
		'#value' => t('Update'),
		'#type' => 'submit',
		'#weight' => 10,
	);
	$form['payflow_settings']=array(
		'#type' => 'fieldset',
		'#weight' => 2,
		'#title' => t('Payflow settings'),
	);
	$form['payflow_settings']['payflow_login']=array(
		'#type' => 'textfield',
		'#title' => t('Merchant Login'),	
		'#default_value'=>variable_get('wistar_payflow_login',''),	
	);
	$form['payflow_settings']['payflow_partner']=array(
		'#type' => 'textfield',
		'#title' => t('Payflow Partner'),	
		'#default_value'=>variable_get('wistar_payflow_partner',''),		
	);
	return $form;
}

/**
 *	settings submit
 */	 	
function wistar_donation_admin_donations_settings_form_submit(&$form_state, $form){
	$input = $form['values'];
	
	variable_set('wistar_donation_give_node_id', $input['wistar_donation_give_node_id']);
	variable_set('wistar_donation_giving_in_memory_node_id', $input['wistar_donation_giving_in_memory_node_id']);
	variable_set('wistar_donation_give_research_node_id', $input['wistar_donation_give_research_node_id']);
	variable_set('wistar_donation_result_node_id', $input['wistar_donation_result_node_id']);

	variable_set('wistar_payflow_login', $input['payflow_login']);
	variable_set('wistar_payflow_partner', $input['payflow_partner']);
	
	drupal_set_message('Settings was updated');
	drupal_goto('admin/donations/settings');
}

function wistar_donation_admin_donations_settings_form_back_to_list(&$form_state, $form){
	drupal_goto('admin/donations');
}