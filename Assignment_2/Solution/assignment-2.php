<?php 

$a=$_POST["First"];
$b=$_POST["Last"];
$c=$_POST["Email"];
$d=$_POST["TelePhone"];
$e=$_POST["Comments"];

$msg = "Form details below.\n\nFirst name: ".$a."\nLast name: ".$b."\nEmail: ".$c."\n\n\n\nTelephone:".$d."\nComments: ".$e."\n";


// send email

if (mail($c,'assignment 2',$msg)) 
{
  echo "Form submitted successfully.";
}
else{
	echo "something went wrong";
}


 ?>