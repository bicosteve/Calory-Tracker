<?php $currentPage = 'Add Food'; //git push -u origin master ?>

<?php require_once 'includes/header.php'; ?>
<div class="container theme-showcase col-sm-6 col-sm-offset-3" role="main">
  <div class="row">
    <div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Foods</h3>
        </div>

        <div class="panel-body">
          <form method="POST" action="/">
            <div class="form-group">
              <label for="food-name">Day</label>
              <input type="date" class="form-control" id="food-name" placeholder="Food Name" />
            </div>
            <div class="form-group">
              <label for="food-name">Food Name</label>
              <input type="text" class="form-control" id="food-name" placeholder="Food Name" />
            </div>
            <div class="form-group">
              <label for="protein">Protein</label>
              <input type="number" class="form-control" id="protein" placeholder="Protein" />
            </div>
            <div class="form-group">
              <label for="carbohydrates">Carbohydrates</label>
              <input type="number" class="form-control" id="carbohydrates" placeholder="Carbohydrates" />
            </div>
            <div class="form-group">
              <label for="fat">Fat</label>
              <input type="number" class="form-control" id="fat" placeholder="Fat" />
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
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