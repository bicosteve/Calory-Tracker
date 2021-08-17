<?php $currentPage = 'Register';  ?>

<?php 
require_once 'includes/db.php';
session_start();

if(isset($_POST['register']) == 'POST'){
  
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $password2 = trim($_POST['password2']);

  if(empty($username)){
    $username_err ='Username is required';
  } elseif(!preg_match('/^[a-zA-Z0-9]*$/',$username)){
    $username_err = 'Username can only contain letters and numbers';
  }

  if(empty($email)){
    $email_err = 'Email is required';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $dmail_err = 'Provide correct email format';
  }

  if(empty($password)){
    $password_err = 'Password is required';
  }

  if(empty($password2)){
    $password_err = 'Confirm password is required';
  }

  if($password !== $password2){
    $password2_err = 'Passwords do not match';
  }

  if(!$username_err && !$email_err && !$password_err && !$password2_err){
      try{
      $select_stmt = $db->prepare("SELECT email FROM users WHERE email=:email");
      $select_stmt->execute(array(':email'=>$email));
      $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

      if($row['email'] == $email){
        $register_err = "The user already exists";
      }

      if(!isset($register_err)){
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $insert_stmt = $db->prepare("INSERT INTO users(username,email,password) VALUES (:username,:email,:password)");
        $values = [':username' => $username, ':email'=>$email, ':password'=>$hashed_password];
        $result = $insert_stmt->execute($values);
        $_SESSION['message'] = 'Successfully registered.';
        $_SESSION['msg_type'] = 'success';
        header('location: login.php'); 
      } else {
        $_SESSION['message'] = 'Registeration failed. Try again';
        $_SESSION['msg_type'] = 'warning';
      }
    }catch(Exception $er){
      $error = $er->getMessage();
      if(isset($error)){echo 'Error'.$error;}
    }
  }

}
?>




<?php require_once 'includes/header.php'; ?>
<div class="container theme-showcase col-sm-6 col-sm-offset-3" role="main">
  <div class="row">
    <div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Register</h3>
        </div>

        <div class="panel-body">
          <form method="POST" action="register.php">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
            </div>
            <div class="form-group">
              <label for="password2">Confirm Password</label>
              <input type="password" name="password2" class="form-control" id="password2"
                placeholder="Confirm Password" />
            </div>
            <button type="submit" class="btn btn-primary" name="register">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once 'includes/footer.php'; ?>