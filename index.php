<?php

include_once("function/helper.php");
include_once("function/connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <div class="container">
        <h3>Please fill up the forms below for informations</h3>
        <div class="signUp_template">
            <form action="<?php echo BASE_URL . "signup_process.php"; ?>" method="post">

                <?php

                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                $name = isset($_GET['name']) ? $_GET['name'] : false;
                $email = isset($_GET['email']) ? $_GET['email'] : false;
                $username = isset($_GET['username']) ? $_GET['username'] : false;
                $password = isset($_GET['password']) ? $_GET['password'] : false;
                $phone_number = isset($_GET['phone_number']) ? $_GET['phone_number'] : false;

                if ($notif == "require") {
                    echo "<div class='notif'>*YOUR DATA IS INCOMPLETE*</div>";
                } elseif ($notif == "username") {
                    echo "<div class='notif'>*USERNAME ALREADY EXIST*</div>";
                } elseif ($notif == "email") {
                    echo "<div class='notif'>*EMAIL ALREADY EXIST*</div>";
                }

                ?>

                <div class="signUP_form">
                    <label>Name</label> <br>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                </div>

                <div class="signUP_form">
                    <label>Email</label> <br>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                </div>

                <div class=" signUP_form">
                    <label>Username</label> <br>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </div>

                <div class=" signUP_form">
                    <label>Password</label> <br>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                </div>

                <div class=" signUP_form">
                    <label>Phone Number</label> <br>
                    <input type="text" name="phone_number" value="<?php echo $phone_number; ?>">
                </div> <br>

                <div class=" signUP_form_submit"> <input type="submit" value="Sign UP"> </div>
            </form>
        </div>
    </div>
</body>

</html>