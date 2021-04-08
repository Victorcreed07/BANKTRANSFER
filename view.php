
<!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  </head>
  <body>
<?php



$pdo = new PDO("mysql:host=localhost;dbname=people;port=3306",'root','root' );


if(isset($_GET['id']))
{
  	$stmt=$pdo->prepare("select * from bank where id =:id");
 $stmt->execute([':id' => $_GET['id']]);
  	echo "<table border=1 >"."\n";
  	while($row=$stmt->fetch(PDO::FETCH_ASSOC) )
  	{
  		echo "<tr><td>";
  		echo(htmlentities($row['id']));
  		echo "</td><td>";
  		echo(htmlentities($row['name']));
  		echo "</td><td>";
  		echo(htmlentities($row['email']));
  		echo "</td><td>";
  		echo(htmlentities($row['city']));
  		echo "</td><td>";
  		echo(htmlentities($row['bank']));
  		echo "</td><td>";
  		echo(htmlentities($row['current_balance']));
  		echo "</td></tr>";
  	}

  	
  }
  	?>
  	</table>

  	<a href="spark.php">Go back</a>
  </body>
  </html>