<?php
session_start();
echo "<pre> \n";
  $pdo = new PDO("mysql:host=localhost;dbname=people;port=3306",'root','root' );

 $stmt=$pdo->query("select id,name from bank");
  	echo "<table border=2 >"."\n";
  	while($row=$stmt->fetch(PDO::FETCH_ASSOC) )
  	{
  		
  		echo "</td><td>";
  		echo(htmlentities($row['name']));
  		echo "</td><td>";
  		echo '<a href="view.php?id='.$row['id'].'">view details</a>';
  		echo "</td><td>";
  		echo '<a href="transfer.php?id='.$row['id'].'">Transfer money</a>';
  		echo "</td></tr>";
  	}
  	if(isset($_SESSION['error']))
  	{
  		echo '<p style="color:red">'.$_SESSION['error']."</p> \n";
  		unset($_SESSION['error']);
  	}
  	if(isset($_SESSION['success']))
  	{
  		echo '<p style="color:green">'.$_SESSION['success']."</p> \n";
  		unset($_SESSION['success']);
  	}
  	?>
  	</table>