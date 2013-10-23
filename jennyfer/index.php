<html>
<head>
	<title>Jennyfer</title>
	<script src="masonry.pkgd.min.js"></script>
	<style>
	body {
		background-color: #fff;
		color: #333;
	}

	#container {
		width: 900px;
		margin: 0 auto;
	}

	.item {
		position: relative;
		margin: 0;
		padding: 10px;
	}

	.item p {
		position: absolute;
		z-index: 2;
		top: 20px;
		left: 20px;
		font-size: 3em;
		margin: 0;
		padding: 0 10px;
		background-color: #666;
		color: #fff;
		opacity: .7;
	}
	</style>
</head>
<body>
<div id="container">
	<?php
	for ($i = 1; $i <= 30; $i++) {
		if (rand(0,1) === 0) {
			echo '<div class="item"><img src="img/rectangle-272x410-'.rand(1,5).'.png" width="272" height="410" /><p>'.$i.'</p></div>';
		} else {
			echo '<div class="item"><img src="img/carre-272x272-'.rand(1,5).'.png" width="272" height="272" /><p>'.$i.'</p></div>';
		}
	}
	?>
</div>
<script>
var container = document.querySelector('#container');
var msnry = new Masonry( container, {
  // options
  // containerStyle: null,
  // columnWidth: 282,
  itemSelector: '.item'
});
</script>
</body>
</html>
