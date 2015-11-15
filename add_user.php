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
<h2>Or Register as a New User</h2>
<form method="post" class="pure-form pure-form-stacked" >
<p>Username:<br>
<input type="text" name="username" size="20"></p>
<p>Password:<br>
<input type="text" name="password"></p>
<p>Firstname:<br>
<input type="text" name="firstname"></p>
<p>Surname:<br>
<input type="text" name="surname"></p>
<p>Address 1:<br>
<input type="text" name="address1"></p>
<p>Address 2:<br>
<input type="text" name="address2"></p>
<p>City:<br>
<input type="text" name="city"></p>
<p>Landline:<br>
<input type="text" name="landline"></p>
<p>Mobile:<br>
<input type="text" name="mobile"></p>
<p><input type="submit" value="Register"/></p>
</form>
