<?php
$app->post('/login', function ($req, $res, $args) {
	$db = connect_db();
	$data = $req->getParsedBody();

	$sql = "SELECT * FROM auth_users WHERE username= :username AND password= :password";

	$sth = $db->prepare($sql);

	$sth->bindParam(':username', $username);
	$sth->bindParam(':password', $password);

	$username = $data['username'];
	$password = md5($data['password']);

	$sth->execute();

	$arr = $sth->fetchAll();
	if ($arr) {
		foreach ($arr as $key => $value) {
			$data['message'] = 'Login Successful';
			$data['user'] = uniqid('ang_');
			$_SESSION['user'] = $value['id_users'];
		}
	} else {
		$data['error'] = true;
		$data['message'] = 'Invalid Login';
	}

	return $res->withJson($data);
});
?>