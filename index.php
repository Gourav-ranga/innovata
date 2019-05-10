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
 <option>1st</option>
 <option>2nd</option>
 <option>3rd</option>
 <option>4th</option>
</datalist>


<?php
  session_start();
  if(!empty($_SESSION['roll_number']))
  {
   session_destroy();
  }
  //ob_start();
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

  if(empty($_POST['name']) && empty($_POST['dept_name']) && empty($_POST['batch']) && empty($_POST['mob']) && empty($_POST['roll-no']))
  {
   $stu_name = NULL; 
   $dept_name = NULL;
   $batch = NULL;
   $mobile = NULL;
   $roll = NULL;
  }

  else
  {
   /******** Entered Form Data ********/
  $stu_name = $_POST['name'];
  $dept_name = $_POST['dept_name'];
  $batch = $_POST['batch'];
  $mobile = $_POST['mob'];
  $roll = $_POST['roll-no'];
  }

  

  //printf("%s (%s) (%s) (%s) (%s)",$stu_name,$dept_name,$batch,$mobile,$roll);

  $query = "select * from new_register_verification where roll_no='$roll'";  // Query
  $data = mysqli_query($conn,$query); // Query Fire

 
  if($data)
  {
    //echo "<span style='color:black;'>Query fired</span>";
  }
  else
  {
    //echo "<span style='color:black'>Query not fired</span>";
  }

  $result = mysqli_fetch_assoc($data);  // Fetch Data

  /*********** Data Fetch from Database ********/
  $db_stu_name = $result['name'];
  $db_dept_name = $result['dept_name'];
  $db_batch = $result['batch'];
  $db_mob_no = $result['mob_no'];
  $db_roll_no = $result['roll_no'];

 // printf("(%s) (%s) (%s) (%s) (%s)", $db_stu_name,$db_dept_name,$db_batch,$db_mob_no,$db_roll_no);

  $stu_name_check = strcasecmp($stu_name, $db_stu_name);
  $stu_dept_check = strcasecmp($dept_name, $db_dept_name);
  $stu_batch_check = strcasecmp($batch , $db_batch);
  $stu_mob_check = strcmp($mobile, $db_mob_no);
  $stu_roll_check = strcasecmp($roll, $db_roll_no );

  //printf("(%s) , (%s) , (%s) , (%s) , (%s)", $stu_name_check , $stu_dept_check , $stu_batch_check , $stu_mob_check , $stu_roll_check  );

  if(($stu_name_check == 0) && ($stu_dept_check == 0) && ($stu_batch_check == 0) && ($stu_mob_check == 0) && ($stu_roll_check == 0))
  {
  
    /////////////////  starting of checking of id and password is empty or not  /////////////////

    if(empty($_POST['id-lower']) && empty($_POST['pass1']) && empty($_POST['pass2']))
    {
      $_POST['id-lower']=NULL;
      $_POST['pass_1']=NULL;
      $_POST['pass_2']=NULL;
    }

    /////////////////  ending of checking of id and password is empty or not  /////////////////

    $login_cred_id = $_POST['id-lower'];
    $suffix = "@innovata.jiet";
    $pass1 = $_POST['pass_1'];
    $pass2 = $_POST['pass_2'];
    //echo $login_cred_id.$pass1.$pass2;
    $lower = strtolower($login_cred_id);
    

    //echo $lower;
  ///////////////////  Start Login Credentials id at index.html /////////////
    
    if(preg_match("/$suffix/", strtolower($login_cred_id)))
    {
      //echo "correct";
      //echo strtolower($login_cred_id);

    ////////////////  Start Password Comparision  ///////////////////

      if(strcmp($pass1,$pass2) == 0)
      {
        //echo "Password Correct";
        $id_pass_insert = "INSERT INTO login_credentials(id,password) VALUES('$lower',$pass1)";
        $login_cred_data = mysqli_query($conn,$id_pass_insert);

        if($login_cred_data == TRUE)
        {
          //echo "Query Fired";
          $_SESSION['home_page']=$lower;
          $_SESSION['roll_number']=strtolower($db_roll_no);
          //echo $_SESSION['home_page'];
          if(isset($_SESSION['home_page']))
          {
           header('Location:home.php'); 
          }
          exit();
        }
        else
        {
          echo "Query not Fired";
        }

      }
      else
      {
        echo "<script>alert('Password Incorrect')</script>";
      }

    ////////////////  Start Password Comparision  ///////////////////

    }
    else
    {
      //echo "<script>alert('Id Incorrect !')</script>";
    }
  /////////////////// End of Login Credentials id at index.html /////////////

  }
  else
  {
    echo "<script> alert('Authentication Interrupted !');</script>";
  }
 //ob_end_flush();
?>


