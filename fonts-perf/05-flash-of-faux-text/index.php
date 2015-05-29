<html lang="fr">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Fonts perf tests - Flash of Faux Text</title>
<style>
<?php
include './styles.css';
?>
</style>
</head>

<body>
<h1>Fonts perf tests</h1>
<?php include '../menu.php'; ?>
<h2>Flash of Faux Text</h2>
<p>As defined in Zach Letherman's <a href="http://www.zachleat.com/web/foft/">Flash of Faux Text—still more on Font Loading</a> article.</p>
<?php include '../starem-warsum.php'; ?>

<script>
<?php
include '../javascript/fontfaceonload.js';
?>

(function( doc ) {
	/* Load fonts */
	FontFaceOnload( "Source Sans Pro Normal", {
		weight: '300',
		error: function() {
			console.log('didn\'t work… :-/');
		},
	  success: function() {
	    var docEl = doc.documentElement;

	    /* Stage 1 Complete
	    /* FOFT engaged */
	    docEl.className += " fonts-loaded";

	    var counter = 0;
	    var success = function() {
	      counter++;
	      if( counter === 3 ) {
	          // Stage 2 Complete
	          // All Fonts Loaded
	          docEl.className += " more-fonts-loaded";
	      }
	    };

	    FontFaceOnload( "Source Sans Pro Bold", {
	      weight: 600,
	      success: success
	    });
	    FontFaceOnload( "Source Sans Pro Italic", {
				weight: '300',
	      style: 'italic',
	      success: success
	    });
	    FontFaceOnload( "Source Sans Pro Bold Italic", {
	      weight: 600,
	      style: 'italic',
	      success: success
	    });
	  }
	});
})( window.document );
</script>
</body>

</html>
