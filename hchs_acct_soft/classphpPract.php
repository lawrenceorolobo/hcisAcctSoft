<?php
//THE MEANING OF WAMP.
/**
 * W - WINDOWS
 * A - APACHE
 * M - MySQL
 * p - Php
 * 
 */

 //Below is a function

 function display($item){
     echo "The item is $item";
 }

 $itemToDisplay = "car";

 echo gettype($itemToDisplay);
 echo "<br/>"

 display($itemToDisplay);

 /**
  * To collect data from a html form into a php file
  *You would use the get($_GET['itemName']) or the post($_POST['itemName'])
  *the get approach collects the data from the url, while the post hides the data from the url.
  */

//Below is how to declare an array:
$list = array('Jack','Sparrow');

//Use foreach loop to display each item in an array.

//Classwork, write a block of code to take input and diplay it.
?>