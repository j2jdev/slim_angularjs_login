<?php
$app->post('/session', function ($req, $res, $args) {
	if (isset($_SESSION['user'])) {
		echo 'authentified';
	}
});
?>