<?php

session_start();
//
//set_exception_handler(function(Exception $e) {
//    if ($e instanceof \Exceptions\RegisterException) {
//        header("Location: register.php?error=1");
//        exit;
//    }
//
//    if ($e instanceof \Exceptions\LoginException) {
//        $_SESSION['error'] = $e->getMessage();
//        header("Location: login.php");
//        exit;
//    }
//
//    if ($e instanceof PDOException) {
//        echo "<h1>PDO EXCEPTION ! ! ! ! ! ! !!!!</h1>";
//    }
//});

spl_autoload_register(function($class) {
    require_once $class . '.php';
});

$db = new \Adapter\PDODatabase(
    \Config\DbConfig::DB_HOST,
    \Config\DbConfig::DB_NAME,
    \Config\DbConfig::DB_USER,
    \Config\DbConfig::DB_PASS
);
$app = new \Core\Application();
