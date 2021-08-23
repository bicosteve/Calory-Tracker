<?php 

require_once 'includes/db.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location: login.php');
}

if(isset($_GET['delete'])){
  $foodid = (int) $_GET['delete'];
  $result = $db->prepare("DELETE FROM foods WHERE foodid=:foodid");
  $result->execute([':foodid'=>$foodid]);
  header('location:day.php');
}