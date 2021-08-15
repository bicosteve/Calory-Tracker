<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Food Tracker | Add Food</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet" />
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Food Tracker</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav mr-auto">
            <li><a href="home.html">Home</a></li>
            <li class="active">
              <a href="add_food.html">Add Food Item</a>
            </li>
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
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Login</h3>
            </div>

            <div class="panel-body">
              <form method="POST" action="/">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email"
                  />
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="password"
                    placeholder="Password"
                  />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
