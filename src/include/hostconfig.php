<?php
header('Access-Control-Allow-Origin: *');

define('DRIVER', 'MySQL');
define('HOST', 'localhost');
define('UID', 'webdev2');
define('PASSWORD', 'dev2@USER#');
define('DB', 'train_db2');

define('ROOT', dirname(dirname(__FILE__)));
date_default_timezone_set('Asia/Bangkok');

// Report all -1, error only 1, turn off 0
error_reporting(-1);
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
