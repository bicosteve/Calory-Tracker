<?php 

require_once 'includes/db.php';

if(isset($_GET['delete'])){
  $foodid = (int) $_GET['delete'];
  $sql = "DELETE FROM foods WHERE foodid=:foodid";
  $result = $db->prepare($sql);
  $value = [':foodid'=>$foodid];
  $result->execute($value);
  header('location:day.php');
}