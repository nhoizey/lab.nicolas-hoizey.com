<?php
$roots = array('html' => 'html', 'body' => 'body', 'default' => 'browser default size');
$sizes = array('62.5%' => '62.5%', '100%' => '100%');
$mqs = array('em' => 'em', 'rem' => 'rem', 'px' => 'px');

$root = 'default';
if (isset($_GET['root']) && in_array($_GET['root'], $roots)) {
	$root = $_GET['root'];
}
$size = 'default';
if (isset($_GET['size']) && in_array($_GET['size'], $sizes)) {
	$size = $_GET['size'];
}
$mq = 'default';
if (isset($_GET['mq']) && in_array($_GET['mq'], $mqs)) {
	$mq = $_GET['mq'];
}
?><!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Experiments with size units and Media Queries</title>
	<style>
	<?php
	if ($root != 'default') {
		echo $root.' { font-size: '.$size.'; }';
		if ($size == '62.5%') {
			?>
			h1 { font-size: 3.2em; }
			h2 { font-size: 2.4em; }
			p, .box { font-size: 1.6em; }
			<?php
		}
	}
	?>
	.box {
		background: #fc3;
		margin: 1em 0;
	}

	.px { width: 16px; }
	.px * { display: none; }

	<?php
	for ($i = 1; $i <= 50; $i++) {
		?>
		@media all and (min-width: <?php echo ($i + 2) * 16; ?>px) {
			.px { width: <?php echo $i * 16; ?>px; }
			.px .px<?php echo ($i - 1); ?> { display: none; }
			.px .px<?php echo $i; ?> { display: inline; }
		}
		<?php
	}
	?>

	.em { width: 1em; }
	.em * { display: none; }

	<?php
	for ($i = 1; $i <= 50; $i++) {
		?>
		@media all and (min-width: <?php echo ($i + 2); ?>em) {
			.em { width: <?php echo $i; ?>em; }
			.em .em<?php echo ($i - 1); ?> { display: none; }
			.em .em<?php echo $i; ?> { display: inline; }
		}
		<?php
	}
	?>

	.rem { width: 1rem; }
	.rem * { display: none; }

	<?php
	for ($i = 1; $i <= 50; $i++) {
		?>
		@media all and (min-width: <?php echo ($i + 2); ?>rem) {
			.rem { width: <?php echo $i; ?>rem; }
			.rem .rem<?php echo ($i - 1); ?> { display: none; }
			.rem .rem<?php echo $i; ?> { display: inline; }
		}
		<?php
	}
	?>
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
			echo $mqs[$mq].'</strong> with <strong>'.$roots[$root].' font-size set to '.$sizes[$size].'</strong>. <script>document.write("Your current <strong>browser default font-size is "+rfs+"px</strong>");</script>';
		} else {
			echo $mqs[$mq].'</strong> on <strong>browser default font-size</strong><script>document.write(" which is <strong>"+rfs+"px</strong>");</script>';
		}
		?>
	</p>
	<form method="get">
		<p>Now, show Media Queries in
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
	<div class="box px">This box has a width of
		<?php
		for ($i = 1; $i <= 50; $i++) {
			echo '<span class="px'.$i.'">'.($i * 16).'px</span>';
		}
		?>
		<span class="large">800px</span><span class="medium">560px</span><span class="small">320px</span>
	</div>
	<div class="box em">This box has a width of
		<?php
		for ($i = 1; $i <= 50; $i++) {
			echo '<span class="em'.$i.'">'.$i.'em</span>';
		}
		?>
	</div>
	<div class="box rem">This box has a width of
		<?php
		for ($i = 1; $i <= 50; $i++) {
			echo '<span class="rem'.$i.'">'.$i.'rem</span>';
		}
		?>
	</div>
	<p>Resize your browser or use Firefox's responsive view in dev tools to see Media Queries effect.</p>
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
