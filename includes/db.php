<?php 

try {
$db_source = "mysql:host=localhost;dbname=calory_tracker";
$db = new PDO($db_source,'root','');
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(Exception $er){
  $error = $er->getMessage();
  echo $error;
}