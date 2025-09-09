<?php
// Initialize variables
$fname = $lname = $email = $contact_reason = $job_offer = $position = $comment = "";
$service = [];
$errors = [];
$success = "";

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // First Name
    if (empty($_POST["firstname"])) {
        $errors[] = "First name is required";
    } else {
        $fname = htmlspecialchars($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $errors[] = "Only letters and spaces allowed in First Name";
        }
    }

    // Last Name
    if (empty($_POST["lastname"])) {
        $errors[] = "Last name is required";
    } else {
        $lname = htmlspecialchars($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $errors[] = "Only letters and spaces allowed in Last Name";
        }
    }

    // Email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
    }

    // Contact Reason
    if (empty($_POST["contact_reason"])) {
        $errors[] = "Reason for contacting is required";
    } else {
        $contact_reason = $_POST["contact_reason"];
    }

    // Services
    if (!empty($_POST["service"])) {
        $service = $_POST["service"];
    }

    // Job Offer
    if (empty($_POST["job_offer"])) {
        $errors[] = "Please specify if you are offering a job";
    } else {
        $job_offer = $_POST["job_offer"];
    }

    // Position
    if (!empty($_POST["position"])) {
        $position = $_POST["position"];
    }

    // Comment
    if (!empty($_POST["comment"])) {
        $comment = htmlspecialchars($_POST["comment"]);
    }

    // If no errors
    if (empty($errors)) {
        $success = "✅ Form submitted successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Me</title>
  <link rel="stylesheet" href="../css/contact.css">
</head>
<body> 
<hr>
<header>
   <a href="../home.html">Home</a>   <a>||</a>
   <a href="../html/education.html">Education</a>   <a>||</a>
   <a href="../html/experience.html">Experiences</a>   <a>||</a>
   <a href="../html/projects.html">Projects</a>
</header>
<hr>

<div class="donation-container">

    <!-- Show Errors -->
    <?php if (!empty($errors)): ?>
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Show Success -->
    <?php if (!empty($success)): ?>
        <div style="color: green; margin-bottom: 15px;">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>

   <form action="" method="post">
      <h2>Contact Form</h2>

      <div class="formgroup">
        <label for="fname">First Name<span>*</span></label>
        <input class="r" type="text" id="fname" name="firstname" value="<?php echo $fname; ?>" required>
      </div>

      <div class="formgroup">
        <label for="lname">Last Name<span>*</span></label>
        <input class="r" type="text" id="lname" name="lastname" value="<?php echo $lname; ?>" required>
      </div>

      <div class="formgroup">
        <label for="email">Email<span>*</span></label>
        <input class="r" type="email" id="email" name="email" value="<?php echo $email; ?>" required>
      </div>

      <div class="formgroup">
        <label for="reason">Reason for Contacting<span>*</span></label>
        <div>
          <input type="radio" name="contact_reason" value="Project" <?php if($contact_reason=="Project") echo "checked"; ?>> Project<br>
          <input type="radio" name="contact_reason" value="Thesis" <?php if($contact_reason=="Thesis") echo "checked"; ?>> Thesis<br>
          <input type="radio" name="contact_reason" value="Meet & Greet" <?php if($contact_reason=="Meet & Greet") echo "checked"; ?>> Meet & Greet<br>
        </div>
      </div>

      <div class="formgroup">
        <label for="services">Services Interested In:</label>
        <div>
          <input type="checkbox" name="service[]" value="App Development" <?php if(in_array("App Development",$service)) echo "checked"; ?>> App Development<br>
          <input type="checkbox" name="service[]" value="Web Development" <?php if(in_array("Web Development",$service)) echo "checked"; ?>> Web Development<br>
        </div>
      </div>

      <div class="formgroup">
        <label>Are You Offering a Job?<span>*</span></label>
        <div>
          <input type="radio" name="job_offer" value="Yes" <?php if($job_offer=="Yes") echo "checked"; ?>> Yes<br>
          <input type="radio" name="job_offer" value="No" <?php if($job_offer=="No") echo "checked"; ?>> No<br>
        </div>
      </div>

      <div class="formgroup">
        <label for="position">Your Position in Company</label>
        <select name="position" id="position">
          <option value="" disabled <?php if(empty($position)) echo "selected"; ?>>Select</option>
          <option value="HR" <?php if($position=="HR") echo "selected"; ?>>HR</option>
          <option value="CEO" <?php if($position=="CEO") echo "selected"; ?>>CEO</option>
          <option value="GM" <?php if($position=="GM") echo "selected"; ?>>GM</option>
        </select>
      </div>

      <div class="formgroup">
        <label for="comment">Comments or Notes</label>
        <input class="g" type="text" id="comment" name="comment" value="<?php echo $comment; ?>">
      </div>

      <hr class="hr">

      <div class="formgroup">
        <label></label>
        <input class="button" type="reset" value="Reset">&nbsp;
        <input class="button1" type="submit" value="Submit">
      </div>
    </form>
  </div>

  <footer style="text-align: center; padding: 10px; background-color: #f0f0f0; margin-top: 30px;">
    <p>&copy; 2025 Muhammad Ashfak Uz-zaman Khan</p>
  </footer>

</body>
</html>
