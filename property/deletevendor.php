<?php
require 'connect.php';
$vendor_email = mysqli_real_escape_string($link, $_GET["vendor_email"]);
$sql = "DELETE FROM vendor WHERE vendor_email = '$vendor_email'";
if (mysqli_query( $link, $sql))
{
header("Location: http://localhost/property/managevendors.php");
  exit;
}
else
{
  echo "Could not delete vendor";
  echo "<pre>".mysqli_error($link)."</pre>";
}
mysqli_close($link);
?>
