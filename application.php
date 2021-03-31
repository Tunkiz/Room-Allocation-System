<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
  header("location: index.php"); // Redirecting To Home Page
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "room_allocation_system");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['Apply'])) {

    $sql = "insert into applications (stuNo) values ('$login_session')";
    $update="UPDATE students SET Applied='Yes' WHERE student_no='$login_session'";
    if (mysqli_query($conn,$sql) && mysqli_query($conn,$update)) {
        echo "<script>alert('Your application was successfully');</script>";
    }
    else{
      echo "<script>alert('You have already applied');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<title>Application</title>
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
     <span > Application Status</span> 
  
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
  <table class="table" style="margin-top: 20px;"><th>Acardemic Year</th><th>Action</th>
<?php
  echo "<form action='' method='POST'><tr><td><input type='year' name='balance' value='2021' style='border:none; width: 50px;' readonly></td><td><input type='submit' name='Apply' value='Apply' style='background-color: blue; color: white;'></td></tr></form>";
  echo "</table>";
?>  
  </table>
</header>

<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

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

