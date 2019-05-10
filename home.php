<?php
session_start();
if(!isset($_SESSION['home_page']))
{
 	header("Location:index.php");
}

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

 $except_stu = $_SESSION['roll_number'];
//echo "<span style='color:white;'>$except_stu</span>";

$query = "SELECT * FROM post_work WHERE NOT roll_no='$except_stu'";
$data = mysqli_query($conn,$query); 

$number_of_rows=mysqli_num_rows($data);
$_SESSION['no_rows']=mysqli_num_rows($data);

$ask_questions = "SELECT * FROM post_questions WHERE NOT roll_no='$except_stu'";
$quest = mysqli_query($conn,$ask_questions);

$notification = "SELECT * FROM post_projects WHERE NOT roll_no='$except_stu'";
$noti = mysqli_query($conn,$notification);

$noti_rows = mysqli_num_rows($noti);
$quest_rows = mysqli_num_rows($quest);

$quest_noti = $noti_rows + $quest_rows;
//echo "<span style='color:white;'>$quest_rows</span>";

//echo "<span style='color:white;'>$number_of_rows</span>";

if($data)
  {
    //echo "<span style='color:white;'>Query fired</span>";
  }
  else
  {
    //echo "<span style='color:white'>Query not fired</span>";
  }
?>


<!Doctype html>
<head>
<!-- Linking css-->
<link href="css/style.css" rel="stylesheet" type="text/css" >
<title>Home Page</title>
</head>
<body bgcolor="orange">
  <div id="outer">   <!--  Outer Part of Page Start -->
 	<div id="home-header-background">	<!--  Header Start -->

 	<div id="home-innovata-outer">
     <div id="innovata-section">
      <div id="innovata">Innovata</div>
      <div id="way-think">The Way To Think</div>
     </div>

     <a href="detail_notification.php"><input type="button" value="Notification" class="button-decor" style="margin-left: 60px;"></a>
     <div class="notifi-badge"><?php echo "$quest_noti";?></div>
     <input type="button" value="Feedback" class="button-decor">
     <a href="detail_workplace.php"><input type="button" value="Work" class="button-decor"></a>
     <div class="work-badge"><?php echo "$number_of_rows";?></div>
    </div>



    <div id="home-header-right">
    	<?php 
    		$pic = $_SESSION["roll_number"].".jpg";
    		//echo $pic;
    		$path = "uploads/default_prof_upload/".$pic;
    	?>
    	
    	 <div style="float:left;"><img src="<?php echo $path ?>" id="prof_dropdown" style="width:120px;height:120px;border-radius:60px;margin-top: 37px;"></div>
    	 
    	  <div style="margin-top: 83px;" class="post-dropdown">
    	  	<input type="button" value="Post" style="margin-left: 0px;" class="button-decor">
    	  	<div class="drop-cont">
    	  	 <a href="work.php" target="_blank">Work</a>
    	  	 <a href="projects.php" target="_blank">Projects</a>
    	  	 <a href="askquestions.php" target="_blank">Ask Questions</a>
    	  	 <a href="index.php">Log Out</a>
    	  	</div>
		</div>

		<a href="acknowledge.php"><input type="button" value="Acknowledge" style="margin-left: 10px;" class="button-decor"></a>

    </div>

 	 </div>
 	<!--  Header End -->

 	
 	<div id="search-outer">  
 	 <!-- Search Outer Start -->
 		<div id="search-left-background">
 		 	<input type="text" id="search-text-box" placeholder="Search.....">
		</div>

		<div id="serach-button-outer">
		  <input type="button" value="Search" id="search-button" >	
		</div>

 	</div>		<!-- Search Outer End -->
 	

 	
 	<div id="under-searchbox"> <!-- Starting Background under search box -->
 		<div id="left-screen"> <!-- Starting of left side screen under search box -->
 		 <div class="left-screen-instance">
 		  <div class="left-screen-pic">
 		   <img src="images/topics.jpg" class="image-property">
 		  </div>
		  <div class="pic-name">Topics</div>
         </div>

		<div class="left-screen-instance">
 		  <div class="left-screen-pic">
 		   <img src="images/researches.jpg" class="image-property">
 		  </div>
		  <div class="pic-name">Researches</div>
         </div>         

         <div class="left-screen-instance">
 		  <div class="left-screen-pic">
 		   <img src="images/projects.jpg" class="image-property">
 		  </div>
		  <div class="pic-name">Projects</div>
         </div>
	    </div>	<!-- Ending of left side screen under search box -->

	    <div id="center-screen"> <!-- Starting of the outer of the center screen -->
