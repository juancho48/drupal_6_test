<?php 
/**
 * returns list of states
 */
function wistar_paypal_country_options() {
	return array(
		'AF'=>'Afghanistan',
		'AL'=>'Albania',
		'DZ'=>'Algeria',
		'AS'=>'American Samoa',
		'AD'=>'Andorra',
		'AO'=>'Angola',
		'AI'=>'Anguilla',
		'AQ'=>'Antarctica',
		'AG'=>'Antigua And Barbuda',
		'AR'=>'Argentina',
		'AM'=>'Armenia',
		'AW'=>'Aruba',
		'AU'=>'Australia',
		'AT'=>'Austria',
		'AZ'=>'Azerbaijan',
		'BS'=>'Bahamas',
		'BH'=>'Bahrain',
		'BD'=>'Bangladesh',
		'BB'=>'Barbados',
		'BY'=>'Belarus',
		'BE'=>'Belgium',
		'BZ'=>'Belize',
		'BJ'=>'Benin',
		'BM'=>'Bermuda',
		'BT'=>'Bhutan',
		'BO'=>'Bolivia',
		'BA'=>'Bosnia And Herzegovina',
		'BW'=>'Botswana',
		'BV'=>'Bouvet Island',
		'BR'=>'Brazil',
		'IO'=>'British Indian Ocean Territory',
		'BN'=>'Brunei',
		'BG'=>'Bulgaria',
		'BF'=>'Burkina Faso',
		'BI'=>'Burundi',
		'KH'=>'Cambodia',
		'CM'=>'Cameroon',
		'CA'=>'Canada',
		'CV'=>'Cape Verde',
		'KY'=>'Cayman Islands',
		'CF'=>'Central African Republic',
		'TD'=>'Chad',
		'CL'=>'Chile',
		'CN'=>'China',
		'CX'=>'Christmas Island',
		'CC'=>'Cocos (Keeling) Islands',
		'CO'=>'Columbia',
		'KM'=>'Comoros',
		'CG'=>'Congo',
		'CK'=>'Cook Islands',
		'CR'=>'Costa Rica',
		'CI'=>'Cote D\'Ivorie (Ivory Coast)',
		'HR'=>'Croatia (Hrvatska)',
		'CU'=>'Cuba',
		'CY'=>'Cyprus',
		'CZ'=>'Czech Republic',
		'CD'=>'Democratic Republic Of Congo (Zaire)',
		'DK'=>'Denmark',
		'DJ'=>'Djibouti',
		'DM'=>'Dominica',
		'DO'=>'Dominican Republic',
		'TP'=>'East Timor',
		'EC'=>'Ecuador',
		'EG'=>'Egypt',
		'SV'=>'El Salvador',
		'GQ'=>'Equatorial Guinea',
		'ER'=>'Eritrea',
		'EE'=>'Estonia',
		'ET'=>'Ethiopia',
		'FK'=>'Falkland Islands (Malvinas)',
		'FO'=>'Faroe Islands',
		'FJ'=>'Fiji',
		'FI'=>'Finland',
		'FR'=>'France',
		'FX'=>'France, Metropolitan',
		'GF'=>'French Guinea',
		'PF'=>'French Polynesia',
		'TF'=>'French Southern Territories',
		'GA'=>'Gabon',
		'GM'=>'Gambia',
		'GE'=>'Georgia',
		'DE'=>'Germany',
		'GH'=>'Ghana',
		'GI'=>'Gibraltar',
		'GR'=>'Greece',
		'GL'=>'Greenland',
		'GD'=>'Grenada',
		'GP'=>'Guadeloupe',
		'GU'=>'Guam',
		'GT'=>'Guatemala',
		'GN'=>'Guinea',
		'GW'=>'Guinea-Bissau',
		'GY'=>'Guyana',
		'HT'=>'Haiti',
		'HM'=>'Heard And McDonald Islands',
		'HN'=>'Honduras',
		'HK'=>'Hong Kong',
		'HU'=>'Hungary',
		'IS'=>'Iceland',
		'IN'=>'India',
		'ID'=>'Indonesia',
		'IR'=>'Iran',
		'IQ'=>'Iraq',
		'IE'=>'Ireland',
		'IL'=>'Israel',
		'IT'=>'Italy',
		'JM'=>'Jamaica',
		'JP'=>'Japan',
		'JO'=>'Jordan',
		'KZ'=>'Kazakhstan',
		'KE'=>'Kenya',
		'KI'=>'Kiribati',
		'KW'=>'Kuwait',
		'KG'=>'Kyrgyzstan',
		'LA'=>'Laos',
		'LV'=>'Latvia',
		'LB'=>'Lebanon',
		'LS'=>'Lesotho',
		'LR'=>'Liberia',
		'LY'=>'Libya',
		'LI'=>'Liechtenstein',
		'LT'=>'Lithuania',
		'LU'=>'Luxembourg',
		'MO'=>'Macau',
		'MK'=>'Macedonia',
		'MG'=>'Madagascar',
		'MW'=>'Malawi',
		'MY'=>'Malaysia',
		'MV'=>'Maldives',
		'ML'=>'Mali',
		'MT'=>'Malta',
		'MH'=>'Marshall Islands',
		'MQ'=>'Martinique',
		'MR'=>'Mauritania',
		'MU'=>'Mauritius',
		'YT'=>'Mayotte',
		'MX'=>'Mexico',
		'FM'=>'Micronesia',
		'MD'=>'Moldova',
		'MC'=>'Monaco',
		'MN'=>'Mongolia',
		'MS'=>'Montserrat',
		'MA'=>'Morocco',
		'MZ'=>'Mozambique',
		'MM'=>'Myanmar (Burma)',
		'NA'=>'Namibia',
		'NR'=>'Nauru',
		'NP'=>'Nepal',
		'NL'=>'Netherlands',
		'AN'=>'Netherlands Antilles',
		'NC'=>'New Caledonia',
		'NZ'=>'New Zealand',
		'NI'=>'Nicaragua',
		'NE'=>'Niger',
		'NG'=>'Nigeria',
		'NU'=>'Niue',
		'NF'=>'Norfolk Island',
		'KP'=>'North Korea',
		'MP'=>'Northern Mariana Islands',
		'NO'=>'Norway',
		'OM'=>'Oman',
		'PK'=>'Pakistan',
		'PW'=>'Palau',
		'PA'=>'Panama',
		'PG'=>'Papua New Guinea',
		'PY'=>'Paraguay',
		'PE'=>'Peru',
		'PH'=>'Philippines',
		'PN'=>'Pitcairn',
		'PL'=>'Poland',
		'PT'=>'Portugal',
		'PR'=>'Puerto Rico',
		'QA'=>'Qatar',
		'RE'=>'Reunion',
		'RO'=>'Romania',
		'RU'=>'Russia',
		'RW'=>'Rwanda',
		'SH'=>'Saint Helena',
		'KN'=>'Saint Kitts And Nevis',
		'LC'=>'Saint Lucia',
		'PM'=>'Saint Pierre And Miquelon',
		'VC'=>'Saint Vincent And The Grenadines',
		'SM'=>'San Marino',
		'ST'=>'Sao Tome And Principe',
		'SA'=>'Saudi Arabia',
		'SN'=>'Senegal',
		'SC'=>'Seychelles',
		'SL'=>'Sierra Leone',
		'SG'=>'Singapore',
		'SK'=>'Slovak Republic',
		'SI'=>'Slovenia',
		'SB'=>'Solomon Islands',
		'SO'=>'Somalia',
		'ZA'=>'South Africa',
		'GS'=>'South Georgia And South Sandwich Islands',
		'KR'=>'South Korea',
		'ES'=>'Spain',
		'LK'=>'Sri Lanka',
		'SD'=>'Sudan',
		'SR'=>'Suriname',
		'SJ'=>'Svalbard And Jan Mayen',
		'SZ'=>'Swaziland',
		'SE'=>'Sweden',
		'CH'=>'Switzerland',
		'SY'=>'Syria',
		'TW'=>'Taiwan',
		'TJ'=>'Tajikistan',
		'TZ'=>'Tanzania',
		'TH'=>'Thailand',
		'TG'=>'Togo',
		'TK'=>'Tokelau',
		'TO'=>'Tonga',
		'TT'=>'Trinidad And Tobago',
		'TN'=>'Tunisia',
		'TR'=>'Turkey',
		'TM'=>'Turkmenistan',
		'TC'=>'Turks And Caicos Islands',
		'TV'=>'Tuvalu',
		'UG'=>'Uganda',
		'UA'=>'Ukraine',
		'AE'=>'United Arab Emirates',
		'UK'=>'United Kingdom',
		'US'=>'United States',
		'UM'=>'United States Minor Outlying Islands',
		'UY'=>'Uruguay',
		'UZ'=>'Uzbekistan',
		'VU'=>'Vanuatu',
		'VA'=>'Vatican City (Holy See)',
		'VE'=>'Venezuela',
		'VN'=>'Vietnam',
		'VG'=>'Virgin Islands (British)',
		'VI'=>'Virgin Islands (US)',
		'WF'=>'Wallis And Futuna Islands',
		'EH'=>'Western Sahara',
		'WS'=>'Western Samoa',
		'YE'=>'Yemen',
		'YU'=>'Yugoslavia',
		'ZM'=>'Zambia',
		'ZW'=>'Zimbabwe'
	);
}
function wistar_paypal_state_options_united_states() {
  return array(
	'AB' => t('AB'),
	'AL' => t('AL'),
	'AK' => t('AK'),
	'AS' => t('AS'),
	'AZ' => t('AZ'),
	'AR' => t('AR'),
	'BC' => t('BC'),
	'CA' => t('CA'),
	'CO' => t('CO'),
	'CT' => t('CT'),
	'DE' => t('DE'),
	'DC' => t('DC'),
	'FL' => t('FL'),
	'GA' => t('GA'),
	'GU' => t('GU'),
	'HI' => t('HI'),
	'ID' => t('ID'),
	'IL' => t('IL'),
	'IN' => t('IN'),
	'IA' => t('IA'),
	'KS' => t('KS'),
	'KY' => t('KY'),
	'LA' => t('LA'),
	'MB' => t('MB'),
	'ME' => t('ME'),
	'MH' => t('MH'),
	'MD' => t('MD'),
	'MA' => t('MA'),
	'MI' => t('MI'),
	'MN' => t('MN'),
	'MS' => t('MS'),
	'MO' => t('MO'),
	'MT' => t('MT'),
	'NB' => t('NB'),
	'NE' => t('NE'),
	'NL' => t('NL'),
	'NV' => t('NV'),
	'NH' => t('NH'),
	'NJ' => t('NJ'),
	'NM' => t('NM'),
	'NS' => t('NS'),
	'NY' => t('NY'),
	'NC' => t('NC'),
	'ND' => t('ND'),
	'NT' => t('NT'),
	'NU' => t('NU'),
	'MP' => t('MP'),
	'OH' => t('OH'),
	'OK' => t('OK'),
	'ON' => t('ON'),
	'OR' => t('OR'),
	'PW' => t('PW'),
	'PA' => t('PA'),
	'PE' => t('PE'),
	'PR' => t('PR'),
	'QC' => t('QC'),
	'RI' => t('RI'),
	'SC' => t('SC'),
	'SD' => t('SD'),
	'SK' => t('SK'),
	'TN' => t('TN'),
	'TX' => t('TX'),
	'UT' => t('UT'),
	'VT' => t('VT'),
	'VI' => t('VI'),
	'VA' => t('VA'),
	'WA' => t('WA'),
	'WV' => t('WV'),
	'WI' => t('WI'),
	'WY' => t('WY'),
	'YT' => t('YT'),
  );
}


