<?php
$start = isset($_GET['start']) ? $_GET['start'] : 1;
for ($i = ($start - 1) * 20 + 1; $i <= $start * 20; $i++) {
	if (rand(0,1) === 0) {
		echo '<div class="item"><img src="img/rectangle-272x410-'.rand(1,5).'.png" width="272" height="410" /><p>'.$i.'</p></div>';
	} else {
		echo '<div class="item"><img src="img/carre-272x272-'.rand(1,5).'.png" width="272" height="272" /><p>'.$i.'</p></div>';
	}
}
