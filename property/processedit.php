<?php
require 'connect.php';
//The following code checks if the submit button is clicked and updates the data in the database accordingly
if(isset($_POST['submit']))
{
  //store the data posted in the form in variables and use real escape string to clean data fields the user can enter
  $productid=$_POST['productid'];
  $productname=mysqli_real_escape_string($link,$_POST['productname']);
  $price=mysqli_real_escape_string($link,$_POST['price']);
  $description=mysqli_real_escape_string($link,$_POST['description']);
  $longdesc=mysqli_real_escape_string($link,$_POST['longdescription']);
  $vendor_email=$_POST["vendor_email"];
  $categoryid=$_POST["category"];
  $image=mysqli_real_escape_string($link,$_POST['image']);
  //query to update the fields in the product record
  $sql= "UPDATE product SET productname='$productname', price='$price', description='$description', longdescription='$longdesc', vendor_email='$vendor_email', categoryid='$categoryid', image='$image' WHERE productid=$productid";

  //if the query is successful return to the manageproducts page, otherwise output an error message
  if (mysqli_query( $link, $sql))
  {
    header("Location: http://localhost/property/manageproducts.php");
    exit;
  }
  else 
 {
  echo "Could not update product";
}
}
mysqli_close($link);
?>
