<?php
if(session_status() === PHP_SESSION_NONE){ session_start(); }
$user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>XCompany</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="container">
    <div class="topnav header">
      <div class="brand"><span class="logo"></span><span class="x">X</span>Company</div>
      <div class="links">
        <?php if(!$user): ?>
          <a href="index.php">Home</a> |
          <a href="login.php">Login</a> |
          <a href="register.php">Registration</a>
        <?php else: ?>
          Logged in as <a href="view_profile.php"><?= htmlspecialchars($user['name']) ?></a> |
          <a href="logout.php">Logout</a>
        <?php endif; ?>
      </div>
    </div>

    <div class="card" style="max-width:520px;margin:16px auto;">
      <div class="caption">LOGIN</div>
      <form method="post" action="login.php">
        <div class="form-row">
          <label>User Name :</label>
          <input type="text" name="username" required/>
        </div>
        <div class="form-row">
          <label>Password :</label>
          <input type="password" name="password" required/>
        </div>
        <div class="form-row">
          <label></label>
          <input type="checkbox" name="remember" id="remember"><label for="remember" style="width:auto;margin-left:8px;">Remember Me</label>
        </div>
        <div class="form-row">
          <label></label>
          <input type="submit" value="Submit" />
          &nbsp;&nbsp;<a href="forgot_password.php">Forgot Password?</a>
        </div>
      </form>
      <?php
      if($_SERVER['REQUEST_METHOD']==='POST'){
        // Dummy login
        $_SESSION['user'] = ['name'=>'Bob','email'=>'bob@aiub.edu','gender'=>'Male','dob'=>'1998-09-19'];
        header('Location: dashboard.php');
        exit;
      }
      ?>
    </div>

    <div class="footer">&copy; 2017</div>
  </div>
</body>
</html>
