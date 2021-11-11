<?php

session_start();

require_once 'includes/db.php';

if(isset($_POST['update']) == 'POST'){
  $day = trim(strip_tags($_POST['day']));
  $food_name = trim(strip_tags($_POST['food-name']));
  $protein = (int) trim(strip_tags($_POST['protein']));
  $carbohydrates = (int) trim(strip_tags($_POST['carbohydrates']));
  $fat = (int) trim(strip_tags($_POST['fat']));
  $userid = (int) $_SESSION['userid'];
  $foodid = (int) trim($_POST['foodid']);
  

  if(empty($day)){
    $day_err = 'This field is required';
  } 

  if(empty($food_name)){
    $food_err = 'This field is required';
  } else if(!preg_match('/^[a-zA-Z]*$/',$food_name)){
    $food_err = 'This field can only be letters';
  }

  if(empty($protein)){
    $protein_err = 'This field is required';
  } else if(!preg_match('/^[0-9]*$/',$protein)){
    $protein_err = 'This field only take digits';
  }

  if(empty($carbohydrates)){
    $carbohydrates_err = 'This field is required';
  } else if(!preg_match('/^[0-9]*$/',$carbohydrates)){
    $carbohydrates_err = 'This field only take digits';
  }

   if(empty($fat)){
    $fat_err = 'This field is required';
    //preg_match('/^[a-zA-Z]+$/',$firstname)
  } else if(!preg_match('/^[0-9]*$/',$fat)){
    $fat_err = 'This field only take digits';
  }

  //calculating food calories
  $calory = $protein * $carbohydrates * $fat;
  
  if(!isset($day_err) && !isset($food_err) && !isset($protein_err) && !isset($carbohydrates_err) && !isset($fat_err)){
    try{
    $sql = "UPDATE foods SET food_name=:food_name,protein=:protein,cabohydrates=:cabohydrates,fat=:fat,userid=:userid,day=:day,calory=:calory WHERE foodid=:foodid";
    $update_stmt = $db->prepare($sql);
    $values = [':food_name'=>$food_name,':protein'=>$protein,':cabohydrates'=>$carbohydrates,':fat'=>$fat,':userid'=>$userid,':day'=>$day,':calory'=>$calory,':foodid'=>$foodid];
    $result = $update_stmt->execute($values);
    
    if(!$result){
      $db_err = 'Failed to update';
      $_SESSION['message'] = 'Submission unsuccessful';
      $_SESSION['msg_type'] = 'danger';
    } else{
      $_SESSION['message'] = 'Successfully updated';
      $_SESSION['msg_type'] = 'success';
      header('location: index.php');
      exit();
    }
    
  }catch(Exception $er){
    echo $er->getMessage();
  }
  }
}
