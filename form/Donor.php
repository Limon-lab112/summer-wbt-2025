



<?php

$firstname = $lastname = $company = $address1 = $address2 = $city = $state = $zip = $country = $fax = $mail = $amount = "";
$firstnameErr = $lastnameErr = $address1Err = $cityErr = $stateErr = $zipErr = $countryErr = $mailErr = $amountErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

   
    if (empty($_POST["firstname"])) {
        $firstnameErr = "First Name is required";
    } else {
        $firstname = test_input($_POST["firstname"]);

          if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
        $firstnameErr = "Only letters and white space allowed";
       }
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Last Name is required";
    } else {
        $lastname = test_input($_POST["lastname"]);
          if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
        $lastnameErr = "Only letters and white space allowed";
       }
    }

    if (empty($_POST["address1"])) {
        $address1Err = "Address is required";
    } else {
        $address1 = test_input($_POST["address1"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $address1)) {
        $address1Err = "Only letters and white space allowed";
       }
    }
    }

    if (empty($_POST["city"])) {
        $cityErr = "City is required";
    } else {
        $city = test_input($_POST["city"]);
         if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
        $cityErr = "Only letters and white space allowed";
       }
        
    }

    if (empty($_POST["State"])) {
        $stateErr = "State is required";
    } else {
        $state = test_input($_POST["State"]);
          if (!preg_match("/^[a-zA-Z ]*$/", $state)) {
        $stateErr = "Only letters and white space allowed";
       }
    }

    if (empty($_POST["zip"])) {
        $zipErr = "Zipcode is required";
    } else {
        $zip = test_input($_POST["zip"]);
        if (!preg_match("/^[0-9]$/", $zip)) {
            $zipErr = "Invalid Zipcode";
        }
    }

    if (empty($_POST["Country"])) {
        $countryErr = "Country is required";
    } else {
        $country = test_input($_POST["Country"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $country)) {
        $countryErr = "Only letters and white space allowed";
       }
    }

    if (empty($_POST["mail"])) {
        $mailErr = "Email is required";
    } else {
        $mail = test_input($_POST["mail"]);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailErr = "Invalid email format";
        }
    }

     if (empty($_POST["Amount"]) && empty($_POST["amount"])) {
        $amountErr = "Donation amount is required";
    } else {
        if (!empty($_POST["Amount"]) && $_POST["Amount"] != "Other") {
            $amount = test_input($_POST["Amount"]);
        } elseif (!empty($_POST["amount"])) {
           
            if (!is_numeric($amount) || $amount <= 0) {
                $amountErr = "Enter a valid donation amount";
            }
             $amount = test_input($_POST["amount"]);
        }
    }

   


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../form/Donor_styles.css">
</head>

