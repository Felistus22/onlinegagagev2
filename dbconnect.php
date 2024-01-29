<?php
//method to start a new session which passes data accross multiple pages
session_start();

//declare variables
$host = 'localhost';
$user = 'mbesa';
$pass = 'MySQL2021';
$db = 'onlinegarage';

/*create a connection to the MySQL database server using the $conn variable
mysqli_connect opens a new connection to the MySQL dbase and returns either a MySQLi object representing the connection or 'FALSE' if the connection attempt fails
*/
$conn = mysqli_connect($host, $user, $pass, $db);

/*check if the connection was succesful
if the connection attempt fails, mysqli_connect_error method returns a string description of the last connection error and the script stops execution with the die() method
*/
if (!$conn) {
    die("Connection failed" . "</br>" . mysqli_connection_error);
    exit();
}