<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM logins WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $desg = $row['desg'];
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $username;

if($desg == "hod" )
{
         header("location: hod.php");
}
else if ($desg =="admin")
{
header("location: admin.php");
}
else if ($desg =="director")
{
header("location: director.php");
}
else
{
header("location: faculty.php");
}
}
      else {
         $error = "Invalid Id or Password";
      }
   }
?>

<html>
<style>

.navbar-xs { min-height:118px; height: 118px; background-color: #f8f8f8; }
.navbar-xs .navbar-brand{ padding: 0px 12px;font-size: 16px;line-height: 118px; background-color: #f8f8f8;}
.navbar-xs .navbar-nav > li > a {  padding-top: 0px; padding-bottom: 0px; line-height: 118px; background-color: #f8f8f8; }

#foot {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    border: 1px solid;
    border-color: #c3ccdb;
    height: 20px;
    background-color: #f8f8f8;
    font-size: 12px;
}
#inside_foot{
    position: absolute;
    right: 0;
    //margin-top: -17px;
}
#left_foot {
    position: absolute;
    left: 0;
    //margin-top: -17px;
}
</style>
<head>
  <title>Leave Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-xs ">
 
    <div class="nav navbar-center">
     
     <center> <br><a href="#" class="navbar-center"><img src="final.png"></center> </a><br/>
    </div>
    
  </div>
</nav>
<body>
  <div class="container-fluid" ><center>
<h3 style="color:#116EB0; margin-top: -5px;"> Leave Management System</h3></center><br>
<div class="row"><div class="col-sm-1 col-md-1 col-lg-1"></div>
    <div class="col-sm-6 col-md-7 col-lg-6" style="  padding: 8px;">
         <h5> <b>Welcome to Anurag Leave Management System </b></h5>
         <ul>
           <li>Anurag Leave Management System (ALMS) is an attempt to automate manual process of the Leave Management.</li>
           <li>ALMS is a centralized application that caters the needs of all
               employees right from leave application to approval, track applications, view leave
               balance, View /Generate reports, etc. </li>
         </ul>
         <h5> <b>Salient features of the System</b></h5>
         <ul>
           <li>Simple, easy-to- use interface</li>
           <li>Personalization (user specific screens)</li>
           <li>History Reports</li>
           
           <li>Hassle free Online tracking System</li>
           <li>High availability - Hosted on a LIVE server</li>
           
           <!--<li>WEB – MOBILE interoperability</li>--><br>
          <h5>Click here for detailed <a href="flow.jpg" target="_blank">Work Flow</a></h5>
         </ul>
    </div> 

<center>
<div class="col-sm-5 col-md-4 col-lg-5"><br><br>
<div align = "center">
         <div style = "margin-top:-25px; width: 200px; border: solid 1px #333333 ;background-color:#E1DEDD; " align = "left">
            <div style = "background-color:#003399; color: #f8f8f8; padding:3px;"><center><b>Login</b></center></div>
				
            <div style = "margin:10px;color:black;">
               
               <form action = "" method = "post">
                <center>  <label>Username<br>  </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password<br>  </label><input type = "password" name = "password" class = "box" /><br/><br />
 <input type = "submit" value = " Login "/>&nbsp&nbsp<input type = "reset" value = " Reset "/>
  <br> <br>              
<a href="password.php" target="_blank">Forgot Password</a></center>
               </form>
               
               <div style = "font-size:11px; color:black; margin-top:10px"><?php echo $error; ?></div>
	</div>			
            </div>
				
         </div>
			
      </div>
</div>

<div id="foot">
<div id="left_foot">
&nbsp&nbsp&copy; Anurag Group of Institutions, 2017
</div> 
<div id="inside_foot">
<strong>Courtesy</strong>: Dept. of Information Technology&nbsp &nbsp
</div> 
</div>
</body>
</html>