/**
 * helper function for getting billing address form elements
 */
function wistar_paypal_form_elements() {
	global $base_url;
	$elements = array();
	
	//$state_options = array(0 => t('State')) + wistar_paypal_state_options_united_states();			
	$state_options = array('' => '') + wistar_paypal_state_options_united_states();			
	
	$elements['name_title'] = array(
		'#type' => 'select',
		'#title' => t('Title'),
		'#options' => array(
			''=>'',
			'mr'=>t('Mr.'),
			'ms'=>t('Ms.'),
			'mrs'=>t('Mrs.'),
			'dr'=>t('Dr.')
		),
	);
	$elements['first_name'] = array(
		'#type' => 'textfield',
		'#title' => t('First Name'),
		'#required' => TRUE		
	);
	$elements['middle_initial'] = array(
		'#type' => 'textfield',
		'#title' => t('Middle Initial'),
		'#size' => 10,
		'#maxlength' => 10,
		'#required' => FALSE
	);
	$elements['last_name'] = array(
		'#type' => 'textfield',
		'#title' => t('Last Name'),
		'#required' => TRUE		
	);
	$elements['name_suffix'] = array(
		'#type' => 'select',
		'#title' => t('Suffix'),
		'#options' => array(
			''=>'',
			'sr'=>t('Sr.'),
			'jr'=>t('Jr.'),
			'iii'=>t('III'),
			'iv'=>t('IV'),
			'v'=>t('V')
		)
	);
	$elements['address1'] = array(
		'#type' => 'textfield',
		'#title' => t('Address, Line 1'),
		'#required' => TRUE		
	);		
	$elements['address2'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Line 2 (optional)'),
	  '#required' => FALSE
	);		
	$elements['city'] = array(
	  '#type' => 'textfield',
	  '#title' => t('City'),
	  '#required' => TRUE
	);
	$elements['state'] = array(
	  '#type' => 'select',
	  '#title' => t('State/Province'),
	  '#options' => $state_options,
	  //'#required' => TRUE
	);
	$elements['zip'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Zip/Postal Code'),
	  '#required' => TRUE
	);
	$elements['country'] = array(
		'#type' => 'select',
		'#title' => t('Country'),
		'#options' => array('' => '') + wistar_paypal_country_options(),
		'#default_value' => 'US',
		'#required' => FALSE
	);
	$elements['phone'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Phone Number'),
	  '#size' => 46,
	  '#required' => TRUE
	);
	$elements['phone_type'] = array(
		'#type' => 'select',
		'#title' => 'Mobile',
		'#options' => array(
			''=>'',
			'home'=>'Home',
			'work'=>'Work',
			'mobile'=>'Mobile'
		)
	);
	$elements['email'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Email Address'),
	  '#size' => 46,
	  '#required' => TRUE,
	  '#element_validate' => array('wistar_paypal_email_validator')
	);
	$elements['image_url'] = array(
	  '#type' => 'hidden',
	  '#value' => variable_get('wistar_paypal_logo', $base_url . '/sites/all/themes/wistar/images/layout/logo.jpg'),
	  '#required' => TRUE
	);			
	$elements['rm'] = array(
	  '#type' => 'hidden',
	  '#value' => '2',
	  '#required' => TRUE
	);		
	$elements['business'] = array(
	  '#type' => 'hidden',
	  '#value' => variable_get('wistar_paypal_business', 'surplus@wistar.org'),
	  '#required' => TRUE		
	);	
	$elements['hosted_button_id'] = array(
	  '#type' => 'hidden',
	  '#value' => variable_get('wistar_paypal_hosted_button_id', '6PY336ZZK7S72'),
	  '#required' => TRUE		
	);

	return $elements;
}
function wistar_paypal_email_validator($element, &$form_state){
	$mail = $element['#value'];
	if (!valid_email_address($mail)) {
		form_error($element,  t('The !name appears to be invalid', array('!name' => $element['#title'])));
	}
}

