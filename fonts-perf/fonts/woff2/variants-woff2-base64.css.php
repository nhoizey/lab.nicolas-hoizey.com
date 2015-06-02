<?php
sleep(1);
header('Content-type: text/css');
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 60*60*24*365));

include 'SourceSansPro-LightIt.woff2.css';
include 'SourceSansPro-Semibold.woff2.css';
include 'SourceSansPro-SemiboldIt.woff2.css';
