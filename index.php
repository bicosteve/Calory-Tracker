<?php $currentPage = 'Home';?>
<?php
session_start();
require_once 'includes/db.php';
if(!isset($_SESSION['username'])){
  header('location: login.php');
}

$userid = $_SESSION['userid'];

$stmt = $db->prepare("SELECT * FROM foods WHERE userid = :userid ORDER BY foodid DESC");
$stmt->bindParam('userid',$userid);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require_once 'includes/header.php'; ?>
<div class="container theme-showcase col-sm-6 col-sm-offset-3" role="main">
  <div class="row">
    <div>
      <div class="page-header"></div>

      <?php if($stmt->rowCount() > 0): ?>
        
      <div class="panel panel-primary">
        <?php foreach($result as $row): ?>
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $row['day']; ?></h3>
        </div>
        <div class="panel-body">
          <ul class="nav nav-pills" role="tablist">
            <li>
              <a>Protein: <span class="badge"><?php echo $row['protein']; ?></span></a>
            </li>
            <li>
              <a>Carbohydates: <span class="badge"><?php echo $row['cabohydrates']; ?></span></a>
            </li>
            <li>
              <a>Fat: <span class="badge"><?php echo $row['fat'] ?></span></a>
            </li>
            <li>
              <a>Calories: <span class="badge"><?php echo $row['calory'] ?></span></a>
            </li>
            <li>
              <a href="day.php" type="button" class="btn btn-primary btn-link">View Detail</a>
            </li>
          </ul>
        </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>

      <p style="text-align:center;">You have not tracked your food consumption.</p>

    <?php endif; ?>

    </div>
  </div>
</div>
<?php require_once 'includes/footer.php'; ?>
