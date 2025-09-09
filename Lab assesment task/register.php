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

    <div class="card" style="max-width:650px;margin:16px auto;">
      <div class="caption">REGISTRATION</div>
      <form method="post" action="register.php">
        <div class="form-row"><label>Name</label><input type="text" name="name" required/></div>
        <div class="form-row"><label>Email</label><input type="email" name="email" required/></div>
        <div class="form-row"><label>User Name</label><input type="text" name="username" required/></div>
        <div class="form-row"><label>Password</label><input type="password" name="password" required/></div>
        <div class="form-row"><label>Confirm Password</label><input type="password" name="confirm_password" required/></div>
        <div class="form-row">
          <label>Gender</label>
          <label style="width:auto;"><input type="radio" name="gender" value="Male" checked/> Male</label>
          <label style="width:auto;margin-left:14px;"><input type="radio" name="gender" value="Female"/> Female</label>
          <label style="width:auto;margin-left:14px;"><input type="radio" name="gender" value="Other"/> Other</label>
        </div>
        <div class="form-row"><label>Date Of Birth</label><input type="date" name="dob" required/></div>
        <div class="form-row">
          <label></label>
          <input type="submit" value="Submit"/> <input type="reset" value="Reset" class="btn"/>
        </div>
      </form>
      <?php
      if($_SERVER['REQUEST_METHOD']==='POST'){
        // For layout demo only; pretend registration success
        $_SESSION['user'] = ['name'=>$_POST['name'], 'email'=>$_POST['email'], 'gender'=>$_POST['gender'], 'dob'=>$_POST['dob']];
        header('Location: dashboard.php');
        exit;
      }
      ?>
    </div>

    <div class="footer">&copy; 2017</div>
  </div>
</body>
</html>
