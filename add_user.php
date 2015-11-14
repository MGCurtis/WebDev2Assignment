<?php
require_once "librarydb.php";

if ( isset($_POST['username']) && isset($_POST['password'])
&& isset($_POST['firstname']) && isset($_POST['surname'])
&& isset($_POST['address1']) && isset($_POST['address2'])
&& isset($_POST['city']) && isset($_POST['mobile'])) {

$u = $_POST['username'];
$p = $_POST['password'];
$f = $_POST['firstname'];
$s = $_POST['surname'];
$a1 = $_POST['address1'];
$a2 = $_POST['address2'];
$c = $_POST['city'];
$l = $_POST['landline'];
$m = $_POST['mobile'];

$sql = "INSERT INTO a1_users
(username, password, firstname, surname,address1,address2,city,landline,mobile)
VALUES ('$u', '$p', '$f', '$s','$a1','$a2','$c','$l','$m')";
mysql_query($sql);


}
mysql_close($db);
?>
<p>Add A New User</p>
<form method="post">
<p>Username:
<input type="text" name="username" size="50"></p>
<p>Password:
<input type="text" name="password"></p>
<p>Firstname:
<input type="text" name="firstname"></p>
<p>Surname:
<input type="text" name="surname"></p>
<p>Address 1:
<input type="text" name="address1"></p>
<p>Address 2:
<input type="text" name="address2"></p>
<p>City:
<input type="text" name="city"></p>
<p>Landline:
<input type="text" name="landline"></p>
<p>Mobile:
<input type="text" name="mobile"></p>
<p><input type="submit" value="Add New"/></p>
</form>
