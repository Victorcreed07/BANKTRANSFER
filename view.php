
<!DOCTYPE html>
  <html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<title></title>
    <style type="text/css">
      .center
      {
        margin-left: 570px;
        margin-top: 40px;
      }
    </style>
  </head>
  <body>
<?php



$pdo = new PDO("mysql:host=localhost;dbname=people;port=3306",'root','root' );


if(isset($_GET['id']))
{
  	$stmt=$pdo->prepare("select * from bank where id =:id");
 $stmt->execute([':id' => $_GET['id']]);
  echo '<div class="container">';
     echo '<div class="jumbotron">';
  	
  	while($row=$stmt->fetch(PDO::FETCH_ASSOC) )
  	{

  		
  		echo "<p style='font-family:Tahoma;'><span style='color:Dodgerblue;'>ID:</span>".(htmlentities($row['id']))."</p>";
  		
  		echo "<p style='font-family:Tahoma'><span style='color:Dodgerblue;'>NAME:</span>".(htmlentities($row['name']))."</p>";
  		
  		echo "<p style='font-family:Tahoma'><span style='color:Dodgerblue;'>EMAIL:</span>".(htmlentities($row['email']))."</p>";
  		
  		echo "<p style='font-family:Tahoma'><span style='color:Dodgerblue;'>CITY:</span>".(htmlentities($row['city']))."</p>";
  		
  		echo "<p style='font-family:Tahoma'><span style='color:Dodgerblue;'>BANK:</span>".(htmlentities($row['bank']))."</p>";
  		
  		echo "<p style='font-family:Tahoma'><span style='color:Dodgerblue;'>BALANCE:</span>".(htmlentities($row['current_balance']))."</p>";
      $alpha = $row['url'];
      echo "<img src='$alpha' alt='Hello' width='250' height='250'style='margin-left:570px;margin-top:-300px;'>";
  		
  	}
    echo "</div>";
    echo "</div>";

  	
  }
  	?>
    
  	<footer style="text-align: center; font-size: 30px; ">
      <a href="spark.php" style="color: red;" >Back to View</a>
    </footer>

  	
  </body>
  </html>