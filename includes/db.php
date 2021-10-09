<?php 

/*
Username: O0l7yfcFWH

Database name: O0l7yfcFWH

Password: UFQT7CEeyb

Server: remotemysql.com

Port: 3306

*/

$hostname = 'remotemysql.com';
$dbname = 'O0l7yfcFWH';
$dbusername = 'O0l7yfcFWH';
$dbpassword = 'UFQT7CEeyb';

try {
  //local config
//$db_source = "mysql:host=localhost;dbname=calory_tracker";
//$db = new PDO($db_source,'root','');

//remote config
$db_source = "mysql:host=$hostname;dbname=$dbname";
$db = new PDO($db_source,$dbusername,$dbpassword);

$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(Exception $er){
  $error = $er->getMessage();
  echo $error;
}