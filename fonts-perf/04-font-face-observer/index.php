<html lang="fr">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Fonts perf tests - Font Face Observer</title>
<style>
<?php
include './styles.css.php';
?>
</style>
</head>

<body>
<h1>Fonts perf tests</h1>
<?php include '../menu.php'; ?>
<h2>Font Face Observer</h2>
<p>As defined in Filament Group's <a href="http://www.filamentgroup.com/lab/font-events.html">Font Loading Revisited with Font Events</a> article.</p>
<?php include '../starem-warsum.php'; ?>

<script>
/* Load fonts */
<?php
include '../javascript/fontfaceobserver.standalone.js';
?>
(function(w){
  var observer = new w.FontFaceObserver("Source Sans Pro", { weight: 300 });
  var fontA = new w.FontFaceObserver( "Source Sans Pro", {
		weight: 300
	});
	var fontB = new w.FontFaceObserver( "Source Sans Pro", {
		weight: 600
	});
	var fontC = new w.FontFaceObserver( "Source Sans Pro", {
		weight: 300,
		style: "italic"
	});
	var fontD = new w.FontFaceObserver( "Source Sans Pro", {
		weight: 600,
		style: "italic"
	});
	w.Promise
		.all([fontA.check(), fontB.check(), fontC.check(), fontD.check()])
		.then(function(){
			w.document.documentElement.className += " fonts-loaded";
		});
}(this));
</script>
</body>

</html>
