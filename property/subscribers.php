<?php
require 'connect.php';

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($link, $_POST['name']);
  $email = mysqli_real_escape_string($link, $_POST['email']);

  // check if cars are correct
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
  }

  if (empty($name)) {
    echo "Name is required.";
    exit;
  }

  // Insert the emails and name into the database
  $sql = "INSERT INTO Subscribers (Email, Name) VALUES ('$email', '$name')";
  //if the query is successful go to success page, otherwise output an error message

  if (mysqli_query($link, $sql)) {
    header("Location: http://localhost/property/Subscribed.php"); // redirect to a success page
    exit;
  } else {
    echo "Could not subscribe: " . mysqli_error($link);
  }
}

mysqli_close($link);
?>
