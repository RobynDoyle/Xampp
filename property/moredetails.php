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
<?php
require "connect.php"; //access the connection code

$propertyid= $_GET["propertyid"];
$sql= "SELECT * FROM property WHERE propertyid=$propertyid";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_array($result);

    $town=$row["town"];
    $price=$row["price"];
    $description=$row["shortdescription"];
    $longdescription=$row["longdescription"];
    $image=$row["image"];
    echo "<div class='container-lg'>";//set up the BS container to keep margins consistent
    echo "<h4>" . htmlspecialchars($town) . "</h4><br>";
    echo "<img src='$image' style='height:500px; object-fit: cover;'  alt='htmlspecialchars($property)'>";
    echo "<h5>Property Description</h5>" . htmlspecialchars($description) .  "<br><br>";
    echo "<h5>Property Details </h5>" . htmlspecialchars($longdescription) . "<br><br>";
    echo "<h5>Price </h5> &dollar;" . number_format($price,2) . "</br><br>";
    mysqli_close($link);
?>
<p>
<button class="btn btn-outline-warning mt-3" onclick="goBack()">Go Back to Product Listing</button>
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
