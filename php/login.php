<?php
header('Content-Type: application/json; charset=utf8');
$config = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'db' => 'leave',
    'charset'=>'utf8'
];
try {
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $config['host'], $config['db'],$config['charset']);
    $pdo =  new PDO($dsn, $config['user'], $config['password']);
} catch (PDOException $e) {
    die($e->getMessage());
}
?>