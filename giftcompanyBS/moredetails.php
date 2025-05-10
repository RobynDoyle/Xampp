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
<?php include("includes/nav.html");?>

<section class="p-3 mt-3">

<?php
require "connect.php"; //access the connection code
$productid= $_GET["productid"];
$sql= "SELECT * FROM product WHERE productid=$productid";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_array($result);
    $product=$row["productname"];
    $price=$row["price"];
    $description=$row["description"];
    $longdescription=$row["longdescription"];
    $image=$row["image"];
    echo "<div class='container-lg'>";//set up the BS container to keep margins consistent
    echo "<h4>" . htmlspecialchars($product) . "</h4><br>";
    echo "<img src='$image' style='height:190px; object-fit:
    cover;' alt='htmlspecialchars($product)'>";
    echo "<h5>Product Description</h5>" . htmlspecialchars($description) . "<br><br>";
    echo "<h5>Product Details </h5>" . htmlspecialchars($longdescription) . "<br><br>";
    echo "<h5>Price </h5> &euro;" . number_format($price,2) . "</br><br>";
    mysqli_close($link);
?>
<p>
<button class="btn btn-outline-primary mt-3" onclick="goBack()">Go Back to Product Listing</button>
<script>
function goBack() {
window.history.back();
}
</script>
</div> <!--close the BS container-->
</section>
<?php include("includes/footer.html");?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
