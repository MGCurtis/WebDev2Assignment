
<p>Search</p>
<form method="post">
<p>Title:
<input type="text" name="title" size="50"></p>
<p>Author:
<input type="text" name="author"></p>
<p><input type="submit" value="submit"/></p>
</form>


<?php

require_once "librarydb.php";

if ( isset($_POST['title']) && isset($_POST['author'])){
  $t = $_POST['title'];
  $a = $_POST['author'];

  $result = mysql_query("SELECT * from a1_books where title like'%$t%'");
  while ( $row = mysql_fetch_row($result) ) {
  echo '<table border="5">'."\n";
  echo "<tr><td>";
  echo($row[1]);
  echo "</td><td>";
  echo($row[2]);
  echo "</td><td>";
  echo($row[3]);
  echo "</td><td>";
  echo($row[4]);
  echo "</td><td>";
  echo($row[5]);

  echo("</tr>\n");

}
echo "</table>\n";
}
mysql_close($db);
 ?>
