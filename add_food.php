<?php $currentPage = 'Add Food'; //git push -u origin master ?>
<?php
require_once 'includes/db.php';

session_start();

if(isset($_POST['add_food']) == 'POST'){

  $day = trim($_POST['day']);
  $food_name = trim($_POST['food-name']);
  $protein = (int) trim($_POST['protein']);
  $carbohydrates = (int) trim($_POST['carbohydrates']);
  $fat = (int) trim($_POST['fat']);
  $userid = (int) $_SESSION['userid'];
  $calory = $protein * $carbohydrates * $fat;

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
  } else if(!preg_match('/^[0-9]*$/',$fat)){
    $fat_err = 'This field only take digits';
  }

  if(!isset($day_err) && !isset($food_err) && !isset($protein_err) && !isset($carbohydrates_err) && !isset($fat_err)){
    try{
      $sql = "INSERT INTO foods(food_name,protein,cabohydrates,fat,userid,day,calory) VALUES(:food_name,:protein,:cabohydrates,:fat,:userid,:day, :calory)";
      
      $insert_stmt = $db->prepare($sql);
      $values = [':food_name'=>$food_name,':protein'=>$protein,':cabohydrates'=>$carbohydrates,':fat'=>$fat,':userid'=>$userid,':day'=>$day,':calory'=>$calory];
      $result = $insert_stmt->execute($values);
      
      if(!$result){
        $db_err = 'Failed to submit';
        $_SESSION['message'] = 'Submission unsuccessful';
        $_SESSION['msg_type'] = 'danger';
      } else{
        $_SESSION['message'] = 'Successfully submited';
        $_SESSION['msg_type'] = 'success';
        header('refresh:2; home.php');
      }
      
    }catch(Exception $er){
      echo $er->getMessage();
    }

  }
}

?>

<?php require_once 'includes/header.php'; ?>
<div class="container theme-showcase col-sm-6 col-sm-offset-3" role="main">
  <!--SESSION MESSAGE-->
  <?php if(isset($_SESSION['message'])): ?>
  <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>
  </div>
  <?php endif; ?>
  <div class="row mt-2">
    <div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Foods</h3>
        </div>

        <div class="panel-body">
          <form method="POST" action="add_food.php">
            <div class="form-group">
              <label for="day">Day</label>
              <input type="date" class="form-control" id="day" name="day" placeholder="Day" />
              <?php echo isset($day_err)?"<span class='text-danger'>{$day_err}</span>":"" ?>
            </div>
            <div class="form-group">
              <label for="food-name">Food Name</label>
              <input type="text" class="form-control" name="food-name" id="food-name" placeholder="Food Name" />
              <?php echo isset($food_err)?"<span class='text-danger'>{$food_err}</span>":"" ?>
            </div>
            <div class="form-group">
              <label for="protein">Protein</label>
              <input type="number" class="form-control" name="protein" id="protein" placeholder="Protein" />
              <?php echo isset($protein_err)?"<span class='text-danger'>{$protein_err}</span>":"" ?>
            </div>
            <div class="form-group">
              <label for="carbohydrates">Carbohydrates</label>
              <input name="carbohydrates" type="number" class="form-control" id="carbohydrates"
                placeholder="Carbohydrates" />
              <?php echo isset($carbohydrates_err)?"<span class='text-danger'>{$carbohydrates_err}</span>":"" ?>
            </div>
            <div class="form-group">
              <label for="fat">Fat</label>
              <input name="fat" type="number" class="form-control" id="fat" placeholder="Fat" />
              <?php echo isset($fat_err)?"<span class='text-danger'>{$fat_err}</span>":"" ?>
            </div>
            <button type="submit" class="btn btn-primary" name="add_food">Add</button>
          </form>

          <div class="page-header"></div>

          <ul class="nav nav-pills" role="tablist">
            <li class="active"><a>Pizza</a></li>
            <li>
              <a>Protein: <span class="badge">100</span></a>
            </li>
            <li>
              <a>Carbohydrates: <span class="badge">200</span></a>
            </li>
            <li>
              <a>Fat: <span class="badge">50</span></a>
            </li>
            <li>
              <a>Calories: <span class="badge">1650</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>