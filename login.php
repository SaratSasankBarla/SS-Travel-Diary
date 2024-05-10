<?php

session_start();
$con = mysqli_connect("localhost", "root", "root", "you");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['enter'])) {
	echo "inside php submnit";
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!empty($username) && !empty($password)) {
		echo "inside validation";
		$query = "SELECT * FROM register WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($con, $query);
		
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) {
				$_SESSION["username"] = $row['username'];
				$_SESSION["email"] = $row['email'];
				$_SESSION["mobile"] = $row['mobile'];
				$_SESSION["address"] = $row['address'];

			}
			echo "<script>alert('Welcome back $username ') </script>";
			header("Location: index.php");
		} else {
			echo "<script>alert('Enter correct details') </script>";
			echo "<script>window.open('login.php','_self') </script>";
		}

	}

}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="login.css">
</head>

<body>

	<div class="container">
		<div class="login-box">
			<h1>Login</h1>


			<form method="post">
				<div class="textbox">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Username" name="username">
				</div>

				<div class="textbox">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Password" name="password">
				</div>

				<button type="submit" class="btn" name="enter">ENTER</button>

				<a href="signup.php">Signup Here</a><br><br>

			</form>
		</div>

</body>

</html>