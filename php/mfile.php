
<?php
require 'login.php';
error_reporting(0); 
$params=json_decode(file_get_contents("php://input"),true);
$username = $params['username'];
$query = $pdo->query("select * from manager where mname='$username'");
$field = $query->fetch(PDO::FETCH_ASSOC);
echo(json_encode($field,JSON_UNESCAPED_UNICODE));
?>