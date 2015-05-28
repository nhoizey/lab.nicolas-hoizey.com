<html lang="fr">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Fonts perf tests - Flash of Faux Text</title>
<style>
<?php
include './styles.css.php';
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
include '../javascript/fontfaceobserver.standalone.js';
include '../javascript/loadCSS.js';
?>
/* Load fonts */
(function(w){
  var observer = new w.FontFaceObserver("Source Sans Pro", { weight: 300 });
  observer.check(null, 5000).then(function() {
    w.document.documentElement.className += " fonts-loaded";
    w.loadCSS('./more-fonts.css.php');
  });
}(this));
</script>
</body>

</html>
