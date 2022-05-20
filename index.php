<?php 

  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'userlogin';
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_db);

  if(isset($_POST['submit'])){
  	$email = $_POST['email'];
  	$password = $_POST['password'];
  	$query = "SELECT * FROM login WHERE username=? and password=?";
  	$stmt = mysqli_prepare($conn, $query);
  	mysqli_stmt_bind_param($stmt, 'ss', $email, $db_password);
  	mysqli_stmt_execute($stmt);
  	if(mysqli_stmt_fetch($stmt)){
  		echo "<script type='text/javascript'>alert('you are logged in');window.location.href='mh.php';</script>";
  	}
  	else{
  		echo "error";
  	}
  }



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style01.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
</body>
</html>