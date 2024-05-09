<html>
    <?php
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pword = $_POST["pass"];
        $con=mysqli_connect("localhost", "root","", "uepmuser");
        $create=mysqli_query($con, "CREATE TABLE IF NOT EXISTS userdata(id int PRIMARY KEY AUTO_INCREMENT, name varchar(100), email varchar(100), pword varchar(100));");
        $check=mysqli_query($con, "SELECT * FROM userdata WHERE email = '$email';");
        if(mysqli_num_rows($check) == 0) {
            $insert=mysqli_query($con, "INSERT INTO userdata (name, email, pword) VALUES ('$name', '$email', '$pword');");
            $xz=mysqli_close($con);
            echo '<script>alert("Account Created...");</script>';
            echo '<script>window.open("log.php","_self")</script>';
        }
        else {
            $xz=mysqli_close($con);
            echo '<script>alert("This Account Already Exists, Please Try Logging In...");</script>';
            echo '<script>window.open("log.php","_self")</script>';
        }
    ?>
</html>