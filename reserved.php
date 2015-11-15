<?php
include('profile.php');
$db = mysql_connect('localhost', 'root', '') or
die(mysql_error());
mysql_select_db("library") or die(mysql_error());

if( isset($_POST['cancel']) && isset($_POST['isbn'])){
  $isbn = $_POST['isbn'];
  $sql = "DELETE FROM a1_reserved WHERE isbn = '$isbn'";
  mysql_query($sql);
  $sql = "UPDATE a1_books SET reserved = 'N' WHERE isbn = '$isbn'";
  mysql_query($sql);

}


if ( isset($login_session)){

  $result = mysql_query("SELECT b.isbn,b.title,b.author from a1_reserved r inner join a1_books b on r.isbn = b.isbn  where r.username = '$login_session'");
  echo'<style>
  table, td, th {
  border: 1px solid black;
  }
  table {
  width: 50%;
  }
  th {
  height: 50px;
  }
  </style>';
echo '<table width="400">';
echo'<tr>
<th>ISBN</th>
<th>TITLE</th>
<th>AUTHOR</th>
</tr>';
  while ( $row = mysql_fetch_row($result) ) {


  echo "<tr><td>";
  echo($row[0]);
  echo "</td><td>";
  echo($row[1]);
  echo "</td><td>";
  echo($row[2]);
  echo "</td><td>";
  echo('<form method="post"><input type="hidden" ');
  echo('name="isbn" value="'.$row[0].'"">'."\n");
  echo('<input type="submit" value="cancel" name="cancel">');
  echo("\n</form>\n");

  echo("</tr>\n");
}
}
mysql_close($db);
 ?>
