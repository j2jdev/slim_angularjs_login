<?php
error_reporting(0);
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require './config_db.php';
require '../vendor/autoload.php';

$app = new \Slim\App();

require './service/login.php';
require './service/fetch.php';
require './service/logout.php';
require './service/session.php';

$app->get('/get_data', function ($req, $res, $args) {
    $db = connect_db();

    $sql = "SELECT * FROM md LIMIT 1000";

    $sth = $db->prepare($sql);
    $sth->execute();

    $result = $sth->fetchAll();
    // $count = $sth->rowCount();

    return $res->withJson($result);
});

$app->run();
