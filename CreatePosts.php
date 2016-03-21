<?php
$username = $_POST['username'];
$post = $_POST['content'];
$message = "";
$color = "";
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
else if ($post == "") {
  $message = "Post content cannot be empty!\n";
  $color = "red-style";
}
else {
  $result = $mysqldatabase->query("SELECT * FROM Users WHERE user_id = '" . $username . "'");
  if(mysqli_num_rows($result) > 0) {
    $query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', '" . $username . "')";
    if($mysqldatabase->query($query)) {
      $message = "Post created!\n";
      $color = "black-style";
    }
  }
  else {
    $message = "Username " . $username . " does not exist!\n";
    $color = "red-style";
  }
}
$mysqldatabase ->close();
echo
"<HTML>
  <HEAD>
    <link rel='stylesheet' type='text/css' href='forum.css'>
    <TITLE>Create Post Result</TITLE>
  </HEAD>
  <BODY>
    <div class='" . $color . "'>" . $message .  "<br>
    <a href='CreatePosts.html'>Back</a><br>
    <a href='forum-index.html'>Return to Forum Index</a>
    </div>
  </BODY>
</HTML>";


?>
