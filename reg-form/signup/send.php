<?php
$servername = "localhost";
$username = "root";
$key = "";
$dbname = "signup";

//create connection
$conn = mysqli_connect($servername, $username, $key, $dbname);

//check connection
if (!$conn) {
  die("connection failed: " . mysqli_connect_error());
}

//html data links
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$state = $_POST['state'];
$city = $_POST['city'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];

// encrypting password
$password = md5($password);

// sql to create table
$sql = "INSERT INTO data (fname, mname, lname, dob, gender, address, state, city, email, password, mobile)
VALUES ('$fname', '$mname', '$lname', '$dob', '$gender', '$address', '$state', '$city', '$email', '$password', '$mobile')";

if (mysqli_query($conn, $sql)) {
  $last_id = mysqli_insert_id($conn);
  echo '<script type="text/javascript">alert("Entry added");</script>';
  echo "<script>window.location.assign('../login/login.html');</script>";
}else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>                                                                                                                                
