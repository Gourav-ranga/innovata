<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Admin View Data</title>
</head>
<body>
<a href="admin_services.php"><div id="admin-data-insertion">Student Data View</div></a>
 <div id="center-outer-div">	<!-- Center Outerdiv Start -->
  <div id="admin-view-data-center-maindiv">		<!-- Center maindiv start -->

   <div class="heading-row">
    <div class="heading-decor" style="width:80px;">sr.no</div>	
    <div class="heading-decor" style="width:350px;">Student Name</div>
    <div class="heading-decor" style="width:150px;">Department</div>
    <div class="heading-decor" style="width:100px;">batch</div>
    <div class="heading-decor">Mobile number</div>
    <div class="heading-decor">Year of Study</div>
    <div class="heading-decor">Roll Number</div>	
   </div>



<?php
session_start();
 if(!isset($_SESSION['id']))
{
  header("Location:admin_page.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innovata";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
 //echo "<span style='color:white'>Connection Established</span>";
}
else
{
 die("Connection failed because".mysqli_connect_error());
}

$query = "SELECT * FROM new_register_verification";
$data = mysqli_query($conn,$query);

$result = mysqli_num_rows($data);
//echo "<span style='color:white'>$result</span>"

for($i=1;$i<=$result;$i++)
{
 $row = mysqli_fetch_row($data);

 $name = $row[0];
 $dept_name = $row[1];
 $batch = $row[2];
 $mob_no = $row[3];
 $yofs = $row[4];
 $roll_no = $row[5];

 //echo "<span style='color:white'>$name</span>";


 echo "<div class='heading-row'>";
 echo "<div class='heading-decor' style='width:80px;'>$i</div>";
 echo "<div class='heading-decor' style='width:350px;'>$name</div>";
 echo "<div class='heading-decor' style='width:150px;'>$dept_name</div>";
 echo "<div class='heading-decor' style='width:100px;'>$batch</div>";
 echo "<div class='heading-decor'>$mob_no</div>";
 echo "<div class='heading-decor'>$yofs</div>";
 echo "<div class='heading-decor'>$roll_no</div>";
 echo "</div>";

}

?>






</div>     <!-- Center maindiv End -->
  </div>		 <!-- Center Outerdiv End -->

 </body>
</html>

	   





   
