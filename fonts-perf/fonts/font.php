<?php
$types = array('woff' => 'application/font-woff', 'woff2' => 'application/font-woff2', 'ttf' => 'application/x-font-truetype');
sleep(1);
if (preg_match("/^(ttf|woff2?)\/[^\/]+$/", $_GET['f'], $parts)) {
	header('Content-Type: ' . $types[$parts[1]]);
	header('Content-Length: ' . filesize($_GET['f']));
	readfile($_GET['f']);
}
