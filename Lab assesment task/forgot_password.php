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
      <div class="caption">FORGOT PASSWORD</div>
      <form method="post" action="forgot_password.php">
        <div class="form-row">
          <label>Enter Email:</label>
          <input type="email" name="email" required/>
        </div>
        <div class="form-row">
          <label></label>
          <input type="submit" value="Submit" />
        </div>
      </form>
      <?php if($_SERVER['REQUEST_METHOD']==='POST'): ?>
        <div class="notice">If this email exists, a reset link would be sent.</div>
      <?php endif; ?>
    </div>

    <div class="footer">&copy; 2017</div>
  </div>
</body>
</html>
