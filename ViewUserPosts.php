<HTML>
  <HEAD>
    <link rel="stylesheet" type="text/css" href="forum.css">
    <TITLE>View User Posts</TITLE>
  </HEAD>
  <BODY>
    <div class="view-user-post">
<?php
$mysqldatabase = new mysqli("mysql.eecs.ku.edu", "pmcelroy", "callisto", "pmcelroy");

if ($mysqldatabase->connect_errno) {
    $error = $mysqldatabase->connect_error;
    $message = "Connect failed: " . $error;
    echo "<div class='error'>" . $message .  "<br>";
    echo "<br><a href='AdminHome.html'>Admin Menu</a>";
    exit();
}

$author =  $_POST['username'];

if($author == '') {
  echo "Please select a username!<br>";
}
else {
  $result = $mysqldatabase->query("SELECT post_id, content FROM Posts Where author_id='" . $author . "'");
  $array = mysqli_fetch_all($result, MYSQLI_NUM);
  $num_posts = mysqli_num_rows($result);
  if($num_posts > 0) {
    echo "<h1>Posts by " . $author . "</h1>";
    echo "<table align='center' style='border: 1px solid gray; border-collapse: collapse;'>";
    echo "<tr style='border: 1px solid gray;text-align: center;'>";
          echo "<th style='border: 1px solid gray;text-align: center;'>Post ID</th>";
          echo "<th style='border: 1px solid gray;text-align: center;'>Post Content</th>";
    foreach($array as $row) {
      echo "<tr style='border: 1px solid gray;text-align: center;'>";
      foreach($row as $post) {

          echo "<td class='headers' style='border: 1px solid gray;'>" . $post . "</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }
  else {
    echo "User " . $author . " has no posts!\n";
  }
}
echo "<br><a href='ViewUserPosts.html'>Back</a><br>";
echo "<a href='AdminHome.html'>Admin Menu</a>";
$mysqldatabase ->close();
?>
</div>
</body>
</html>
