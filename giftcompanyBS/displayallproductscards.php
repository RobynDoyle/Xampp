<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Product Page</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/stylesbs.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- set the viewport element to give the browser instructions on how to control the page's dimensions and scaling-->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid p-0">
<?php include("includes/nav.html");?>

<section class="p-3 mt-3">
<?php
require "connect.php"; //access the connection code
$sql="SELECT * from product";
$result=mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0) //check there are records in the result set
{
echo "<div class='container-lg'>";//set up the BS container
echo "<h4>All Products</h4>";
echo "<div class='row justify-content-left my-5'>";//set up a BS row for the cards
while($row=mysqli_fetch_array($result)) //while there are records in the array
{
$productid=$row["productid"];
$image=$row["image"];
$product=$row["productname"];
$productdesc=$row["description"];
$price=$row["price"];
echo "<div class='col-lg-3 col-md-4 mb-3'>";//creates a responsive BS column to house each card
echo "<div class='card h-100 d-flex flex-column'>"; //create a card - each card is a child of the BS row
echo "<img src='$image' class='card-img-top' style='height:190px; object-fit: cover;' alt='product'>";
echo "<div class='card-body flex-grow-1'>"; //this BS div adds a horizontal rule and holds the product name, description and price
echo "<hr>";
echo "<p class='card-title fw-bold'>$product</p>";//output the product name in bold
echo "<p>&euro; $price</p>"; //output the euro sign and price
echo "<p class='card-text'> $productdesc</p>"; //output the product description
echo "<div class='card-footer text-center mt-auto'>"; //this BS card footer div contains the moredetails button
echo "<p><a class='btn btn-outline-primary'
href='moredetails.php?productid=$productid'>Details</a></p>";
echo "</div>"; //close the card-footer div
echo "</div>"; //close the card-body div
echo "</div>"; //close the card
echo "</div>"; //close the card column
} //end while loop
echo "</div>"; //close the BS row since no more records
}
else //if there are no records in the result set
{
echo "<h3>There are no products in the database</h3>"; //output a message
}
mysqli_close($link); //close the connection
?>

</section>
<?php include("includes/footer.html");?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
