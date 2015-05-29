<html lang="fr">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Fonts perf tests - Flash of Faux Text Enhanced</title>
<style>
<?php
include './styles.css';
?>
</style>
</head>

<body>
<h1>Fonts perf tests</h1>
<?php include '../menu.php'; ?>
<h2>Flash of Faux Text Enhanced</h2>
<p>Based on Zach Letherman's <a href="../05-flash-of-faux-text/">Flash of Faux Text</a>, but enhanced with <a href="../03-data-uri-fonts/">Data URI fonts</a> for variants, with no more aliases needed.</p>
<?php include '../ipsum.php'; ?>

<script>
<?php
include '../javascript/loadCSS.js';
include '../javascript/fontfaceonload.js';
?>

(function( doc ) {
	/* Load fonts */
	FontFaceOnload( "Source Sans Pro", {
		weight: '300',
		error: function() {
			console.log('didn\'t work… :-/');
		},
	  success: function() {
	    var docEl = doc.documentElement;

	    /* Stage 1 Complete
	    /* FOFT engaged */
	    docEl.className += " fonts-loaded";

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
					fontFileUrl = "../fonts/woff/variants-woff-base64.css.php";
			if( supportsWoff2 ) {
			  fontFileUrl = "../fonts/woff2/variants-woff2-base64.css.php";
				/* sometimes you have to do the bad thing.  ¯\_(ツ)_/¯
				/* ttf if non-chrome android webkit browser */
			} else if( ua.indexOf( "Android" ) > -1 && ua.indexOf( "like Gecko" ) > -1 && ua.indexOf( "Chrome" ) === -1 ) {
			  fontFileUrl = "../fonts/ttf/variants-ttf-fontface.css.php";
			}
			loadCSS(fontFileUrl);
	  }
	});
})( window.document );
</script>
</body>

</html>
