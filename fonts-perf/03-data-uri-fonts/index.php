<html lang="fr">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Fonts perf tests - Data URI fonts</title>
<style>
<?php
include './styles.css';
?>
</style>
</head>

<body>
<h1>Fonts perf tests</h1>
<?php include '../menu.php'; ?>
<h2>Data URI fonts</h2>
<p>As defined in Filament Group's <a href="http://www.filamentgroup.com/lab/font-loading.html">How we use web fonts responsibly, or, avoiding a @font-face-palm</a> article.</p>
<?php include '../starem-warsum.php'; ?>
<script>
<?php
include '../javascript/loadCSS.js';
?>

/* https://github.com/filamentgroup/font-loading/blob/master/data-uris.html */
var supportsWoff2 = (function( win ){
  if( !( "FontFace" in win ) ) {
    return false;
  }
  var f = new win.FontFace( "t", 'url( "data:application/font-woff2;charset=utf-8," ) format( "woff2" )', {} );
  f.load().catch(function() {});
  return f.status == 'loading';
})( window );

/* load font (woff) */
var ua = navigator.userAgent,
		fontFileUrl = "../fonts/woff/base64-full.css.php";
if( supportsWoff2 ) {
  fontFileUrl = "../fonts/woff2/base64-full.css.php";
	/* sometimes you have to do the bad thing.  ¯\_(ツ)_/¯
	/* ttf if non-chrome android webkit browser */
} else if( ua.indexOf( "Android" ) > -1 && ua.indexOf( "like Gecko" ) > -1 && ua.indexOf( "Chrome" ) === -1 ) {
  fontFileUrl = "../fonts/ttf/fontface-full.css.php";
}
loadCSS(fontFileUrl);
</script>
</body>

</html>
