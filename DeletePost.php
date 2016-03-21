<HTML>
  <HEAD>
    <link rel="stylesheet" type="text/css" href="forum.css">
    <TITLE>Delete Posts</TITLE>
  </HEAD>
  <BODY>
    <div class="delete-menu">
<?php
$mysqldatabase = new mysqli("mysql.eecs.ku.edu", "pmcelroy", "callisto", "pmcelroy");

if ($mysqldatabase->connect_errno) {
    $error = $mysqldatabase->connect_error;
    $message = "Connect failed: " . $error;
    $color = "red-style";
    exit();
}

$post_form = $_POST['post_form'];
$num = count($post_form);
if($num > 0) {
  foreach($post_form as $ids)
  {
   $delete_query = "DELETE FROM Posts WHERE post_id='" . $ids . "'";
   $mysqldatabase->query($delete_query);
   echo "Post #" . $ids . " deleted!<br>";
  }
}
else {
  echo "No posts delete!<br>";
}
echo "<a href='DeletePost.html'>Back</a>";
echo "<br><a href='AdminHome.html'>Admin Menu</a>";
$mysqldatabase ->close();
?>
</div>
</BODY>
</HTML>
