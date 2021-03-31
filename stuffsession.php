<?php
//openning a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "", "room_allocation_system");
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_stuff'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT stuff_no, stuff_name from stuff where stuff_no = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['stuff_no'];
$login_name=$row['stuff_name']
?>