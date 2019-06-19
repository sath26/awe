<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head metas, css, and title -->
    <?php require_once 'includes/head.php'; ?>
</head>
<body>
<?php require_once 'includes/header.php'; ?>
<div class="container-fluid">
<div class="row">
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<?php require_once 'includes/sidebar.php'; ?>
    <h1 style="margin-top: 10px">Test: Function</h1>
<?php
echo '<br /><b> String</b><br />';
$email = "fred@bloggs.com";
$password = "secret";

//concatination

print "Email=".$email." and password = ".$password;
print "<br />Length of password =".strlen($password);
print "<br />Password encryped with md5 = ".md5($password);
print "<br />Email in uppercase = ".strtoupper($email);
$posn = strpos($email, "@");//Finds the position(index) of @ in the email
print "<br />The @ symbol appears at possition $posn in $email";

//split a string into an array using delimiter @
$exploded = explode ( "@", $email );

echo '<br /><b> Number</b>';

//isset and empty
$var = 0;

// True because $var is empty
if (empty($var)) {
echo '<br /> $var is either 0, empty(null), or not set at all';
}

// True because $var is set
if (isset($var)) {
echo '<br />$var is set even though it is empty';
}

//is_xxxx functions
$i=5;
if(is_numeric($i)){print "<br />$i is numeric";}
if (is_int($i)){print "<br />$i is an integer";}
if (is_string($i)){
print "$i is a string";
}
else print "<br />$i is not a string";

//CHARACTER TYPE CHECKING USING Ctype functions
$str = "hi@12";
if (ctype_alnum ($str)){
print "<br />The string $str does contain all alphanumeric characters";
}
else print "<br />The string $str does NOT contain all alphanumeric characters";

$numstr="13";
if (ctype_digit ($numstr)){
print "<br />The string $numstr DOES contain all numerical characters";
}
else print "<br />The string $numstr does NOT contain all numerical characters";

echo '<br /><b> Array</b><br/>';
$a=array("a"=>"red","b"=>"green");
array_push($a,"blue","yellow");
print_r($a);
echo '<br/>';
$str = "www.somesite.com";
print_r (explode(".",$str));
echo '<br/>';
$fruit = array('orange', 'banana', 'apple');
  print_r($fruit);
  //count
  print "<br />Array contains ".count($fruit)." items";
  //sort
  print "<br />Sorted array = ";
  sort($fruit);
  print_r($fruit);
  //check if item is in an array
  if (in_array ( "apple" ,$fruit )){
print "<br />The fruit 'apple' IS in the array";
}
else print "<br />The fruit 'apple' IS NOT in the array";

echo '<br /><b> Date</b><br/>';
print "Date =".date("j/m/y H:i"); //j=Day, m=month, y = year, H = hour(24 hr clock), i=minutes 
//We can extract specific components. The current year is: 
$year = date("Y"); 
print  "<br />It's $year already - time flies<br />"; 
$minutes = date("i"); 
$hour = date("h"); 
print " ..and its $minutes past  $hour "; 



/* mktime generats a 'timestamp' for a  particular time 

*  int mktime(int hour, int minute, int second, int month, int day, int year, int is_dst) 

*  The example below generates a timestamp for 16/8/82 

*/ 

// To create a birth date of 16/7/92 = mktime(0,0,0,7,16,92)"; 

$dob = mktime(0,0,0,8,16,92); 

//date of birth from above (different formatting) 

echo "<p>A person born on ". date("j/m/y",$dob)." was born on a ".date('l', $dob) ."</p>"; //l=Day of week, j=Day, S=suffix(nd,th..), F= month 

//Calculate age 

$diff = (date("Y") - date("Y",$dob)); 

echo "<p>Their age now =  $diff </p>";
?>
</main>
</div>
</div>
<?php require_once 'includes/footer.php'; ?>
</body>
</html>