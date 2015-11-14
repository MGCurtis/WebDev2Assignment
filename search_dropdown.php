
<?php
include('session.php');
$db = mysql_connect('localhost', 'root', '') or
die(mysql_error());
mysql_select_db("library") or die(mysql_error());

echo'<form method="post"><dl>
<dt>Select Genre</dt>
<dd>
<select name="cid">';

    try
    {
        $row = $result = mysql_query("SELECT * FROM a1_category");

        echo "<option value='0'>-Select-</option>";
        while ( $row = mysql_fetch_row($result) ) {
            echo '<option value="'.$row[0].'"';

            echo '>'. $row[1] . '</option>'."\n";
        }
    }
    catch(PDOException $e)
    {
        echo 'No Results';
    }

    echo'</select>
    <p><input type="submit" value="submit"/></p>
    </dd>
    </dl>
    </form>';

    if ( isset($_POST['edit']) && isset($_POST['isbn'])){
    $id = $_POST['isbn'];
    $change = "Y";
    $sql = "UPDATE a1_books SET reserved = '$change' WHERE isbn = '$id'";
    mysql_query($sql,$db);
    $sql1 = "INSERT INTO a1_reserved
    (isbn,username,date)
    VALUES('$id','$login_session','NOW()')";
    mysql_query($sql1,$db);
  }

    if ( isset($_POST['cid'])){
      $c = $_POST['cid'];

      $result = mysql_query("SELECT * from a1_books where category = '$c'");
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
      echo('<form method="post"><input type="hidden" ');
      echo('name="isbn" value="'.$row[0].'"">'."\n");
      echo('<input type="submit" value="res" name="edit">');
      echo("\n</form>\n");

      echo("</tr>\n");
    }
    echo "</table>\n";

  }
?>
