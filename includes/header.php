<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?php echo $currentPage; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/theme.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="home.php">Food Tracker</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav mr-auto">
          <li><a href="home.php">Home</a></li>
          <li class="">
            <a href="add_food.php">Add Food Item</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item"><a href="login.php">Login</a></li>
          <li class="nav-item"><a href="register.php">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>