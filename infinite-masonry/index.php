<html>
<head>
	<title>Progressively enhanced infinite scrolling masonry</title>
	<script src="/shared/jquery-3.6.0.slim.min.js"></script>
	<script src="js/vendor/masonry.pkgd.min.js"></script>
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

	.next {
		text-align: center;
	}

	.next a, .next a:visited {
		display: inline-block;
		width: 50%;
		padding: 5px;
		font-weight: bold;
		background-color: #666;
		color: #fff;
		text-decoration: none;
	}

	.next a:hover {
		background-color: #669;
		color: #ccf;
	}
	</style>
</head>
<body>
<div id="container">
	<?php
	$start = isset($_GET['start']) ? $_GET['start'] : 1;
	include_once 'products.php';
	?>
</div>
<p class="next"><a href="?start=<?php echo $start + 1; ?>">Voir les produits suivants</a></p>

<script>
$('#container').masonry({
  itemSelector: '.item'
});

$('.next a').on('click', function (event) {
	event.preventDefault();
	$this = $(this);
	$.get('products.php' + $this.attr('href'), function(data) {
		$data = $(data);
		$container = $('#container');
	  $container.append($data);
	  $container.masonry('appended', $data);
	  index = parseInt($this.attr('href').replace(/^.*=([0-9]+)$/, '$1'), 10);
	  $this.attr('href', '?start=' + (index + 1));
	});
});

<!-- Matomo -->
  var _paq = (window._paq = window._paq || []);
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);
  (function () {
    var u = "//data.nicolas-hoizey.com/";
    _paq.push(["setTrackerUrl", u + "matomo.php"]);
    _paq.push(["setSiteId", "7"]);
    var d = document,
      g = d.createElement("script"),
      s = d.getElementsByTagName("script")[0];
    g.async = true;
    g.src = u + "matomo.js";
    s.parentNode.insertBefore(g, s);
  })();
<!-- End Matomo Code -->
</script>
</body>
</html>
