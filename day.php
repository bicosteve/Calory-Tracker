<?php $currentPage = 'Day';?>
<?php

require_once 'includes/db.php';
session_start();

if(isset($_POST['search']) == 'POST'){
  $day = trim($_POST['day']);
  $foods = $db->query("SELECT * FROM foods WHERE day='$day'"); 
}

$userid = (int) $_SESSION['userid'];
$results = $db->query("SELECT day FROM foods WHERE userid=$userid");

$foodNumber = 0;

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
  <div class="row">
    <div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Filter Date</h3>
        </div>

        <div class="panel-body">
          <form method="POST" action="day.php">
            <div class="form-group">
              <label for="day">Select Date</label>
              <select name="day" id="day" class="form-control">
                <?php while($row = $results->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $row['day']; ?>"><?php echo $row['day'];  ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="search">Filter</button>
          </form>

          <div class="page-header"></div>

          <ul class="nav nav-pills" role="tablist">
            <li class="active"><a>Total</a></li>
            <li>
              <a>Protein: <span class="badge">100</span></a>
            </li>
            <li>
              <a>Carbohydates: <span class="badge">200</span></a>
            </li>
            <li>
              <a>Fat: <span class="badge">50</span></a>
            </li>
            <li>
              <a>Calories: <span class="badge">1650</span></a>
            </li>
          </ul>
        </div>

        <div class="page-header"></div>
        <div class="panel-body">
          <?php if(!$foods): ?>
          <p>Please make your search.</p>
          <?php else: ?>
          <?php while( $food = $foods->fetch(PDO::FETCH_ASSOC)): ?>
          <table class="table table-hover">
            <thead>
              <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Protein</th>
                <th scope="col">Carbs</th>
                <th scope="col">Fat</th>
                <th scope="col">Calory</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-justify">
                <td><a class="btn btn-primary"
                    href="edit.php?edit=<?php echo $food['foodid']; ?>"><?php echo $food['food_name']; ?></a></td>
                <td><?php echo $food['protein']; ?></td>
                <td><?php echo $food['cabohydrates']; ?></td>
                <td><?php echo $food['fat']; ?></td>
                <td><?php echo $food['calory']; ?></td>
                <td><a class="btn btn-danger" href="delete.php?delete=<?php echo $food['foodid']; ?>">Delete</a></td>
              </tr>
            </tbody>
          </table>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once 'includes/footer.php'; ?>