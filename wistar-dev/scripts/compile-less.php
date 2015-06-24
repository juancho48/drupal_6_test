<?php 

define('LESSPHP_LIB_PATH', 'sites/all/modules/contrib/less/lessphp');
define('LESSPHP_LIB_INCLUDE_FILE', 'lessc.inc.php');

$include = realpath(dirname(__FILE__) . '/../') . DIRECTORY_SEPARATOR . LESSPHP_LIB_PATH . DIRECTORY_SEPARATOR . LESSPHP_LIB_INCLUDE_FILE;
if( !file_exists($include) ) die('less library not found. ensure the module is installed and at the correct path: ' . $include);

$in = $argv[1];
$out = $argv[2];

if( file_exists($in) && file_exists(dirname($out)) ) {

	require $include;
	try {
		lessc::ccompile($argv[1], $argv[2]);
	} 
	catch (exception $ex) {
		die($ex->getMessage());
	}
}
else {
	die("\ncompilation failed. check input and output files\n");
}

echo "Complete\n";

?>
