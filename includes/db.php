<?php 

  $hostname = 'remotemysql.com';
  $dbname = 'O0l7yfcFWH';
  $dbusername = 'O0l7yfcFWH';
  $dbpassword = 'UFQT7CEeyb';

  try {
  //remote config
  $db_source = "mysql:host=$hostname;dbname=$dbname";
  $db = new PDO($db_source,$dbusername,$dbpassword);

  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  } catch(Exception $er){
    $error = $er->getMessage();
    echo $error;
  }
