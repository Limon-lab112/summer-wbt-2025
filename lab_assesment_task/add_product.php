<?php

$name = $buying_price= $selling_price ="";
$display[]="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    if (empty($_POST["name"])) {
        $errors[] = " name is required";
    } else {
        $fname = htmlspecialchars($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $errors[] = "Only letters and spaces allowed in  Name";
        }
    }

    
    if (!empty($_POST["display"])) {
        $display = $_POST["display"];
    }

    
    if (empty($errors)) {
        $success = "Form submitted successfully!";
    }
}
?>


<?php
$servername = "localhost";
$name = "name";
$buying_price = "buyingPrice";
$selling_price = "sellingPrice";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

<?php
$servername = "localhost";
$name = "name";
$buying_price = "buyingPrice";
$selling_price = "sellingPrice";
$dbname = "product_db";

// Create connection
$conn = new mysqli($servername, $name, $buying_price,$selling_price, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
 
</head>
<body> 
<hr>
<header>

</header>
<hr>

<div class="form-container">

    
    <?php if (!empty($errors)): ?>
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>


    <?php if (!empty($success)): ?>
        <div style="color: green; margin-bottom: 15px;">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>

   <form action="" method="post">
      <h2>Add Product</h2>

      <div class="formgroup">
        <label for="name">Name<span>*</span></label>
        <input class="r" type="text" id="name" name="name" value="<?php echo $name; ?>" required>
      </div>

      <div class="formgroup">
        <label for="buying_price">Buying Price<span>*</span></label>
        <input class="r" type="is_integer" id="buyingPrice" name="buyingPrice" value="<?php echo $buying_price; ?>" required>
      </div>

     <div class="formgroup">
        <label for="selling_price">Selling price<span>*<span></label>
        <input class="r" type="is_integer" id="sellingPrice" name="sellingPrice" value="<?php echo $selling_price; ?>" required>
      </div>


      

      

      <div class="formgroup">
        <label for="display">Display optin:</label>
        <hr>
        <div>
          <input type="checkbox" name="display[]" value="display" <?php if(in_array("Display",$display)) echo "checked"; ?>> Display <br>
        </div>
      </div>


<hr>
      <div class="formgroup">
        <label></label>
  
        <input class="button1" type="submit" value="Submit">
      </div>
    </form>
  </div>

  

</body>
</html>
