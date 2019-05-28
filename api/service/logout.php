<?php
$app->post('/logout', function ($req, $res, $args) {
	unset($_SESSION['user']);
	$data['message'] = 'Logout Successful';
	return $res->withJson($data);
});
?>