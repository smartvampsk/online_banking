<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }
  if (isset($_SESSION['user'])) {
      header('location:home');
  }
?>

<div class="card card-login mx-auto mt-5">
  <div class="card-header">Login</div>
  <div class="card-body">
    <?php
      if (!empty($msg) || isset($_GET['msg'])) {
        if (isset($_GET['msg'])) {
          $msg = $_GET['msg'];
        }
        echo '<p class="text-dark text-center bg-info rounded py-1">'.$msg.'</p>';
       }
    ?>
    <form method="POST">
      <div class="form-group">
        <div class="form-label-group">
          <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
          <label for="inputUsername" class="form-control">Username</label>
        </div>
      </div>
      <div class="form-group">
        <div class="form-label-group">
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
          <label for="inputPassword">Password</label>
        </div>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="1" name="remember"> Remember Password
          </label>
        </div>
      </div>
      <button class="btn btn-primary btn-block" name="login">Login</button>
    </form>
    <div class="text-center">
      <a class="d-block small mt-3" href="">Forgot Password?</a>
    </div>
  </div>
</div>