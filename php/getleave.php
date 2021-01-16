
<?php
require 'login.php';
$res = array();
error_reporting(0); 
$params=json_decode(file_get_contents("php://input"),true);
$query = $pdo->query("select * from leaverequest where status='待审核'");
while ($field = $query->fetch(PDO::FETCH_ASSOC)) {
    array_push($res,$field);
} 
echo(json_encode($res,JSON_UNESCAPED_UNICODE));
?>