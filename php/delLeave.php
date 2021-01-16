
<?php
require 'login.php';
$res = array();
error_reporting(0); 
$params=json_decode(file_get_contents("php://input"),true);
$ltime = $params['ltime'];
$query = $pdo->query("DELETE  from leaverequest where ltime='$ltime'");
?>