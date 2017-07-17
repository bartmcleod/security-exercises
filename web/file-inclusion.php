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
	header('Content-Type: text/plain');
	echo file_get_contents( $_GET[ 'file' ] );

