<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" crossorigin="anonymous" />

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
        <a class="navbar-brand" href="#">Food Tracker</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav mr-auto">
          <?php if(isset($_SESSION['username'])): ?>
          <li><a href="home.php">Home</a></li>
          <li class="">
            <a href="add_food.php">Add Food Item</a>
          </li>
          <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if(isset($_SESSION['username'])): ?>
          <li class="nav-item"><a href="logout.php">Logout</a></li>
          <?php else: ?>
          <li class="nav-item"><a href="login.php">Login</a></li>
          <li class="nav-item"><a href="register.php">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>