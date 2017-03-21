<?php
$config   = require_once __DIR__ . '/config.php';

$dbParams = $config[ 'db' ];

$conn     = mysqli_connect(
	$dbParams[ 'host'],
	$dbParams[ 'username'],
	$dbParams[ 'password'],
	$dbParams[ 'name']
);
