<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    $con = mysqli_connect("localhost", "root", "root", "you");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the title_name from the GET request
    $username = $_GET['title_name'];
    //echo "The title name is: " . $title_name;

    // Use prepared statements to avoid SQL injection
    $query = "SELECT * FROM stats WHERE username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) >= 1) {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $data[] = $rows;
        echo json_encode($data);
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
    
    mysqli_close($con);
        
    
    
    header('Content-Type: application/json');
    
?>

