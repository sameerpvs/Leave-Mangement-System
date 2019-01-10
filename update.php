<?php
include('session.php');

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
$name=$_POST['name'];

$dept=$_POST['dept'];
$id=$_POST['id'];
$phone=$_POST['phone'];


$sql = "UPDATE  `u418263775_test`.`logins` SET  `id` =  '$id',`name` =  '$name',`phone` =  '$phone' WHERE  `logins`.`username` ='$email'";
$result = mysqli_query($db,$sql);

$msg="Profile Updated Successfully ";


     
}

?>
<html>
<style>
.right {
    text-align: right;
    float: right;
}

#foot {
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    border: 1px solid;
    border-color: #c3ccdb;
    height: 20px;
    font-size: 12px;
    background-color: #f8f8f8;
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
    padding: 8px 8px 8px 32px;
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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#form
{
margin-top:-70px;
}
#table
{
margin-top:-50px;

}
.inside_foot {
     position: absolute;
     right: 0;
     margin-top: -17px;
}
.navbar-xs { min-height:118px; height: 118px; background-color: #f8f8f8; }
.navbar-xs .navbar-brand{ padding: 0px 12px;font-size: 16px;line-height: 118px; background-color: #f8f8f8;}
.navbar-xs .navbar-nav > li > a {  padding-top: 0px; padding-bottom: 0px; line-height: 118px; background-color: #f8f8f8; }
label{display:inline-block;}
input{display:block;}
.well{
    width: 500px;
    margin-left: -100px;
    border: 5px solid grey !important ;
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
 <a href="faculty.php">Home</a>
 <a href="workload.php">View Workload</a>
  <a href="leave.php">Apply Leave</a>
  <a href="report.php">Leave Report</a>
   <a href="cancel.php">Leave Cancellation</a>
  <a href="update.php">View/Update Profile</a>
  <a href="change.php">Change Password</a>
</div>



<span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

<div class="container-fluid" id="form-container">
<div class="row">
<div class="col-xs-offset-4 col-xs-4 ">

<div id="form">
<form name="" method="post" action=" ">
<div style="color: #1b68ae; width: 500px; margin-left: -100px;"><h3><center>Profile</center></h3></div>
<div class="well">
<h5 style= "color: #003399;"> <center><strong>* For any changes to be made, kindly edit and press update .</strong></center></h5>
<h4 style= "color: #003399;"><center> <? echo  $msg; ?></center></h4>
<div class="form-group">
	<label  for="name">Name  </label>
<INPUT type="text" class="form-control" name="name"  maxlength="50" size="30" value="<? echo $name ;?>" >
</div>
<div class="form-group">
<label for="email">Email/Username </label>

<input type="text" class="form-control" name="email" size ="30" value="<? echo $email ;?>" disabled>
</div>

<div class="form-group">
 <label for="dept">Department</label>

<input type="text"class="form-control" name="dept" size ="30" value="<? echo $dept ;?>" disabled>
</div>
<div class="form-group" id="list">
<label for="id"  >Employee Id</label>


<input type="number"class="form-control" name="id" size ="30" value="<? echo $id ;?>" >
</div>
<div class="form-group">
 <label for="phone">Phone</label>

<input type="number" class="form-control" name="phone" size ="30" value="<? echo $phone ;?>"  >

 </div>

 <div class="form-group" id="submit">
  <center>
  <input type ="submit"  style="background-color:transparent" onclick="return confirm('Are you sure?')" value="Update"> </center>
 </div>
</div>
</form><br><br>
</div>
</div>
</div>
</div>
<div id="foot">
&nbsp&nbsp&copy; Anurag group of institutions, 2017 
     <div class="inside_foot">
       <strong>Courtesy</strong>: Dept. of Information Technology&nbsp&nbsp 
     </div>
</div>

 
</body>

    



</html>