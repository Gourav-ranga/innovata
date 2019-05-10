<datalist id="dept">
 <option>CSE</option>
 <option>EE</option>
 <option>CE</option>
 <option>ECE</option>
 <option>IT</option>
 <option>ME</option>
</datalist>

<datalist id="batch">
 <option>A-1</option>
 <option>A-2</option>
 <option>A-3</option>
 <option>M-1</option>
 <option>M-2</option>
 <option>M-3</option>
 <option>K-1</option>
 <option>K-2</option>
 <option>K-3</option>
</datalist>

<datalist id="yos">
 <option>1</option>
 <option>2</option>
 <option>3</option>
 <option>4</option>
</datalist>

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
    //echo "<span style='color:black'>Connection Established</span>";
  }
  else
  {
    die("Connection failed because".mysqli_connect_error());
  }

  if(empty($_POST['name']) && empty($_POST['dept_name']) && empty($_POST['batch']) && empty($_POST['mob']) && empty($_POST['yofs']) && empty($_POST['roll-no']))
  {
   $stu_name = NULL; 
   $dept_name = NULL;
   $batch = NULL;
   $mobile = NULL;
   $yofs = NULL;
   $roll = NULL;
  }


  else
  {
  $stu_name = strtoupper($_POST['name']);
  $dept_name = strtoupper($_POST['dept_name']);
  $batch = strtoupper($_POST['batch']);
  $mobile = $_POST['mob'];
  $yofs = $_POST['yofs'];
  $roll = strtoupper($_POST['roll-no']);
}
  //printf("%s (%s) (%s) (%s) (%s) (%s)",$stu_name,$dept_name,$batch,$mobile,$yofs,$roll);

 $query = "INSERT INTO new_register_verification(name,dept_name,batch,mob_no,study_year,roll_no) VALUES('$stu_name','$dept_name','$batch','$mobile','$yofs','$roll')";

 if(!empty($_POST['mob']))
 {
  $data = mysqli_query($conn,$query);
 
  if($data)
  {
    //echo "<span style='color:black;'>Query fired</span>";

  	unset($_POST['mob']);
  }
  else
  {
    //echo "<span style='color:black'>Query not fired</span>";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
 	<!--linking css -->
  <link href="css/style.css" rel="stylesheet" type="text/css">

	<title>Admin student data insert</title>
</head>
<body>

 <a href="admin_services.php"><div id="admin-data-insertion">Student Data Insertion</div></a>
 <div id="center-outer-div">	<!-- Center Outerdiv Start -->
  <div id="center-maindiv">		<!-- Center maindiv start -->


  	<div class="left-text">     <!-- Left Panel Content Details Start -->
		<div class="left-text-decor">Name &nbsp(Full Name)</div>
        <div class="left-text-decor">Department Name</div>
        <div class="left-text-decor">Batch</div>
        <div class="left-text-decor">Mobile No.</div>
        <div class="left-text-decor">Year of Study</div>
        <div class="left-text-decor">Roll No.</div>    
	</div>                 <!-- Left Panel Content Details End -->

	
  	
	<div class="ceter-colon-decor">
       <div class="colon">:</div>
       <div class="colon">:</div>
       <div class="colon">:</div>
       <div class="colon">:</div>
       <div class="colon">:</div>
       <div class="colon">:</div>
      </div>


    <form method="POST">
	 <div class="right-text">   <!-- Registration Right Panel Details Start -->
       <input type="text" style="margin-top:36px;" required="required" name="name" class="reg-right-input" placeholder="Full Name" required="required">

        <input type="text" style="margin-top:34px;" name="dept_name" required="required" list="dept" class="reg-right-input" 
        placeholder="select" required="required">

        <input type="text" style="margin-top:33px;" name="batch" required="required" list="batch" class="reg-right-input" placeholder="select" required="required">

        <input type="text" style="margin-top:32px;" name="mob" required="required"  class="reg-right-input" placeholder=
         "Mob. No required"required">

        <input type="text" style="margin-top:32px;" name="yofs" required="required" list="yos" class="reg-right-input" placeholder="Current Year of Study" required="required">


        <input type="text" style="margin-top:32px; text-transform: uppercase;" required="required" name="roll-no" class="reg-right-input" placeholder="eg:(15EJICS721)" required="required">
	  </div>		<!-- Registration Right Panel Details End -->
	  <input type="submit"  name="submit" value="Insert" id="admin-insert-form-submit" >

    </form>

  </div>     <!-- Center maindiv End -->
 </div>		 <!-- Center Outerdiv End -->	


</body>
</html>



