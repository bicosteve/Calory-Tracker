<?php require_once 'includes/header.php'; ?>
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
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once 'includes/footer.php'; ?>