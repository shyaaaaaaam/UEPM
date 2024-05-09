<html>
    <?php
        $email = $_POST["email"];
        $pword = $_POST["pass"];
        $rem = $_POST["rem"];
        $con=mysqli_connect("localhost", "root", "", "uepmuser");
        $confirm=mysqli_query($con, "SELECT * FROM userdata WHERE email = '$email' and pword = '$pword';");
        if(mysqli_num_rows($confirm) > 0) {
            $row = mysqli_fetch_assoc($confirm);  
            $xz=mysqli_close($con);
            if (isset($rem)){
                setcookie("id", $row["id"], time()+3600*24*365*10, "/");
                setcookie("email", $email, time()+3600*24*365*10, "/");
                setcookie("password", $pword, time()+3600*24*365*10, "/");
                setcookie("name", $row['name'], time()+3600*24*365*10, "/");
            } else {
                setcookie("id", $row["id"], 0, "/");
                setcookie("email", $email, 0, "/");
                setcookie("password", $pword, 0, "/");
                setcookie("name", $row['name'], 0, "/");
            }
            echo '<script>window.open("map.html","_self")</script>';
        }
        else {
            $xz=mysqli_close($con);
            echo '<script>alert("This Account Doesnt Exist, Please Try Creating An Account");</script>';
            echo '<script>window.open("register.html","_self")</script>';
        }
    ?>
</html>