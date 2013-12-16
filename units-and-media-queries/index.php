<?php
$roots = array('html' => 'html', 'body' => 'body', 'default' => 'browser default size');
$sizes = array('62.5%' => '62.5%', '100%' => '100%', 'default' => 'browser default size');
$mqs = array('em' => '40em', 'rem' => '40rem', 'px' => '640px');
$smallBoxSizes = array('em' => '20em', 'rem' => '20rem', 'px' => '320px');
$largeBoxSizes = array('em' => '30em', 'rem' => '30rem', 'px' => '480px');

$root = 'default';
if (isset($_GET['root']) && isset($roots[$_GET['root']])) {
	$root = $_GET['root'];
}
$size = 'default';
if (isset($_GET['size']) && isset($sizes[$_GET['size']])) {
	$size = $_GET['size'];
}
$mq = 'em';
if (isset($_GET['mq']) && isset($mqs[$_GET['mq']])) {
	$mq = $_GET['mq'];
}
?><!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Experiments with size units and Media Queries</title>
	<style>
	* {
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	body {
		font-family: "Avenir Next", Avenir, sans-serif;
		margin: 0;
		padding: 0;
	}

	h1, h2, p {
		margin: 20px;
	}

	<?php
	if ('default' !== $root) {
		if ('default' !== $size) {
			echo $root.' { font-size: '.$size.'; }';
		}
		if ('62.5%' === $size) {
			?>
			h1 { font-size: 3.2em; }
			h2 { font-size: 2.4em; }
			p, .box { font-size: 1.6em; }
			<?php
		}
	}
	?>
	.box {
		margin: 20px 0;
		padding: 5px 10px;
		background: #fc3;
	}

	.reference {
		width: <?php echo $mqs[$mq]; ?>;
		background: #cc9;
	}

	.em { width: <?php echo $smallBoxSizes['em']; ?>; }
	.rem { width: <?php echo $smallBoxSizes['rem']; ?>; }
	.px { width: <?php echo $smallBoxSizes['px']; ?>; }

	.large { display: none; }

	@media screen and (min-width: <?php echo $mqs[$mq]; ?>) {
		.em { width: <?php echo $largeBoxSizes['em']; ?>; }
		.rem { width: <?php echo $largeBoxSizes['rem']; ?>; }
		.px { width: <?php echo $largeBoxSizes['px']; ?>; }

		.small { display: none; }
		.large { display: inline; }
	}
	</style>
</head>

<body>
<script>
var dummy = document.createElement('div');
dummy.innerHTML = '<p>dummy text</p>';
dummy.setAttribute('style', 'height: 4em');
document.body.insertBefore(dummy, document.body.childNodes[0]);
var rfs = Math.round(parseInt(dummy.offsetHeight, 10) / 4 * 100<?php echo ($root != 'default' && $size == '62.5%' ? ' * 1.6' : ''); ?>) / 100;
dummy.parentNode.removeChild(dummy);
</script>

	<h1>Experiments with size units and Media Queries</h1>
	<p>Currently showing <strong>Media Queries in
		<?php
		if ($root != 'default') {
			echo $mqs[$mq].'</strong> with <strong>'.$roots[$root].' font-size set to '.$sizes[$size].'</strong>. <script>document.write("<br />Your current <strong>browser default font-size is "+rfs+"px</strong>.");</script>';
		} else {
			echo $mqs[$mq].'</strong> on <strong>browser default font-size</strong><script>document.write(" which is <strong>"+rfs+"px</strong>");</script>';
		}
		?>
	</p>
	<form method="get">
		<p>Now, set a min-width Media Query at
			<select name="mq">
				<?php
				foreach($mqs as $mqValue => $mqLabel) {
					echo '<option value="'.$mqValue.'"'.($mq == $mqValue ? ' selected="selected"' : '').'>'.$mqLabel.'</option>';
				}
				?>
			</select>
			with
			<select name="root" onchange="if (this.value == 'default') { document.getElementById('sizeSelector').style='display: none'; } else { document.getElementById('sizeSelector').style='display: inline'; }"> <!-- that's ugly, I know -->
				<?php
				foreach($roots as $rootValue => $rootLabel) {
					echo '<option value="'.$rootValue.'"'.($root == $rootValue ? ' selected="selected"' : '').'>'.$rootLabel.'</option>';
				}
				?>
			</select>
			<span id="sizeSelector" <?php if ($root == 'default') { echo ' style="display: none;"'; } ?>>
				set to
				<select name="size">
					<?php
					foreach($sizes as $sizeValue => $sizeLabel) {
						echo '<option value="'.$sizeValue.'"'.($size == $sizeValue ? ' selected="selected"' : '').'>'.$sizeLabel.'</option>';
					}
					?>
				</select>
			</span>
			<input type="submit" value="apply!" />
		</p>
	</form>
	<p>Current Media Query applied: <strong><span class="small">smaller</span><span class="large">larger</span></strong> than <?php echo $mqs[$mq]; ?></p>
	<div class="box reference">This reference box has a width of <?php echo $mqs[$mq]; ?></div>
	<div class="box em">This box has a width of <span class="small"><?php echo $smallBoxSizes['em']; ?></span><span class="large"><?php echo $largeBoxSizes['em']; ?></span></div>
	<div class="box rem">This box has a width of <span class="small"><?php echo $smallBoxSizes['rem']; ?></span><span class="large"><?php echo $largeBoxSizes['rem']; ?></span></div>
	<div class="box px">This box has a width of <span class="small"><?php echo $smallBoxSizes['px']; ?></span><span class="large"><?php echo $largeBoxSizes['px']; ?></span></div>
	<p>Resize your browser — or use Firefox's responsive view in dev tools — to see Media Queries effect.<br />Change your root font size settings to see the impact of em/rem units.</p>
	<script>
	// Google Univeral Analytics
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-1655999-7', 'gasteroprod.com');
	ga('send', 'pageview');
	</script>
</body>

</html>
