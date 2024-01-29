<?php

/*include the dbconnect.php file from the current dir in this script 
 cause a fatal error incase its not found
*/
require('./dbconnect.php');

/*
check if the button is clicked or if the form is submitted
$_POST['submit'] is set when a form with a asubmit button named 'submit' is posted
*/
if (isset($_POST['submit'])) {
    //declare variables and assign them values from the form fields
    //$_POST being a global array that contains/captures data from the form sent with the POST method
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telephone = $_POST['fullname'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    //the sql variable contains an SQL query that inserts the form data into the user table 
    $sql = "INSERT INTO user (fullname, username, email, telephone, password, usertype) VALUES ('$fullname', '$username', '$email', '$telephone', '$password', '$usertype')";

    //confirm that the values were inserted
    if ($conn->query($sql) === TRUE) {
        echo 'users added succesfully';
    } else {
        echo 'there was an error' . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pistonheads Custom Body Workshop</title>
</head>
<body>
    <div>
        <div class="logo">
            <img src="logo.png" alt="">
        </div>
        <div class="register">
            <form action="index.php" method="POST">
                <input type="text" name="fullname" id="" placeholder="Full Name" required><br>
                <input type="text" name="username" id="" placeholder="Username" required><br>
                <input type="text" name="email" id="" placeholder="email" required><br>
                <input type="text" name="telephone" id="" placeholder="Telephone No." required><br>
                <input type="text" name="password" id="" placeholder="password" required><br>
                <input type="text" name="cpassword" id="" placeholder="Confirm password" required><br>
                <label for="usertype">User Type</label>
                <select name="usertype" id="usertype" required>
                    <option value="staff">Staff</option>
                    <option value="customer">Customer</option>
                </select><br>
                <input type="submit" name="submit" id="" value="REGISTER">
            </form>
        </div>
    </div>
</body>
</html>