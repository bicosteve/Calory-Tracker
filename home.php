<?php require_once 'includes/header.php'; ?>
<div class="container theme-showcase col-sm-6 col-sm-offset-3" role="main">
  <div class="row">
    <div>
      <form method="POST" action="/">
        <div class="form-group">
          <label for="new-day">New Day</label>
          <input type="date" class="form-control" id="new-day" />
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
      </form>

      <div class="page-header"></div>

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">January 28, 2017</h3>
        </div>
        <div class="panel-body">
          <ul class="nav nav-pills" role="tablist">
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
            <li>
              <a href="day.html" type="button" class="btn btn-link">View Detail</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once 'includes/footer.php'; ?>