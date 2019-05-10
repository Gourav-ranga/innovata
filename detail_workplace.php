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

$query = "SELECT * FROM post_work WHERE NOT roll_no='$roll'";
$data = mysqli_query($conn,$query);

//$i=0;
while($row=mysqli_fetch_row($data))
{
 $detail_title = $row[1];
 $detail_description = $row[2];
 //$counter = array();
 //$counter[$i] = $row[0];
 //echo $counter[$i];
 //$i=$i+1;
 //echo $i;
 echo "<div id='main-outer'>";
 echo "<form >";
 echo "<div class='work-detail-outer' style='color:white';display:block;>";

 echo "<div class='detail-left-outer'>";
 echo "<div class='left-text-tag'>Title</div>";
 echo "<div class='left-text-tag' style='margin-top: 5px;'>Description</div>";
 echo '<input type="submit" value="Agree" name="agree" class="detail-workplace-agree-disagree">';
 echo "<input type='submit' value='Disagree' name='disagree' style='margin-left:10px;' class='detail-workplace-agree-disagree'>";
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
 echo "</form>";
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