
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title></title>
</head>
<body>

</body>
</html>
<?php
session_start();
echo "<pre> \n";
  $pdo = new PDO("mysql:host=localhost;dbname=people;port=3306",'root','root' );

 $stmt=$pdo->query("select id,name from bank");
    echo '<div class="container">';
     echo '<div class="jumbotron">';
  	echo '<table  class="table">'."\n";
  	while($row=$stmt->fetch(PDO::FETCH_ASSOC) )
  	{
  		
  		echo "</td><td>";
  		echo "<p style='font-family:verdana'>".(htmlentities($row['name']))."</p>";
  		echo "</td><td>";
  		echo '<a href="view.php?id='.$row['id'].'" style="font-family:Georgia">View details</a>';
  		echo "</td><td>";
  		echo '<a href="transfer.php?id='.$row['id'].'" style="font-family:Georgia">Transfer money</a>';
  		echo "</td></tr>";
  	}
    echo "</div>";
    echo "</div>";

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
    <footer style="text-align: center; font-size: 30px; ">
      <a href="home.html" style="color: red;" >Home</a>
    </footer>