<body>

    <h3>*</h3>Denotes Required Information

    <div class="head">
        <a href="">> 1 Donation</a>
        <a href="">> 2 Confirmation</a>
        <a href="">> Thank You!</a>
    </div>

    <div class="all">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <h2>Donor Information</h2><br>

            <div class="form-group">
                <label for="firstname"> First Name <h3>*</h3></label>
                <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>">
                <span class="error"><?php echo $firstnameErr; ?></span>
            </div>

            <div class="form-group">
                <label for="lastname">Last Name<h3>*</h3></label>
                 <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
                <span class="error"><?php echo $lastnameErr; ?></span>
            </div>

            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" id="company" name="company">
            </div>

            <div class="form-group">
                <label for="address1">Address 1<h3>*</h3></label>
                <input type="text" id="address1" name="address1" value="<?php echo $address1; ?>">
                <span class="error"><?php echo $address1Err; ?></span>
            </div>

            <div class="form-group">
                <label for="address2">Address 2</label>
                <input type="text" id="address2">
            </div>

            <div class="form-group">
                <label for="city">City<h3>*</h3></label>
                 <input type="text" id="city" name="city" value="<?php echo $city; ?>">
                <span class="error"><?php echo $cityErr; ?></span>
            </div>

            <div class="form-group">
                <label for="State">State<h3>*</h3></label>
                <select name="State" id="state" >
                    <option value="" disabled selected hidden>Select a State</option>
                    <option value="dhaka"<?php if($state=="dhaka") echo "selected"; ?>>Dhaka</option>
                    <option value="barisal"<?php if($state=="barisal") echo "selected"; ?>>Barisal</option>
                    <option value="khulna"<?php if($state=="khulna") echo "selected"; ?>>Khulna</option>

                </select>
                <span class="error"><?php echo $stateErr; ?></span>
            </div>

            <div class="form-group">
                <label for="zip">Zipcode<h3>*</h3></label>
               <input type="text" id="zip" name="zip" value="<?php echo $zip; ?>">
                <span class="error"><?php echo $zipErr; ?></span>
            </div>

            <div class="form-group">
                <label for="country">Country<h3>*</h3></label>
                <select name="Country" id="country" >
                    <option value="" disabled selected hidden>Select a Country</option>
                    <option value="Bangladesh"<?php if($country=="Bangladesh") echo "selected"; ?>>Bangladesh</option>
                    <option value="India"<?php if($country=="India") echo "selected"; ?>>India</option>
                    <option value="Nepal"<?php if($country=="Nepal") echo "selected"; ?>>Nepal</option>
                    <option value="Pakistan"<?php if($country=="Pakistan") echo "selected"; ?>>Pakistan</option>
                </select>
                 <span class="error"><?php echo $countryErr; ?></span>
            </div>



            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" id="fax" >
            </div>
            <div class="form-group">
                <label for="mail">Email<h3>*</h3></label>
               <input type="text" id="mail" name="mail" value="<?php echo $mail; ?>">
                <span class="error"><?php echo $mailErr; ?></span>
            </div>

            <div class="form-group">
                <label>Donation Amount<h3>*</h3></label><br>
                <input type="radio" name="Amount" value="None" >None
                <input type="radio" name="Amount" value="50"<?php if($amount=="50") echo "checked"; ?>>$50
                <input type="radio" name="Amount" value="75"<?php if($amount=="75") echo "checked"; ?>>$75
                <input type="radio" name="Amount" value="100"<?php if($amount=="100") echo "checked"; ?>>$100
                <input type="radio" name="Amount" value="250"<?php if($amount=="250") echo "checked"; ?>>$250
                <input type="radio" name="Amount" value="Other">Other

                 <span class="error"><?php echo $amountErr; ?></span>
            </div>

            <div class="form-group">
                <label for="amount">
                    <strong>Other Amount $</strong>
                    <small>(Check a button or type your amount)</small>
                </label>
                <input type="number" id="amount" name="amount" value="<?php if(!in_array($amount,["50","75","100","250"])) echo $amount; ?>">
            </div>

            <div class="form-group">
                <label>Recurring Donation</label>
                <input type="checkbox">I am interested in giving on a regular basis. <br>
            </div>

            <div class="form-group">
                <label></label>
                Monthly Credit Card $<input type="number" class="smallbox">for<input type="number" class="smallbox">
                Month

            </div>

            <h2>Honorarium and Memorial Donation Information</h2>

            <div class="form-group">
                <label>I would like to make this donation:</label>
                <input type="radio" name="donation" value="honor">To honor
                <input type="radio" name="donation" value="memory"> In memory of

            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name">
            </div>

            <div class="form-group">
                <label for="acknowledge">Acknowledge Donation to</label>
                <input type="text" id="acknowledge">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city">
            </div>

            <div class="form-group">
                <label for="State">State:</label>
                <select name="State" id="state" >
                    <option value="" disabled selected hidden>Select a State</option>
                    <option value="dhaka">Dhaka</option>
                    <option value="rajshahi">Rajshahi</option>
                    <option value="khulna">Khulna</option>
                    <option value="Ranjpur">Ranjpur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="zip">Zip</label>
                <input type="number" id="zip">
            </div>

            <h2>Additional Information</h2>
            <p>Please enter your name, company or organization as you would like it to appear in our publications:</p>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name">
            </div>

            <div>
                <input type="checkbox">I would like my gift to remain anonymous. <br>
                <input type="checkbox">My employer offers a matching gift program. I will mail the matching gift form.
                <br>
                <input type="checkbox">Please save the cost Of acknowledging this gift by not mailing a thank you
                letter. <br> <br>
            </div>

            <div class="form-group">
                <label><strong>Comments</strong><small>(Please type any questions or feedback here)</small><br></label>
                <textarea id="comments" name="area" placeholder="" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label><strong>How may we contact you?</strong></label><br>
                <div>
                    <input type="checkbox" name="contact" value="email">E-mail<br>
                    <input type="checkbox" name="contact" value="postal"> Postal Mail<br>
                    <input type="checkbox" name="contact" value="telephone"> Telephone<br>
                    <input type="checkbox" name="contact" value="fax"> Fax<br>
                </div>
            </div>

            <p>I would like to receive newsletters and information about special events by:</p> <br>

            <div class="form-group">
                <label></label><br>
                <div>
                    <input type="checkbox" name="contact" value="email">E-mail<br>
                    <input type="checkbox" name="contact" value="postal"> Postal Mail<br>
                </div>
            </div>

            <div class="checkbox-color">
                <input type="checkbox">I would like information volunteering with the <br>
            </div>


            <div class="button">
                <input type="reset" value="Reset">
                <input type="submit" value="Continue">
            </div>
            <div>
                <p> <img src="../wbt/image/lock.png" height="15" width=""> Donate online with confidence
                    .You are on a
                    secure server.</p>
                <p>If you have any problems or questions, please contact at <a
                        href=https://facebook.com/samiulrayan.rifat.5">Support</a>
                </p>
            </div>

        </form>
    </div>





</body>

</html>