<?php
 session_start();

$roll = $_SESSION["roll_number"];
$no_rows = $_SESSION["no_rows"];

$servername = "localhost";
$username = "root";
$password = "";
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

$query = "SELECT * FROM post_projects WHERE NOT roll_no='$roll'";
$data = mysqli_query($conn,$query);

$noti_query = "SELECT * FROM post_questions WHERE NOT roll_no='$roll'";
$quest_data = mysqli_query($conn,$noti_query);

while($row=mysqli_fetch_row($data))
{
 $detail_title = $row[1];
 $detail_description = $row[2];

 
 echo "<div id='main-outer'>";
 echo "<div class='work-detail-outer' style='color:white';display:block;>";

 echo "<div class='detail-left-outer'>";
 echo "<div class='left-text-tag'>Title</div>";
 echo "<div class='left-text-tag' style='margin-top: 5px;'>Description</div>";
 echo "</div>";

 echo "<div class='detail-center-outer'>";
 echo "<div class='center-colon-tag'>:</div>";
 echo "<div class='center-colon-tag' style='margin-top: 10px;'>:</div>";
 echo "</div>";

 echo "<div class='detail-right-outer'>"; // Right Outer Start
 echo "<div class='detail-info' style='margin-top: 6px;'>";
 echo $detail_title;
 echo "</div>";

 echo "<div class='detail-info' style='margin-top: 15px;'>";
 echo $detail_description;
 echo "</div>";

 echo "</div>";  	// Right Outer End

 echo "</div>";
 echo "</div>";
}


while($row_noti=mysqli_fetch_row($quest_data))
{
 $detail_title_noti = $row_noti[1];
 $detail_description_noti = $row_noti[2];

 
 echo "<div id='main-outer'>";
 echo "<div class='work-detail-outer' style='color:white';display:block;>";

 echo "<div class='detail-left-outer'>";
 echo "<div class='left-text-tag'>Title</div>";
 echo "<div class='left-text-tag' style='margin-top: 5px;'>Description</div>";
 echo "</div>";

 echo "<div class='detail-center-outer'>";
 echo "<div class='center-colon-tag'>:</div>";
 echo "<div class='center-colon-tag' style='margin-top: 10px;'>:</div>";
 echo "</div>";

 echo "<div class='detail-right-outer'>"; // Right Outer Start
 echo "<div class='detail-info' style='margin-top: 6px;'>";
 echo $detail_title_noti;
 echo "</div>";

 echo "<div class='detail-info' style='margin-top: 15px;'>";
 echo $detail_description_noti;
 echo "</div>";

 echo "</div>";  	// Right Outer End

 echo "</div>";
 echo "</div>";
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Detail WorkPlace</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body style="background-color: black;">

</body>
</html>