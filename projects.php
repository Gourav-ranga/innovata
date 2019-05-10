<?php
session_start();
//echo $_SESSION["roll_number"];
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "innovata";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
 //echo "<span style='color:white;'>Connection Established</span>";
}
else
{
 die("Connection failed because".mysqli_connect_error());
}

if(empty($_POST['title']) && empty($_POST['description']))
{
 $_POST['title'] = NULL;
 $_POST['description'] = NULL;
}

$roll_no = $_SESSION['roll_number'];
$title = $_POST['title'];
$description = $_POST['description'];
$date = date('Y-m-d');
//echo printf("(%s) (%s) (%s) (%s)",$roll_no,$title,$description,$date);

$query = "INSERT INTO post_projects(roll_no,title,description,projects_date) VALUES('$roll_no','$title','$description','$date')"; 
if($_POST['title']!=NULL && $_POST['description']!=NULL)
{
$data = mysqli_query($conn,$query);

if($data)
  {
    //echo "<span style='color:white;'>Query fired</span>";
  }
  else
  {
    //echo "<span style='color:white'>Query not fired</span>";
  }
}
?>

<!Doctype html>
<html>
<head>
	<title>Projects Post</title>
</head>

<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
  
<div class="header-center-image">
 <div id="work-innovata-section">
   <div id="work-innovata">Innovata</div>
   <div id="work-way-think">The Way To Think</div>
  </div>
</div>

<div id="below-header-outer">	<!-- Start Below header Outer -->
 <div id="left-outer">
  <div class="name-tag">Title</div>	
  <div class="name-tag">Description</div>	
 </div>

 <div id="center-colon">
  <div class="work-colon" style="margin-top: 13px;">:</div>
  <div class="work-colon" style="margin-top: 11px;">:</div>
 </div>

 <form method="Post">
 <div id="work-right-outer">
  <input type="text" placeholder="Title" name="title" id="work-title-box" style="margin-top: 15px;">
  <textarea name="description" placeholder="Description" id="work-description-box" style="margin-top: 19px;"></textarea><br>
  <input type="submit" value="submit" id="work-submit">
 </div>
 </form>
</div>		<!-- End Below header Outer -->

    

</body>
</html>