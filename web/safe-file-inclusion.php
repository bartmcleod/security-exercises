<?php
/**
 * Demonstrates the risk of using user supplied data to display the content of a file path.
 *
 * Examples:
 * http://security.dev/file-inclusion.php?file=config.php
 * http://security.dev/file-inclusion.php?file=/etc/security/access.conf
 *
 * (The latter will typically work in my vagrant box)
 */
require_once (__DIR__ . '/../classes/CssFileFilter.php');

$file = $_GET['file'];
$dir = __DIR__ . '/css/';

$good = false;

$directoryIterator = new DirectoryIterator($dir);

$cssFilter = new CssFileFilter($directoryIterator);

$whiteList = $cssFilter->getFiles();


$good = in_array($file, $whiteList);

if ($good) {
    header('Content-Type: text/plain');

    echo file_get_contents($dir . $file);
}

header('HTTP/1.0 404 Not Found');


