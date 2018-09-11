<?php
$servername = "localhost";
$username = "root";
$key = "";
$dbname = "signup";

//create connection
$conn = mysqli_connect($servername, $username,  $key, $dbname);

//check connection
if(!$conn) {
  die("connection failed: " . mysqli_connect_error());
}

//html data links
$email = $_POST['email'];
$password = $_POST['password'];

//ecnrypting password
$password = md5($password);

//fetching data
$sql = "SELECT * FROM data WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
mysqli_close($conn);
 ?>
 <!--display fetch data-->
 <!DOCTYPE html>
 <html>
   <head>
     <title></title>
   </head>
   <style>
     body{
       font-family: Verdana;
       color: 	#505050;
       font-weight: bold;
       background-image: url("bg-01.jpg");
       background-repeat: no-repeat;
       background-size: 1600px 1100px;
     }
     table{
       background-color: white;
       border-collapse: collapse;
       width:90%;
       margin-left: 80px;
       margin-top: 300px;
     }
     th,td {
       text-align:left;
       padding: 8px;
     }
     th {
       background-color: #3b0072;
       color:white;
     }
   </style>
   <body>
     <table>
       <th>NAME</th>
       <th>E-mail</th>
       <th>City</th>
       <th>Mobile</th>
       <tr>
         <td>
           <?php echo $row['fname'] . " " . $row['mname'] . " ". $row['lname']; ?>
         </td>
         <td>
           <?php echo $row['email']; ?>
         </td>
         <td>
           <?php echo $row['city']; ?>
         </td>
         <td>
           <?php echo $row['mobile']; ?>
         </td>
       </tr>
     </table>
   </body>
 </html>
