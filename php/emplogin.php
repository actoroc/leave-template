<?php
require 'login.php';
// $res = array();
error_reporting(0); 
$params=json_decode(file_get_contents("php://input"),true);
$username = $params['username'];
$password = $params['password'];
$false = false;
$query = $pdo->query("select * from id where empno = $username");
if($field = $query->fetch(PDO::FETCH_ASSOC)){
    if($field['paw']==$password){
        $query1 = $pdo->query("select ename from emp where empno = $username");
        $field1 = $query1->fetch(PDO::FETCH_ASSOC);
        echo(json_encode($field1,JSON_UNESCAPED_UNICODE));
    }else {
        echo(json_encode($false,JSON_UNESCAPED_UNICODE));
    }
}else {
    echo(json_encode($false,JSON_UNESCAPED_UNICODE));
}
// echo(json_encode($res,JSON_UNESCAPED_UNICODE));
?>