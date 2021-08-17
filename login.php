<?php $currentPage = 'Login';?>
<?php 

require_once 'includes/db.php';

session_start();

if(isset($_SESSION['username'])){
  header('location: home.php');
} 

if(isset($_POST['login']) == 'POST'){
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  if(empty($email)){
    $email_err = 'Email is required';
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_err = 'Incorrect email format';
  }

  if(empty($password)){
    $password_err = 'Password is required';
  }

  if(!isset($email_err) && !isset($password_err)){
    $select_stmt = $db->prepare("SELECT * FROM users WHERE email=:email");
    $values = [':email'=>$email];
    $select_stmt->execute($values);
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if($select_stmt->rowCount() < 1){
      $user_err = 'User does not exist.  Please register';
    }

    if(!isset($user_err)){
      if($email == $row['email'] && password_verify($password,$row['password'])){
        session_start();
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['message'] = 'You are successfully logged in';
        $_SESSION['msg_type'] = 'success';
        header('location: add_food.php');
      } else {
        $loggin_err = 'Your password and email do not match.';
        $_SESSION['message'] = 'Login failed. Try again';
        $_SESSION['msg_type'] = 'warning';
      }
      
    }

  }

}

?>

<?php require_once 'includes/header.php'; ?>
<div class="container theme-showcase col-sm-6 col-sm-offset-3" role="main">
  <!--SESSION MESSAGE-->
  <?php if(isset($_SESSION['message'])): ?>
  <div class="my-1">
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
      <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>
    </div>
  </div>
  <?php endif; ?>
  <div class="row">
    <div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Login</h3>
        </div>

        <div class="panel-body">
          <form method="POST" action="login.php">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
              <?php echo isset($email_err)?"<span class='text-danger'>{$email_err}</span>":"" ?>
              <?php echo isset($user_err)?"<span class='text-danger'>{$user_err}</span>":"" ?>
              <?php echo isset($login_err)?"<span class='text-danger'>{$login_err}</span>":"" ?>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
              <?php echo isset($password_err)?"<span class='text-danger'>{$password_err}</span>":"" ?>
              <?php echo isset($login_err)?"<span class='text-danger'>{$login_err}</span>":"" ?>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once 'includes/footer.php'; ?>