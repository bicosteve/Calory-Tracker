<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Food Tracker | Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet" />
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="home.html">Food Tracker</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav mr-auto">
            <li><a href="home.html">Home</a></li>
            <li><a href="add_food.html">Add Food Item</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"><a href="login.html">Login</a></li>
            <li class="nav-item"><a href="register.html">Register</a></li>
          </ul>
        </div>
      </div>
    </nav>

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
  </body>
</html>
