<?php $currentPage = 'Add Food';  ?>
<?php

require_once 'includes/db.php';
require_once 'update.php';

if(!isset($_SESSION['username'])){
  header('location: login.php');
  exit();
}


if(isset($_GET['edit'])){
    $foodid = (int) $_GET['edit'];
    $selectfood = $db->prepare("SELECT * FROM foods WHERE foodid=:foodid");
    $selectfood->execute([':foodid'=>$foodid]);
    $row = $selectfood->fetch(PDO::FETCH_ASSOC);
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
          <h3 class="panel-title">Edit Food</h3>
        </div>

        <div class="panel-body">
          <form action="update.php" method="POST">
            <input type="hidden" name="foodid" value="<?php echo $row['foodid'] ?>">
            <div class="form-group">
              <label for="day">Day</label>
              <input type="date" class="form-control" id="day" name="day" value="<?php echo $row['day']; ?>" />
              <?php echo isset($day_err)?"<span class='text-danger'>{$day_err}</span>":"" ?>
            </div>
            <div class="form-group">
              <label for="food-name">Food Name</label>
              <input type="text" class="form-control" value="<?php echo $row['food_name']; ?>" name="food-name"
                id="food-name" />
              <?php echo isset($food_err)?"<span class='text-danger'>{$food_err}</span>":"" ?>
            </div>
            <div class="form-group">
              <label for="protein">Protein</label>
              <input type="number" class="form-control" name="protein" id="protein"
                value="<?php echo $row['protein']; ?>" />
              <?php echo isset($protein_err)?"<span class='text-danger'>{$protein_err}</span>":"" ?>
            </div>
            <div class="form-group">
              <label for="carbohydrates">Carbohydrates</label>
              <input name="carbohydrates" type="number" class="form-control" id="carbohydrates"
                value="<?php echo $row['cabohydrates']; ?>" />
              <?php echo isset($carbohydrates_err)?"<span class='text-danger'>{$carbohydrates_err}</span>":"" ?>
            </div>
            <div class="form-group">
              <label for="fat">Fat</label>
              <input name="fat" type="number" class="form-control" id="fat" value="<?php echo $row['fat']; ?>" />
              <?php echo isset($fat_err)?"<span class='text-danger'>{$fat_err}</span>":"" ?>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
          </form>

          <div class="page-header"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>