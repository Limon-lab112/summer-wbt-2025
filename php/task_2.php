<?php
   //Solution of Question 1/8
   echo "Solution of Question 1/8:<br>";
    $Principal=50000;
    $Rate=.10;
    $Time=2;
    echo "Simple Interest = (Principal*Rate*Time)/100 = ".(($Principal*$Rate*$Time)/100)."<br>";
    echo "<br>";


     //Solution of Question 2/9
    echo "Solution of Question 2:<br>";
    $a=4;
    $b=9;
    echo "Value before swap a= $a and b=$b<br>";
    $a=$a+$b;
    $b=$a-$b;
    $a=$a-$b;
    echo "Value After swap a= $a and b=$b<br>";
    echo "<br>";



     //Solution of Question 3/10
    echo "Solution of Question 3:<br>";
    $year=2014;
    echo "Year = $year<br>";

    if(($year%4==0 && $year%100!=0) || $year%400==0)
    {
        echo "The year is leapyear<br>";
    }
    else
    {
        echo "The year is not leapyear<br>";
    }
    echo "<br>";

     //Solution of Question 4/11

    echo "Solution of Question 4:<br>";
    $num=$val=5;
    
    for($i=$num-1;$i>1;$i--)
    {
        $num=$num*$i;
    }
    echo "The factorial of $val is $num<br>";
    echo "<br>";

 //Solution of Question 5/12

    echo "Solution of Question 5:<br>";
    for($n=1;$n<50;$n++)
    {
        $prime=true;
        if ($n==0||$n==1)
            $prime =false;
        for ($i=2;$i<$n/2;$i++)
        {
            if ($n%$i==0)
                $prime=false;
        }
        if ($prime==true)
            echo "$n, ";
    }
    echo "<br>";
    echo "<br>";


 //Solution of Question 6/13

    echo "Solution of Question 6:<br>";
    echo "#Pattern1<br>";
    for($i=1;$i<=5;$i++)
    {
        for($j=1;$j<=6-$i;$j++)
        {
            echo "*";
        }
        echo "<br>";
    }
    echo "#Pattern2<br>";

    for($i=1;$i<5;$i++)
    {
        for($j=1;$j<=$i;$j++)
        {
            echo "$j ";
        }
        echo "<br>";
    }
    echo "#Pattern3<br>";
    $char='A';
    for($i=1;$i<5;$i++)
    {
        for($j=1;$j<=$i;$j++)
        {
            echo "$char ";
        }
        echo "<br>";
        $char++;
    }
    

?>