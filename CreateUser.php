<?php
$username = $_POST['username'];
$message = "";
$mysqldatabase = new mysqli("mysql.eecs.ku.edu", "pmcelroy", "callisto", "pmcelroy");
$error = "";

if ($mysqldatabase->connect_errno) {
    $error = $mysqldatabase->connect_error;
    $message = "Connect failed: " . $error;
    $color = "red-style";
    exit();
}

if ($username == "") {
  $message = "Username cannot be empty!\n";
  $color = "red-style";
}
else {
    $query = "INSERT INTO Users (user_id) VALUES ('" . $username . "')";
    if($mysqldatabase->query($query)) {
      $message = "User '" . $username . "' created!\n";
      $color = "black-style";
    }
    else {
      $message = "User '" . $username . "' already exists!\n";
      $color = "red-style";
    }
}
$mysqldatabase ->close();
echo
"<HTML>
  <HEAD>
    <link rel='stylesheet' type='text/css' href='forum.css'>
    <TITLE>Create User Result</TITLE>
  </HEAD>
  <BODY>
    <div class='" . $color . "'>" . $message .  "<br>
    <a href='CreateUser.html'>Back</a><br>
    <a href='forum-index.html'>Forum Index</a>
    </div>
  </BODY>
</HTML>";


?>
