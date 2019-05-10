<?php
session_start();
if(!isset($_SESSION['id']))
{
  header("Location:admin_page.php");
}
else
{
  //unset($_SESSION['id']);
  //session_destroy();
  //echo "hello";
  //echo $_SESSION['id'];
}


?>
<!Doctype html>
<html>
<head>
<title>Admin_Login</title>

<!-- Linking of Css-->
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Outer Part Start-->
 <div id="outer">
  <div id="header-background">
   	<div id="innovata-outer">
     <div id="innovata">Innovata</div>
     <div id="way-think">The Way To Think</div>
    </div>
   <a href="admin_page.php"><input type="button" value="Log out" id="admin-log-out"></a> 
  </div>     <!-- Header Background End-->   

  <div id="admin-service-bg-img">        <!-- Background image start -->
   <div id="admin-services">Admin Services</div>
   
    
    <div id="admin-ser-outer">   <!-- Services Outer Start -->

    <!-------------------------------- Insert Outer Start ------------------------------------------>
     <div class="admin-ser-outer-most">    
      <div class="img-outer-frame">
       <img src="images/insert.jpg" width="450" height="260" class="img-scale"/>
      </div>
      <a href="stu_data_ins.php"><input type="button" value="Insert Data" class="service-title"></a>

      
     </div>                       
     <!------------------------------- Insert Outer end --------------------------------------------->

    <!-------------------------------- view Outer Start ------------------------------------------>
     <div class="admin-ser-outer-most" style="margin-left:65px;">
      <div class="img-outer-frame">
       <img src="images/view.jpg" width="450" height="260" class="img-scale"/>
      </div>
      <a href="stu_data_view.php"><input type="button" value="View Data" class="service-title"></a>
     </div>
    <!-------------------------------- view Outer end ------------------------------------------>

    <!-------------------------------- Delete Outer Start -------------------------------------->
     <div class="admin-ser-outer-most" style="margin-top:100px;">
      <div class="img-outer-frame">
       <img src="images/delete.jpg" width="450" height="260" class="img-scale"/>
      </div>
       <a href="stu_data_delete.php"><input type="button" value="Delete Data" class="service-title"></a>
     </div>
    <!-------------------------------- Delete Outer End ------------------------------------------>

    <!-------------------------------- Update Outer Start ---------------------------------------->
     <div class="admin-ser-outer-most" style="margin-left:65px; margin-top: 100px;">
      <div class="img-outer-frame">
       <img src="images/update.jpg" width="450" height="260" class="img-scale"/>
      </div>
      <a href="stu_data_updation.php"><input type="button" value="Update Data" class="service-title"></a>
     </div>
    <!-------------------------------- Update Outer End ---------------------------------------->

    </div>  <!-- Services Outer End -->
   

 </div>      <!-- Outer Part End-->
</body>
</html>