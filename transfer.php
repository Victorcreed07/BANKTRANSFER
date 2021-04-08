<!DOCTYPE html>
  <html>
  <head>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<title></title>
  	<style type="text/css">
  		body{
    background-image: url('http://i.stack.imgur.com/kx8MT.gif');
    background-size: cover;
    
    
    
    height: 100vh;
    padding:0;
    margin:0;
}
.button {
  background-color: red; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
  	</style>
  </head>
  <h1 style="text-align: center;color: blue;">Transfer amount</h1>
  <body>
  	<div class="container">
		<div class="jumbotron">
<?php
session_start();


$pdo = new PDO("mysql:host=localhost;dbname=people;port=3306",'root','root' );


	


	if(isset($_POST['name']) && (isset($_POST['id'])) && (isset($_POST['amt'])))
	{

	$stmt = $pdo->prepare("select current_balance  from bank where id=:id;");
	$stmt->execute([':id' => $_POST['id']]); 
	$user = $stmt->fetch();
	if($user === false)
{
	echo "Bad value";
	header("location:spark.php");
	return;
}


	$amt1=$user['current_balance'];
	$amt2=$_POST['amt'];
	$amt3=$amt1-$amt2;
	if($amt3<0)
	{
		$_SESSION['error']="In sufficient funds";
		header("location:spark.php");
		return;
	}

	$sql="update bank
		  set current_balance = :amt
		  where id= :id";
  	$stmt=$pdo->prepare($sql);
  	$stmt->execute(array(':amt' => $amt3,':id'=> $_POST['id']));
  	

  	$amt4=$_POST['name'];
  	$stmt = $pdo->prepare("select current_balance  from bank where name=:name;");
	$stmt->execute([':name' => $_POST['name']]); 
	$user1 = $stmt->fetch();
	if($user1 === false)
{
	echo "Bad value";
	header("location:spark.php");
	return;
}
	$amt5=$user1['current_balance'];
	$amt6=$_POST['amt'];
	$amt7=$amt5+$amt6;

	$sql="update bank
		  set current_balance = :amt
		  where name= :name";
  	$stmt=$pdo->prepare($sql);
  	$stmt->execute(array(':amt' => $amt7,':name'=> $_POST['name']));
  	if($stmt->rowCount() != 0)
  	{
  		$_SESSION['success']="Transfer Complete";
		header("location:spark.php");
		return;
  	}

  }

 




?>



<form method='post' style="text-align: center;">


<p>Name:<input type='text' name='name' ></p>
<br>
<p>Transfer amount: <input type='text' name='amt' ></p>
<br>
<p>Your id:<input type='text' name='id' ></p>
<br>
<input type="Submit" name="submit" value="Transfer" class="button">

<a href="spark.php" class="button">cancel</a>
</form>
</div>
</div>
</body>
</html>
