<?php
include('session.php');
if($desg != "admin")
{
header("location:index.php");

}
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
$check_pass =$_POST['old_password'];
$new_password=$_POST['new_password'];
if($check_pass == $password)
{
$sql="UPDATE  `u418263775_test`.`logins` SET  `password` =  '$new_password' WHERE  `logins`.`username` = '$email';";

$result = mysqli_query($db,$sql);
$msg = "Password Change Successful ";
}
else
{
$msg ="Password Change Failed !Kindly enter correct current password ";
}
     
}

?>
<html>
<style>
.right {
    text-align: right;
    float: right;
}

#foot {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    border: 1px solid;
    border-color: #c3ccdb;
    background-color: #f8f8f8;
    height: 20px;
    font-size: 12px;
}
#left{
    position: relative;
    left:0;
    border: 1px solid black;
    margin-top: -18px;
    width: 150px;
    text-align: center;
    height: 440px;
}
.sidenav {
    //height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    //top: 0;
    left: 0;
    background-color: #1768b2;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 5px 5px 5px 32px;
    text-decoration: none;
    font-size: 19px;
    color: white;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
      color: white;
      font-weight: bold;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 550px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#form
{
margin-top:-60px;
}
#table
{
margin-top:-30px;

}
.well{
   border: 3px solid grey !important;
}
.navbar-xs { min-height:118px; height: 118px; background-color: #f8f8f8; }
.navbar-xs .navbar-brand{ padding: 0px 12px; font-size: 10px !important; line-height: 118px; background-color: #f8f8f8;}
.navbar-xs .navbar-nav > li > a {  padding-top: 0px; padding-bottom: 0px; line-height: 118px; background-color: #f8f8f8; }
#inside_foot{
    position: absolute;
    right: 0;
    margin-top: -17px;
}
</style>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<head>
  <title>Leave Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

</head>
<body>

<nav class="navbar navbar-xs ">
  <div class="container-fluid">
       <ul class="nav navbar-right">
        <li class="active"> <strong><?php echo "".$name."&nbsp&nbsp&nbsp" ;?></strong> </li> 
        </ul><br>
      <div class="right">
        <a href="logout.php" align="right">Logout</a>
       </div>
    <div class="nav navbar-center">
     <center> <a href="#" class="navbar-center"><img src="final.png"></center> </a><br/>
    </div>
    
  </div>
</nav>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<a href="admin.php">Home </a>
  <a href="apending.php">Pending Applications </a>
<a href="areport.php">Reports</a>
<a href="alr.php">Leave Reports</a>
<a href="add.php">User Management</a>
<a href="aoperation.php"> Admin Control Panel</a>
<a href="acancel.php"> Cancel Leave</a>
<a href="acan.php">Pending Leave Cancellation </a>
  <a href="aupdate.php">View/Update Profile</a>
  <a href="achange.php">Change Password</a>
  </div>

<span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

<div class="container-fluid" id="form-container">
<div class="row">
<div class="col-xs-offset-4 col-xs-4 ">
<br><br>
<div id="form">
<form name="" method="post" action=" ">
<h2 id="head" style="color: #1b68ae;"><center>Update Password</center></h2><hr>
<div class="well">
<h4 style="color: #0033cc;"><center> <? echo  $msg; ?></center></h4>
<div class="form-group">
	<label  for="old_password">Current Password  </label>
<INPUT type="password" class="form-control" name="old_password"  maxlength="50" size="30" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$" required title="Password Should be Minimum 8 characters at least 1 Alphabet, 1 Number and 1 Special Character" >
</div>
<div class="form-group">
<label for="new_password">New Password </label>

<input type="password" class="form-control" name="new_password" id="new_password" size ="30" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$" title="Password Should be Minimum 8 characters at least 1 Alphabet, 1 Number and 1 Special Character">
</div>

<div class="form-group">
 <label for="confirm_password">Re-Enter Password</label>

<input type="password"class="form-control" name="confirm_password" id="confirm_password" size ="30"  required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$" title="Password Should be Minimum 8 characters at least 1 Alphabet, 1 Number and 1 Special Character">
</div>

 <div class="form-group" id="submit">
  <center>
  <input type ="submit"  style="background-color:transparent" id="btnSubmit" onclick="return Validate()"  value="Update"> </center>
 </div>
<div>

</form>
</div>
</div>
</div>
</div>
<div id="foot">
&nbsp&nbsp&copy; Anurag Group of Institutions, 2017 
<div id="inside_foot">
<strong>Courtesy</strong>: Dept. of Information Technology&nbsp&nbsp 
</div>

</div>
 
</body>

    <script>
var password = document.getElementById("new_password"),
  confirm_password = document.getElementById("confirm_password");

function validatePassword() {
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("New and Confirm Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

new_password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>



</html>