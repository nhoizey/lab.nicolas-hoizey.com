<html lang="fr">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Fonts perf tests - Data URI fonts</title>
<style>
<?php
include './styles.css.php';
?>
</style>
<script>
<?php
include '../javascript/fontfaceobserver.standalone.js';
include '../javascript/loadCSS.js';
?>
</script>
</head>

<body>
<h1>Fonts perf tests</h1>
<?php include '../menu.php'; ?>
<h2>Data URI fonts</h2>
<?php include '../starem-warsum.php'; ?>

<script>
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
