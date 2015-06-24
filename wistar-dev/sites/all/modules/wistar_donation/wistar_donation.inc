<?php 

function wistar_donation_payment_options() {
	return array(
		'Visa' => 'Visa',
		'PayPal' => 'PayPal'
	);
}

function wistar_donation_exp_years() {
	$ret = array();
	$start = (int)date('Y');
	foreach(range($start, $start + 20) as $year) {
		$ret[$year] = $year;		
	}
	
	return $ret;
}