function wistar_paypal_research_form_elements() {
	global $base_url;
	$elements = array();
	
	//$state_options = array(0 => t('State')) + wistar_paypal_state_options_united_states();			
	$state_options = array('' => '') + wistar_paypal_state_options_united_states();			
	
	$elements['name_title'] = array(
		'#type' => 'select',
		'#title' => t('Title'),
		'#options' => array(
			''=>'',
			'mr'=>t('Mr.'),
			'ms'=>t('Ms.'),
			'mrs'=>t('Mrs.'),
			'dr'=>t('Dr.')
		),
	);
	$elements['first_name'] = array(
		'#type' => 'textfield',
		'#title' => t('First Name'),
		'#required' => TRUE		
	);
	$elements['middle_initial'] = array(
		'#type' => 'textfield',
		'#title' => t('Middle Initial'),
		'#size' => 10,
		'#maxlength' => 10,
		'#required' => FALSE
	);
	$elements['last_name'] = array(
		'#type' => 'textfield',
		'#title' => t('Last Name'),
		'#required' => TRUE		
	);
	$elements['name_suffix'] = array(
		'#type' => 'select',
		'#title' => t('Suffix'),
		'#options' => array(
			''=>'',
			'sr'=>t('Sr.'),
			'jr'=>t('Jr.'),
			'iii'=>t('III'),
			'iv'=>t('IV'),
			'v'=>t('V')
		)
	);
	$elements['address1'] = array(
		'#type' => 'textfield',
		'#title' => t('Address, Line 1'),
		'#required' => TRUE		
	);		
	$elements['address2'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Line 2 (optional)'),
	  '#required' => FALSE
	);		
	$elements['city'] = array(
	  '#type' => 'textfield',
	  '#title' => t('City'),
	  '#required' => TRUE
	);
	$elements['state'] = array(
	  '#type' => 'select',
	  '#title' => t('State/Province'),
	  '#options' => $state_options,
	  //'#required' => TRUE
	);				
	$elements['zip'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Zip/Postal Code'),
	  '#required' => TRUE
	);
	$elements['country'] = array(
		'#type' => 'select',
		'#title' => t('Country'),
		'#options' => array('' => '') + wistar_paypal_country_options(),
		'#default_value' => 'US',
		'#required' => FALSE
	);
	$elements['phone'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Phone Number'),
	  '#size' => 46,
	  '#required' => TRUE
	);
	$elements['phone_type'] = array(
		'#type' => 'select',
		'#title' => 'Mobile',
		'#options' => array(
			''=>'',
			'home'=>'Home',
			'work'=>'Work',
			'mobile'=>'Mobile'
		)
	);
	$elements['email'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Email Address'),
	  '#size' => 46,
	  '#required' => TRUE,
	  '#element_validate' => array('wistar_paypal_email_validator')
	);					
	$elements['image_url'] = array(
	  '#type' => 'hidden',
	  '#value' => variable_get('wistar_paypal_logo', $base_url . '/sites/all/themes/wistar/images/layout/logo.jpg'),
	  '#required' => TRUE
	);			
	$elements['rm'] = array(
	  '#type' => 'hidden',
	  '#value' => '2',
	  '#required' => TRUE
	);		
	$elements['business'] = array(
	  '#type' => 'hidden',
	  '#value' => variable_get('wistar_paypal_business', 'surplus@wistar.org'),
	  '#required' => TRUE		
	);	
	$elements['hosted_button_id'] = array(
	  '#type' => 'hidden',
	  '#value' => variable_get('wistar_paypal_hosted_button_id', '6PY336ZZK7S72'),
	  '#required' => TRUE		
	);
	
	
	return $elements;
}