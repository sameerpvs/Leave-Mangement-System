<?php
   
   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username  sent from form 
      
      $username = $_POST['username'];
     
      
      $sql = "SELECT * FROM  `logins` WHERE  `username` =  '$username'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
$password = $row['password'];
$email = $row['username'];
$name = $row['name'];
      $count = mysqli_num_rows($result);
      
		
$ToEmail=$email;
$EmailSubject ="Please find your password ";
$MESSAGE_BODY ="<html>Dear ".$name.",<br>  Your Password for registered id </strong>".$username."</strong> in online leave portal is <strong>".$password."</strong></html>";
  $mailheader .= "From: LeaveManagementSystem@lms.in" . "\r\n"  ;
$mailheader .= "Reply-To:lms@cvsr.ac.in" . "\r\n" ; 
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);
  
 if($count != 0) {     
        $msg = "Password has been emailed to your registered id" ;
}
      else {
         $msg = "Kindly enter valid username";
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
    font-size: 12px;
    background-color: #f8f8f8;
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
&nbsp&nbsp&nbsp<button type="button" onclick="newDoc()"  class="btn btn-primary btn-lg">Home </button>
  <div class="container-fluid" ><center>
<br><br><br><br>
<script>
function newDoc() {
    window.location.assign("index.php")
}
</script>

<form action = "" method = "post">
<h5><label>Please Enter your registered username</label> </h5><br>
                  Username  <input type = "text" name = "username" class = "box"/><br /><br />
                 
 <input type = "submit" value = " Submit "/><br>
  </form>            
</div>
<center>
<div style = "font-size:11px; color:#003399;"><strong><?php echo $msg; ?></strong></div>
</center>					
            </div>
</center>
</body>
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