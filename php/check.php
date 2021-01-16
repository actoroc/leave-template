<?php
require 'login.php';
error_reporting(0); 
$params=json_decode(file_get_contents("php://input"),true);
$status=$params['status'];
$empno=$params['empno'];
echo(json_encode($status,JSON_UNESCAPED_UNICODE));
$sql ="UPDATE leaverequest SET status = '$status' WHERE empno ='$empno'";
$num=$pdo->exec($sql);  
?>  