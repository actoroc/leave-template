
<?php
require 'login.php';
$res = array();
error_reporting(0); 
$query = $pdo->query("select * from leaverequest");
while ($field = $query->fetch(PDO::FETCH_ASSOC)) {
    array_push($res,$field);
} 
echo(json_encode($res,JSON_UNESCAPED_UNICODE));
?>