<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Enter Username and Password";
}

else{
// Define $username and $password
$username = $_POST['username'];
$password = $_POST['password'];
$stu=$_POST['stu'];

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "", "room_allocation_system");

if ($stu=='student') {
    // SQL query to fetch information of registerd users and finds user match.
    $query = "SELECT student_no, password from students where student_no=? AND password=? LIMIT 1";
    // To protect MySQL injection for Security purpose
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($username, $password);
    $stmt->store_result();
    if($stmt->fetch()){ //fetching the contents of the row 
        $_SESSION['login_user'] = $username; // Initializing Session
        header("location: main.php"); // Redirecting To Profile Page
    }
    else {
	    $error = "Incorrect Username or Password";
    }
}
else{
    // SQL query to fetch information of registerd users and finds user match.
    $query = "SELECT stuff_no, password from stuff where stuff_no=? AND password=? LIMIT 1";
    // To protect MySQL injection for Security purpose
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($username, $password);
    $stmt->store_result();
    if($stmt->fetch()) { //fetching the contents of the row 
        $_SESSION['login_user'] = $username; // Initializing Session
        header("location: stuffDashbord.php"); // Redirecting To Profile Page
    }
    else {
	$error = "Incorrect Username or Password";
    }
}
 // Closing Connection
$conn->close();
}}
?>