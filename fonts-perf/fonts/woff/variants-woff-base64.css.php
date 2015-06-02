<?php
sleep(1);
header('Content-type: text/css');
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 60*60*24*365));

include 'SourceSansPro-LightIt.woff.css';
include 'SourceSansPro-Semibold.woff.css';
include 'SourceSansPro-SemiboldIt.woff.css';
