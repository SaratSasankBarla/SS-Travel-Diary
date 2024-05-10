<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$con = mysqli_connect("localhost", "root", "root", "you");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$title_name = $_GET['title_name'];

if (isset($_POST['submit'])) {
    $place_name = $_POST['place_name'];
    $description = $_POST['description'];
    $place_image = $_POST['place_image'];
    $image1 = $_POST['image1'];
    $image2 = $_POST['image2'];
    $image3 = $_POST['image3'];

    // Prepare the SQL statement with placeholders
    $query = "INSERT INTO travel (username, place_name, description, place_image, image1, image2, image3, sneakpeak) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Bind parameters to the prepared statement
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssssss", $title_name, $place_name, $description, $place_image, $image1, $image2, $image3, $place_image);

    // Execute the prepared statement
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo "<script>alert('Boom!! $title_name we got you') </script>";
        header("Location: index.php");
    } else {
        echo "Failed to connect: " . mysqli_error($con);
        echo "<script>alert('Sorry, your details are not inserted')</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($con);
?>
