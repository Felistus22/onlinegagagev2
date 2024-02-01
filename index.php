<?php

/*include the dbconnect.php file from the current dir in this script 
 cause a fatal error incase its not found
*/
require('./dbconnect.php');

/*
check if the button is clicked or if the form is submitted
$_POST['submit'] is a variable that holds the value of the submit button when the form is submitted using the POST method and is set when the form is submitted
isset() finction checks whether the $_POST['submit'] variable is set or not. 
if the form is submitted, the variable is set and v/v
*/
if (isset($_POST['submit'])) {
    //declare variables and assign them values from the form fields
    //$_POST being a global array that contains/captures data from the form sent with the POST method
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    //the sql variable contains an SQL query that inserts the form data into the user table 
    $sql = "INSERT INTO user (fullname, username, email, telephone, password, usertype) VALUES ('$fullname', '$username', '$email', '$telephone', '$password', '$usertype')";

    /*confirm that the values were inserted
    mysqli_query() is a method that executes a query using the database connection
    takes 2 parameters: $conn a database connection and $sql a query
    if the query was successful, the result is TRUE, else FALSE
    */
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo 'there was an error' . mysqli_error($conn);
    }
}

//script for login
if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    $stmt = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND usertype = '$usertype'";

    $reslt = mysqli_query($conn, $stmt);

    //check if row was returned
    if (mysqli_num_rows($reslt) > 0) {
        //get the row as an associative array
        $row = mysqli_fetch_assoc($reslt);
        
        //verify the login details
        if ($password === $row['password']) {
            //if the password is correct, then start a session
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $email;
            $_SESSION['usertype'] = $usertype;
            //echo 'loggedin!';
            header('Location: dashboard.php');
        } else {
            //if password a'int correct
            echo '<script type ="text/javascript">';
            echo 'alert("Invalid password!");';
            echo 'window.location.href = "index.php" ';
            echo '</script>';
        }
    } else {
        //no such user with the specified email address or username
        echo '<script type ="text/javascript">';
        echo 'alert("Invalid email or username!");';
        echo 'window.location.href = "index.php" ';
        echo '</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pistonheads Custom Body Workshop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="indexpage">
    <div class="index">
        <div class="logo">
            <img src="./img/logo.png" alt="">
        </div>
        <div class="formcontainer">
            <div class="buttoncontainer">
                <!--call the show() function when either of the button is clicked to reveal the clicked form-->
                <button class="normal" onclick="show('registerForm')">REGISTER</button>
                <button class="normal" onclick="show('loginForm')">LOGIN</button>
            </div>
            <div class="block" id="registerForm">
                <h2>REGISTER</h2>
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
                    <input type="submit" name="submit" id="submit" value="REGISTER">
                </form>
            </div>
            <div class="hidden" id="loginForm">
                <h2>LOGIN</h2>
                <form action="index.php" method="post">
                    <input type="email" name="email" placeholder="e-mail" id="" required><br>
                    <input type="password" name="password" id="" placeholder="password" required><br>
                    <label for="usertype">User Type</label>
                    <select name="usertype" id="usertype" required>
                        <option value="staff">Staff</option>
                        <option value="customer">Customer</option>
                    </select><br>
                    <input type="submit" name="login" id="submit" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
    <script src="./script.js"></script>
</body>
</html>