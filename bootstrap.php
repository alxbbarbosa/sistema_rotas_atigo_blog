<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require __DIR__ . '/vendor/autoload.php';

session_start();

try {

	include __DIR__ . '/routes/routes.php';

} catch(\Exception $e){
	echo $e->getMessage();
}