<!---------------------------------------------------------------------------------------------------------------------------------------------------->
		 <div class="center-screen-profile-outer"> <!-- Starting of the outer of the profile credentials -->
		  <div class="question-heading">Can I use windows after installing kali ?</div>
		  <div class="image-div-outer">	<!-- Starting of the Image div outer -->
		  	<div class="image-div">
		  	 <img src="<?php echo $path ?>" style="width:100px;height:80%;border-radius: 80px;">	
		  	</div>
		  	<div class="student-detail-outer">
		  	 <div class="student-name-decor">Gourav Ranga</div>
		  	 <div class="dept-name-decor">Department : Computer Science & Engineering</div>
		  	</div>
		  </div>	<!-- Ending of the Image div outer -->
		  <div class="student-answer">
		   	Yes , Obviously you can use Windows after installing Kali Linux but the thing that you have to remember that is you must have the good knowledge of partition of disk Because if you install the both OS(Windows / Linux) on the same sector of HDD then it can effect your system.
 			You can refer internet or online help to install both OS in your System.
		  </div>
		  <input type="button" value="View more" class="view-more">
		</div>		<!-- Ending of the outer of the profile credentials --> 	   	
<!---------------------------------------------------------------------------------------------------------------------------------------------------->

		<div class="center-screen-profile-outer"> <!-- Starting of the outer of the profile credentials -->
		  <div class="question-heading">Can I use windows after installing kali ?</div>
		  <div class="image-div-outer">	<!-- Starting of the Image div outer -->
		  	<div class="image-div">
		  	 <img src="<?php echo $path ?>" style="width:100px;height:80%;border-radius: 80px;">	
		  	</div>
		  	<div class="student-detail-outer">
		  	 <div class="student-name-decor">Gourav Ranga</div>
		  	 <div class="dept-name-decor">Department : Computer Science & Engineering</div>
		  	</div>
		  </div>	<!-- Ending of the Image div outer -->
		  <div class="student-answer">
		   	Yes , Obviously you can use Windows after installing Kali Linux but the thing that you have to remember that is you must have the good knowledge of partition of disk Because if you install the both OS(Windows / Linux) on the same sector of HDD then it can effect your system.
 			You can refer internet or online help to install both OS in your System.
		  </div>
		  <input type="button" value="View more" class="view-more">
		</div>		<!-- Ending of the outer of the profile credentials --> 	   	
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="center-screen-profile-outer"> <!-- Starting of the outer of the profile credentials -->
		  <div class="question-heading">Can I use windows after installing kali ?</div>
		  <div class="image-div-outer">	<!-- Starting of the Image div outer -->
		  	<div class="image-div">
		  	 <img src="<?php echo $path ?>" style="width:100px;height:80%;border-radius: 80px;">	
		  	</div>
		  	<div class="student-detail-outer">
		  	 <div class="student-name-decor">Gourav Ranga</div>
		  	 <div class="dept-name-decor">Department : Computer Science & Engineering</div>
		  	</div>
		  </div>	<!-- Ending of the Image div outer -->
		  <div class="student-answer">
		   	Yes , Obviously you can use Windows after installing Kali Linux but the thing that you have to remember that is you must have the good knowledge of partition of disk Because if you install the both OS(Windows / Linux) on the same sector of HDD then it can effect your system.
 			You can refer internet or online help to install both OS in your System.
		  </div>
		  <input type="button" value="View more" class="view-more">
		</div>		<!-- Ending of the outer of the profile credentials --> 	   	
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="center-screen-profile-outer"> <!-- Starting of the outer of the profile credentials -->
		  <div class="question-heading">Can I use windows after installing kali ?</div>
		  <div class="image-div-outer">	<!-- Starting of the Image div outer -->
		  	<div class="image-div">
		  	 <img src="<?php echo $path ?>" style="width:100px;height:80%;border-radius: 80px;">	
		  	</div>
		  	<div class="student-detail-outer">
		  	 <div class="student-name-decor">Gourav Ranga</div>
		  	 <div class="dept-name-decor">Department : Computer Science & Engineering</div>
		  	</div>
		  </div>	<!-- Ending of the Image div outer -->
		  <div class="student-answer">
		   	Yes , Obviously you can use Windows after installing Kali Linux but the thing that you have to remember that is you must have the good knowledge of partition of disk Because if you install the both OS(Windows / Linux) on the same sector of HDD then it can effect your system.
 			You can refer internet or online help to install both OS in your System.
		  </div>
		  <input type="button" value="View more" class="view-more">
		</div>		<!-- Ending of the outer of the profile credentials --> 	   	
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
		<input type="button" name="view-cont" value="view-more" class="view-cont" onclick="outerHeight()">
		</div>		<!-- Ending of the outer of the center screen -->

	    <div id="right-screen"> 		<!-- Starting of the outer of the right screen -->
	     <div class="suggestion">
	      <div class="suggestion-title">Suggestions</div>		
	      <div class="suggestion-topics-outer"><a href="http://www.ehackingnews.com/" target="_blank" class="suggestion-topics">Information Security</a></div>
	      <div class="suggestion-topics-outer"><a href="https://en.wikipedia.org/wiki/Linux" target="_blank" class="suggestion-topics">Linux</a></div>
	      <div class="suggestion-topics-outer"><a href="https://www.cisco.com/c/en/us/solutions/small-business/resource-center/networking/networking-basics.html" target="_blank" class="suggestion-topics">Networking</a></div>
	      <div class="suggestion-topics-outer"><a href="https://null-byte.wonderhowto.com/" target="_blank" class="suggestion-topics">Hacking</a></div>
	      <div class="suggestion-topics-outer"><a href="https://www.khanacademy.org/computing/computer-programming" target="_blank" class="suggestion-topics">Programming</a></div>
	      <div class="suggestion-topics-outer"><a href="https://www.mysql.com/" target="_blank" class="suggestion-topics">Database Administrator</a></div>
	      <div class="suggestion-topics-outer"><a href="https://en.wikipedia.org/wiki/Operating_system" target="_blank" class="suggestion-topics">Operating System</a></div>
	      <div class="suggestion-topics-outer"><a href="https://en.wikipedia.org/wiki/Technology" target="_blank" class="suggestion-topics">Technology</a></div>
	      <div class="suggestion-topics-outer"><a href="https://en.wikipedia.org/wiki/Artificial_intelligence" target="_blank" class="suggestion-topics">Artificial Intelligence</a></div>
	      <div class="suggestion-topics-outer"><a href="https://en.wikipedia.org/wiki/Cryptography" target="_blank" class="suggestion-topics">Cryptography</a></div>
	      <div class="suggestion-topics-outer"><a href="https://en.wikipedia.org/wiki/Computer_memory" target="_blank" class="suggestion-topics">Memory Systems</a></div>
	      <div class="suggestion-topics-outer"><a href="https://en.wikipedia.org/wiki/Robotics" target="_blank" class="suggestion-topics">Robotics</a></div>
	      <div class="suggestion-topics-outer"><a href="https://www.w3schools.com/whatis/" target="_blank" class="suggestion-topics">Web Development</a></div>
	     </div>		
	    </div>	<!-- Ending of the outer of the right screen -->

	    <div id="right-screen">			<!-- Starting of the right Latest News board -->
	     <div class="latest-news">
	      <div class="suggestion-title">Latest News</div>			
	       <div class="news-title-outer">
	       	<div class="news-title">Wpa/Wpa2</div>
	       	<div class="news-content">
	       		Wpa(Wi-Fi Protected Access) is a network security protocol which is used to protect the data that is trasfer between the source and destination
	       	</div>
	       </div>

	       <div class="news-title-outer">
	       	<div class="news-title">Hacking</div>
	       	<div class="news-content">
	       		Wpa(Wi-Fi Protected Access) is a network security protocol which is used to protect the data that is trasfer between the source and destination
	       	</div>
	       </div>

	       <div class="news-title-outer">
	       	<div class="news-title">Networking</div>
	       	<div class="news-content">
	       		Wpa(Wi-Fi Protected Access) is a network security protocol which is used to protect the data that is trasfer between the source and destination
	       	</div>
	       </div>


	     </div>
	    </div>	<!-- Ending of the right Latest News board -->


 	</div>	<!-- End Background under search box -->


   </div><!--  Outer Part of Page End -->

<script type="text/javascript">
	function outerHeight()
	{
		document.getElementById("under-searchbox").style.height="2000px";
	}
</script>

</body>
</html>