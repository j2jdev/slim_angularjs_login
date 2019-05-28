<?php
$app->get('/fetch', function ($req, $res, $args) {
	$db = connect_db();
	$data = $req->getParsedBody();

	$sql = "SELECT * FROM auth_users WHERE `status` != 'disabled' AND id_users = '" . $_SESSION['user'] . "'";

	$stmt = $db->prepare($sql);
	$stmt->execute();
	$arr = $stmt->fetchAll();
	if (!$arr) {
		// exit(json_encode(array('error' => true, 'message' => 'No_Records_Found!', 'error_code' => $sql)));
	}
	return $res->withJson($arr);
});
?>