<?php $currentPage = 'Day';?>
<?php

session_start();


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
          <h3 class="panel-title">January 28, 2017</h3>
        </div>

        <div class="panel-body">
          <form method="POST" action="/">
            <div class="form-group">
              <select class="form-control">
                <option>1</option>
                <option>2</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
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
          <ul class="nav nav-pills" role="tablist">
            <li class="active"><a>Pizza</a></li>
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
      </div>
    </div>
  </div>
</div>
<?php require_once 'includes/footer.php'; ?>