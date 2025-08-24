
<?php
//Rectangle Area and Perimeter
$length = readline("Enter the length of the rectangle: ");
$width = readline("Enter the width of the rectangle: ");


$area = $length * $width;
$perimeter = 2 * ($length + $width);

echo "Rectangle Area: $area\n";
echo "Rectangle Perimeter: $perimeter\n";
?>

<?php
//Vat Calculation(15%)
$amount = readline("Enter the amount: ");
$vat = 0.15 * $amount;
$total = $amount + $vat;

echo "VAT (15%): $vat\n";
echo "Total Amount (including VAT): $total\n";
?>

<?php
//Check Odd or Even
$number = readline("Enter a number: ");

if ($number % 2 == 0) {
    echo "$number is Even\n";
} else {
    echo "$number is Odd\n";
}
?>


<?php

//Largest number between three number

$num1 = readline("Enter first number: ");
$num2 = readline("Enter second number: ");
$num3 = readline("Enter third number: ");

if ($num1 >= $num2 && $num1 >= $num3) {
    $largest = $num1;
} elseif ($num2 >= $num1 && $num2 >= $num3) {
    $largest = $num2;
} else {
    $largest = $num3;
}

echo "The largest number is: $largest\n";
?>


<?php
//Odd numbers between 10 and 100

for ($num = 10; $num <= 100; $num++) {

  
    if ($num % 2 != 0) {
        echo $num, " "; 
    }
}

echo "\n"; 
?>

<?php

// Searchng an element from an Array
$array = [10, 25, 30, 45, 60];


$search = 30;


$found = false;


for ($i = 0; $i < sizeof($array); $i++) {
    if ($array[$i] == $search) {
        $found = true;
        break; 
}
}

if ($found) {
    echo "$search is found in the array.\n";
} else {
    echo "$search is NOT found in the array.\n";
}
?>


<?php

// Printing Pyramid of Stars(*)

for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}
echo "\n";

// Printing Pyramid of Numbers(1,2,3)

for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "$j ";
    }
    echo "\n";
}
echo "\n";

// Printing Pyramid of Alphabets(A,B,C)
$ch = "A";
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "$ch ";
        $ch++;
    }
    echo "\n";
}
?>

