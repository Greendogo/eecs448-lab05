<HTML>
  <HEAD>
    <link rel="stylesheet" type="text/css" href="forum.css">
    <TITLE>View Users</TITLE>
  </HEAD>
  <BODY>
    <div class="view-users">
      <div class="interior">
        <h1>View All Users</h1>
        <?php
        $mysqldatabase = new mysqli("mysql.eecs.ku.edu", "pmcelroy", "callisto", "pmcelroy");

        if ($mysqldatabase->connect_errno) {
           $error = $mysqldatabase->connect_error;
           $message = "Connect failed: " . $error;
           echo "<div class='error'>" . $message .  "<br>";
           echo "<br><a href='AdminHome.html'>Admin Menu</a>";
           exit();
        }

        $result = $mysqldatabase->query("SELECT * FROM Users");
        $array = mysqli_fetch_all($result, MYSQLI_NUM);
        $num_users = mysqli_num_rows($result);
        if($num_users > 0) {
         echo "<table align='center' style='border: 1px solid gray; border-collapse: collapse;'>";
         foreach($array as $row) {
           foreach($row as $username) {
             echo "<tr style='border: 1px solid gray;text-align: center;'>";
               echo "<td style='border: 1px solid gray;'>" . $username . "</td>";
             echo "</tr>";
           }
         }
         echo "</table>";
        }
        else {
         echo "Users table empty!\n";
        }
        echo "<br><a href='AdminHome.html'>Admin Menu</a>";
        $mysqldatabase ->close();
        ?>
      </div>
    </div>
</body>
</html>
