<?php
require 'login.php';
error_reporting(0); 
$params=json_decode(file_get_contents("php://input"),true);
$empno=$params['empno'];
$name=$params['name'];
$desc=$params['desc'];
$email=$params['email'];
$manager=$params['manager'];
$region=$params['region'];
$value=$params['value'];
$dept=$params['dept'];
$day=$params['day'];
$sql ="INSERT INTO `leaverequest` (`empno`,`ename`,`dept`,`email`,`leavetype`,`mname`,`ltime`,`leavereason`,`day`,`status`) VALUES ('$empno','$name','$dept','$email','$region','$manager','$value','$desc','$day','待审核  ')";
$num=$pdo->exec($sql);
?>  