
<!DOCTYPE html>
<html>
<head>
 <link href="css/style.css" rel="stylesheet" type="text/css" >
	<title>Admin Delete Data</title>
</head>
<body>
  <a href="admin_services.php"><div id="admin-data-insertion">Student Data Deletion</div></a>
  <div id="center-outer-div" style="height: 200px;">	<!-- Center Outerdiv Start -->
   <div id="admin-delete-data-center-maindiv">		<!-- Center maindiv start -->
   
   <form method="POST">
   <div id="stu-roll-no-row">
   	<div class="stu-roll-no">Roll no.</div>
   	<div class="stu-roll-no" style="width:5%">:</div>
   	<input type="text" placeholder="Enter Student Roll No." class="stu-roll-no" id="add-feature" name="stu_no" required="required">
   </div>


   
    <input type="submit" value="Delete" name="delete" id="admin-delete-stu">
   </form>


   </div>     <!-- Center maindiv End -->
  </div>		 <!-- Center Outerdiv End -->	
</body>
</html>

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
  
  
  $roll_number = strtolower($_POST['stu_no']);
  //echo "<span style='color:white'>$roll_number</span>";

  $query = "DELETE FROM new_register_verification WHERE roll_no = '$roll_number'";
  $data = mysqli_query($conn,$query);


  if($roll_number!=NULL)
  {
  if($data)
   {
   	//echo "<span style='color:white;'>Query Fired</span>";
   	echo '<script type="text/javascript">alert("Data Deleted !")</script>';
   	$roll_number = NULL;
   }
   else
   {
   	echo "<span style='color:white;'>Query not fired</span>";
   }
}
?>