<?php include '_auth.php'; ?>
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

    <div class="grid">
      <aside class="sidebar">
        <div class="caption">Account</div>
        <ul>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="view_profile.php">View Profile</a></li>
          <li><a href="edit_profile.php">Edit Profile</a></li>
          <li><a href="profile_picture.php">Change Profile Picture</a></li>
          <li><a href="change_password.php">Change Password</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </aside>
      <main class="card" style="max-width:520px;">
        <div class="caption">PROFILE PICTURE</div>
        <img class="avatar" src="https://via.placeholder.com/120x120.png?text=Avatar" alt="avatar"/>
        <form method="post" action="profile_picture.php" enctype="multipart/form-data" style="margin-top:12px;">
          <input type="file" name="photo" />
          <div class="form-row"><label></label><input type="submit" value="Submit"/></div>
        </form>
        <?php if($_SERVER['REQUEST_METHOD']==='POST'){ echo '<div class="notice">Upload endpoint not implemented (layout only).</div>'; } ?>
      </main>
    </div>

    <div class="footer">&copy; 2017</div>
  </div>
</body>
</html>
