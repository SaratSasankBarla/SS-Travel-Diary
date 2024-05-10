<?php

session_start();
$con = mysqli_connect("localhost", "root", "root", "you");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    if (!empty($username) && !empty($password) && !empty($email) && !empty($mobile)) {
        $query2 = "SELECT * FROM register WHERE email = '$email'";
        $row = mysqli_query($con, $query2);
      
        if (mysqli_num_rows($row) >= 1) {
            echo "<script>alert('Hey $username! your account already exists!!!') </script>";
        } else {
            $query = "INSERT INTO register (username,email,password,mobile,address) VALUES ('$username','$email','$password','$mobile','$address')";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<script>alert('Hello $username, your registration was successful') </script>";
                echo "<script>window.open('login.php','_self') </script>";
            } else {
                echo "Failed to connect: " . mysqli_error($con);
                echo "<script>alert('Sorry, your details are not registered')</script>";
            }
        }
    }
}

$con->close();

?>


<!DOCTYPE html>
<html>

<head>
    <title>SignUP</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="login-box">
        <h1>Sign Up</h1>

        <form method="post">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username">
            </div>

            <div class="textbox">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input type="email" placeholder="Email" name="email">
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" pattern="(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[0-9]).{8,}" title="Password must be at least 8 characters long and contain at least one uppercase letter, one special character, and one numeric digit" required>
            </div>

            <div class="textbox">
                <i class="fa fa-mobile" aria-hidden="true"></i>
                <input type="text" placeholder="Mobile number" name="mobile" pattern="[0-9]{10}"
                    title="Please enter exactly 10 digits">
            </div>

            <div class="textbox">
                <i class="fas fa-home" aria-hidden="true"></i>
                <input type="text" placeholder="Address" name="address">
            </div>

            <button type="submit" class="btn" name="submit">REGISTER</button>
            <a href="login.php">ALREADY A USER</a>



        </form>
    </div>

</body>

</html>