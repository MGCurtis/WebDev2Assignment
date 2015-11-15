
<p>Search</p>
<form method="post">
<p>Title:<br>
<input type="text" name="s_title" size="20"></p>
<p>Author:<br>
<input type="text" name="s_author"></p>
<p><input type="submit" value="submit"/></p>
</form>


<?php
require_once "librarydb.php";

if ( isset($_POST['s_title']) && isset($_POST['s_author'])){
  $t = $_POST['s_title'];
  $a = $_POST['s_author'];
  $sql = "SELECT * from a1_books where title like '%$t%' and author like '%$a%'";
  $result = mysql_query($sql);
  while ( $row = mysql_fetch_row($result) ) {
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
  <th>Title</th>
  <th>Author</th>
  <th>Edition</th>
  <th>Year</th>
  <th>On Reserve</th>
  </tr>';
    while ( $row = mysql_fetch_row($result) ) {


    echo "<tr><td>";
    echo($row[1]);
    echo "</td><td>";
    echo($row[2]);
    echo "</td><td>";
    echo($row[3]);
    echo "</td><td>";
    echo($row[4]);
    echo "</td><td>";
    echo($row[6]);
    echo "</td><td>";
    if($row[6] == 'N'){
    echo('<form method="post"><input type="hidden" ');
    echo('name="isbn" value="'.$row[0].'"">'."\n");
    echo('<input type="submit" value="Reserve" name="edit">');
    echo("\n</form>\n");
  }

    echo("</tr>\n");
  }
  echo "</table>\n";
}
mysql_close($db);
}
 ?>
