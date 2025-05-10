<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>page title</title>
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
<?php include("includes/nav.php");?>

<section class="p-3 mt-3">
<div class="container-lg feedback">
<?php
require 'connect.php';
$productid=$_GET['productid'];
$sql="SELECT * from product where productid=$productid";
$result=mysqli_query($link, $sql);
    echo "<h3>Confirm Delete Product</h3>";
    echo "<p>";
echo "<table class='table'>";
echo "<tr>
    <td><strong>Image</td>
    <td><strong>Product</td>
    <td><strong>Price</td>
<td><strong>Description</td>
    </tr>";

$row=mysqli_fetch_array($result);
    $image=$row["image"];
    $product=$row["productname"];
    $productdesc=$row["description"];
    $price=$row["price"];
    echo "<tr>
<td><img src='$image' width=100 height=100> </td>
        <td>$product</td>
        <td>&euro; $price</td>
        <td>$productdesc</td>
        </tr>";
echo "</table>";
echo "<p> Are you sure you want to delete this product? <p>
    <a href='deleteproduct.php?productid=$productid' class='btn btn-outline-primary'>Delete</a>
    <a href='manageproducts.php' class='btn btn-outline-primary'>Cancel</a>";

mysqli_close($link);
?>
</div>

</section>
<?php include("includes/footer.html");?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
