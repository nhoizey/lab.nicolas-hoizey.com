<?php
sleep(1);
header('Content-type: text/css');
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 60*60*24*365));
?>
@font-face {
    font-family: 'Source Sans Pro';
    src: url('SourceSansPro-LightIt.ttf') format('truetype');
    font-weight: 300;
    font-style: italic;
}

@font-face {
    font-family: 'Source Sans Pro';
    src: url('SourceSansPro-Semibold.ttf') format('truetype');
    font-weight: 600;
    font-style: normal;
}

@font-face {
    font-family: 'Source Sans Pro';
    src: url('SourceSansPro-SemiboldIt.ttf') format('truetype');
    font-weight: 600;
    font-style: italic;
}

