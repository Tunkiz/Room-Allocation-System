<?php

 include('session.php');
 if(!isset($_SESSION['login_user'])){
  header("location: indexx.php"); // Redirecting To Home Page
}
?>

<?php
 $date=date_create();
 date_date_set($date,2020,10,30);
 $conn = mysqli_connect("localhost", "root", "", "room_allocation_system");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//if (isset($_POST['claim'])) {
$sql = "SELECT name,school,gender,Year_study,Average,Applied FROM students WHERE student_no='$login_session'";
$result = $conn->query($sql);
if($result->num_rows ==1 ){
  while($row = $result->fetch_assoc()){
    $school=$row['school'];
    $gender=$row['gender'];
    $name=$row['name'];
    $Year_study=$row['Year_study'];
    $average=$row['Average'];
    $ifApplied=$row['Applied'];
if ($ifApplied=='Yes' ) {
  if($average>=65 && $gender=='male' && ($Year_study=='second' || $Year_study=='first')){
    $insql="insert into allocate (Status,res_name,stuNo,res_code) values('Allocated','F3','$login_session','F301')";
    if(mysqli_query($conn,$insql)){
      echo "Successfully";
    }
    else{
      
    }
  }
  else if($average>=65 && $gender=='female' && ($Year_study=='second' || $Year_study=='first')){
    $insql="insert into allocate (Status,res_name,stuNo,res_code) values('allocated','F4','$login_session','F401')";
    if(mysqli_query($conn,$insql)){
      echo "Successfully";
    }
    else{
      
    }
  }
  else if($average>=65 && $gender=='male' && ($Year_study=='third' || $Year_study=='final')){
    $insql="insert into allocate (Status,res_name,stuNo,res_code) values('allocated','riverside','$login_session','F403')";
    if(mysqli_query($conn,$insql)){
      echo "Successfully";
    }
    else{
      
    }
  }
  else{
    $insql="insert into allocate (Status,res_name,stuNo,res_code) values('allocated','mango','$login_session','F204')";
    if(mysqli_query($conn,$insql)){
      echo "Successfully";
     }
  }
  
     
 }
}
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<title>Status</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}


.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
     <span > Allocation System</span> 
  
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="main.php" class="w3-bar-item w3-button active"><i class=""></i>Home</a>
      <a href="application.php" class="w3-bar-item w3-button"><i class="fa fa-"></i> Application</a>
      <a href="status.php" class="w3-bar-item w3-button">Check status</a>
      <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
     
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">X</a>
  <a href="main.php" onclick="w3_close()" class="w3-bar-item w3-button active">Home</a>
  <a href="application.php" onclick="w3_close()" class="w3-bar-item w3-button">Application</a>
  <a href="status.php" onclick="w3_close()" class="w3-bar-item w3-button">Check status</a>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">Logout</a>
   
  
</nav>
  <header class="w3-container w3-blue w3-center" style="padding:40px 16px; margin-bottom: -40px;: ">

 <table class="table" style="margin-top: 20px;"><th>Status</th><th>Residence</th><th>Res Code</th><th>Action</th>
  <?php
  $conn = mysqli_connect("localhost", "root", "", "room_allocation_system");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//section data from allocate table
$sql= "SELECT Status,res_name,res_code FROM allocate WHERE stuNo='$login_session'";
$result = $conn->query($sql);
if($result->num_rows ==1 ){

  while($row = $result->fetch_assoc()){
    //Displaying the data in the table
    $status=$row['Status'];
    $res=$row['res_name'];
    $code=$row['res_code'];
    echo "<form action='' method='POST'><tr><td><label>$status</label></td><td><label>$res</label></td> <td><label>$code</label></td><td><input type='submit' id='myButton' name='claim' value='Claim' onclick=''></td></tr></form>";
    echo "</form>";
  }
}
if (isset($_POST['claim'])) {
  $allocate= "SELECT * FROM allocate WHERE stuNo='$login_session'";
  $results=$conn->query($allocate);
  if ($results->num_rows==1)  {
    while($row = $results->fetch_assoc()){
      $resname=$row['res_name'];
      $res_code=$row['res_code'];
      $insert="insert into claimed_rooms (student_no,name,res_name,res_code) values('$login_session','$name','$resname','$res_code')";
      if (mysqli_query($conn,$insert)) {
        echo "<script>alert('You just claimed a room, You are given 3 days to sign-in');</script>";
      }
      else{
        echo "<script>alert('You already claimed a room, You are given 3 days to sign-in');</script>";
      }
    }
      
  }
}
else {
  echo "<script> 
  window.onload=function() {
  document.getElementById('myButton').value='claimed';
  document.getElementById('myButton').disabled;}</script>";
}
$conn->close();
?>
  
</table>
 </header>
  <center style="color: white;">If table is blank you have not applied yet or try to contact housing department</center>
  
  <script>
// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");
var myButton=document.getElementById("myButton");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } 
  else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
}



  </script>

</body>
</html>

