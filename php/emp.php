<?php
require 'login.php';
error_reporting(0); 
$params=json_decode(file_get_contents("php://input"),true);
$empno = $params['empno'];
$query = $pdo->query("select * from emp where empno='$empno'");
$field = $query->fetch(PDO::FETCH_ASSOC);
echo(json_encode($field,JSON_UNESCAPED_UNICODE));
?>