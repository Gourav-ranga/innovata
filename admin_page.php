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
  </div>     <!-- Header Background End-->   

  <div id="admin-bg-image">        <!-- Background image start -->
   <div id="admin-name">Admin Panel</div>
    <div id="bg-brown">
     <form method="POST">
      <input type="text" required="required" placeholder="Login Id" name="admin-id" class="admin-auth">
      <input type="Password" required="required" Placeholder="Password" name="admin-pass" class="admin-auth"><br>
      <input type="Submit" value="Login" id="admin-login">
     </form>
     
    </div>
   </div>
  </div>      <!-- Outer Part End-->

  <?php  
  session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "innovata";

   $conn = mysqli_connect($servername,$username,$password,$dbname); // Established connection to mysql server

   if($conn)
   {
   	//echo "<span style='color:white'>Connection Ok</span>";
   }
   else
   {
   	die("Connection failed because".mysqli_connect_error());
   }

   if(isset($_SESSION['id']))
   {
   	echo "set";
   	unset($_SESSION['id']);
   }
   else
   {
   	echo "not set";
   }


   $query = "select * from admin_auth"; 
   $data = mysqli_query($conn,$query);
   if($data)
   {
   	//echo "<span style='color:white;'>Query Fired</span>";
   }
   else
   {
   	echo "<span style='color:white;'>Query not fired</span>";
   }
   
   if(empty($_POST['admin-id']) && empty($_POST['admin-pass']))
   {
   	$_POST['admin-id'] = NULL;
   	$_POST['admin-pass'] = NULL;
   	$form_id = NULL;
   	$form_pass = NULL;
   	//echo "hello";
   }
   else
   {
    $form_id = $_POST['admin-id'];
    $form_pass = $_POST['admin-pass'];
   }


   echo "<span style='color:white'>$form_id</span>";
   //echo "<span style='color:white;'>$form_pass</span>";

   $result = mysqli_fetch_assoc($data);             // fetch admin id and password from table 'admin' auth
   $fetch_id = $result['login_id'];
   $pass = $result['password'];
   //echo "<span style='color:white;'>$fetch_id  $pass</span>";

   $id_comp = strcasecmp($form_id,$fetch_id);
   $pass_comp = strcmp($form_pass,$pass);

   //echo "<span style='color:white';>$id_comp $pass_comp</span>";

     if(($id_comp==0) && ($pass_comp==0))
     {
      echo "<span style='color:black'>Login successful</span>";
     	$_SESSION['id']=$form_id;
      header('Location:admin_services.php');
     }
     else
     {
      //echo "<span style='color:black'>Login Unsuccessful</span>";
     }

  ?> 
</body>
</html>