<!Doctype html>
 <html>
 <head>
 	<!--linking css -->
  <link href="css/style.css" rel="stylesheet" type="text/css">
 
  <title>Innovata</title>
 </head>
 <body>
 <!-- Outer Part of Page Start-->
  <div id="outer">
  <!-- Header Start -->
   <div id="header-background">
   	<div id="innovata-outer">
     <div id="innovata">Innovata</div>
     <div id="way-think">The Way To Think</div>
    </div>

    <form method="POST">
    <div id="id-pass-outer">
     <div class="id-pass-text">
     	<div style="padding-top: 6px; float: left">Innovata Id :</div> 
        <div style="float:left; margin-left: 10px;" ><input type="text" required="required" name="innovata_id_upper" class="input-decor"></div>
     </div>

     <div class="id-pass-text" style="margin-left:50px;">
     	<div style="padding-top: 6px; float:left;">Password : </div>
        <div style="float:left;margin-left: 10px;"><input type="text" required="required" name="innovata_id_bottom" class="input-decor">
        <div><input type="submit"  id="login-button" name="Login" title="Login" value="Login"></div>
    </div>
    </div>
    </div>
    </form>

   </div>
   <!-- Header End -->

   <div id="bg-image">        <!-- Background image start -->
    <div class="form-heading">Registration Form</div>	  <!-- Registration Heading -->

  
    
     <div class="reg-form-outer"> <!-- Registration Form Details Outer start-->
     
      <div class="left-text">     <!-- Left Panel Content Details Start -->

      	<div class="left-text-decor">Name &nbsp(Full Name)</div>
        <div class="left-text-decor">Department Name</div>
        <div class="left-text-decor">Batch</div>
        <div class="left-text-decor">Mobile No.</div>
        <div class="left-text-decor">Year of Study</div>
        <div class="left-text-decor">Email Id</div>
        <div class="left-text-decor">Roll No.</div>

      </div>                 <!-- Left Panel Content Details End -->
      
      <div class="ceter-colon-decor">
       <div class="colon">:</div>
       <div class="colon">:</div>
       <div class="colon">:</div>
       <div class="colon">:</div>
       <div class="colon">:</div>
       <div class="colon">:</div>
       <div class="colon">:</div>
      </div>

      <form method="POST" >

      <div class="right-text">   <!-- Registration Right Panel Details Start -->
       <input type="text" style="margin-top:36px;" required="required" name="name" class="reg-right-input" placeholder="Full Name">

        <input type="text" style="margin-top:34px;" name="dept_name" required="required" list="dept" class="reg-right-input" 
        placeholder="select">

        <input type="text" style="margin-top:33px;" name="batch" required="required" list="batch" class="reg-right-input" placeholder="select">

        <input type="text" style="margin-top:32px;" name="mob" required="required"  class="reg-right-input" placeholder=
         "Mob. No.">

        <input type="text" style="margin-top:32px;" name="yofs" required="required" list="yos" class="reg-right-input" placeholder="Current Year of Study">

        <input type="text" style="margin-top:33px;" required="required" name="email-id" class="reg-right-input" placeholder="Active Email Id">

        <input type="text" style="margin-top:32px; text-transform: uppercase;" required="required" name="roll-no" class="reg-right-input" placeholder="eg:(15EJICS721)">


      </div>		<!-- Registration Right Panel Details End -->
     
     
    </div>  <!-- Registration Form Details Outer End-->     

   <!---------------- Registration Section End --------------------->

   <!------------------------------------ Login Section Start ---------------------------------------->

    <div class="form-heading">Login Credentials</div>	  <!-- Login Credentials Heading -->
     <div class="login-form-outer"> <!-- Login Section Details Outer start -->
      <div class="login-left-text">     <!-- Left Panel Content Details Start -->
        <div class="left-text-decor">Innovata Id</div>
        <div class="left-text-decor">Password</div>
        <div class="left-text-decor">Re-type Password </div>
      </div>                 <!-- Left Panel Content Details End -->



      <div class="login-ceter-colon-decor">
       <div class="login-colon">:</div>
       <div class="login-colon">:</div>
       <div class="login-colon">:</div>
      </div>

     
      <div class="login-right-text">   <!-- Login Panel Details Start -->
       <input type="text" style="margin-top:36px ; text-transform: lowercase;" name="id-lower" required="required" class="reg-right-input" placeholder="eg:(gourav123@innovata.jiet)">
       <input type="Password" style="margin-top:32px;" required="required" name="pass_1" class="reg-right-input" placeholder="Password">
       <input type="Password" style="margin-top:33px;" name="pass_2" required="required" class="reg-right-input" placeholder="Password">
      </div>		<!-- Login Panel Details End -->
      
     </div>
     
 
  <input type="submit"  name="submit" value="Submit" id="form-submit">    
 
  </form>


   </div>       <!-- Background image end -->
  </div>        <!-- Outer Part of Page End -->
  	
 </body>
 </html>
