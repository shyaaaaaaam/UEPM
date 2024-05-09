<?php
    $con = mysqli_connect("localhost", "root", "", "uepmuser");

    if (!$con) {
        echo json_encode(['status' => 'error', 'message' => 'Database connection error']);
        exit;
    }

    $jsonData = json_decode(file_get_contents('php://input'), true);

    if ($jsonData) {
        $id = mysqli_real_escape_string($con, $jsonData["id"]);
        $email = mysqli_real_escape_string($con, $jsonData["email"]);
        $name = mysqli_real_escape_string($con, $jsonData["name"]);
        $pword = mysqli_real_escape_string($con, $jsonData["password"]);

        $check = mysqli_query($con, "SELECT * FROM userdata WHERE id = '$id';");

        if (mysqli_num_rows($check) > 0) {
            $update = mysqli_query($con, "UPDATE userdata SET name = '$name', email = '$email', pword = '$pword' WHERE id = '$id';");
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'User not found']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data']);
    }

    mysqli_close($con);
?>