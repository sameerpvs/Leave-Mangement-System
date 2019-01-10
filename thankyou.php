<?php
include('session.php');
?>

<html>
<style>
.right {
    text-align: right;
    float: right;
}
#foot {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    border: 1px solid;
    border-color: #c3ccdb;
    height: 20px;
    font-size: 12px;
    background-color: #f8f8f8;
}
#left{
    position: absolute;
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
.navbar-xs { min-height:118px; height: 118px; background-color: #f8f8f8; }
.navbar-xs .navbar-brand{ padding: 0px 12px;font-size: 16px;line-height: 118px; background-color: #f8f8f8;}
.navbar-xs .navbar-nav > li > a {  padding-top: 0px; padding-bottom: 0px; line-height: 118px; background-color: #f8f8f8; }
.well{
    width: 500px;
    color: #003399;
}

#inside_foot{
    position: absolute;
    right: 0;
    top: 0;
}

</style>
<link rel="stylesheet" type="text/css" href="animate.css">
<script src="wow.min.js"></script>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

<head>
  <title>Leave Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
</head>

<nav class="navbar navbar-xs ">
  <div class="container-fluid">
<ul class="nav navbar-right">
<li class="active"> <strong><?php
echo "".$name."&nbsp&nbsp&nbsp" ;
?></strong> </li> </ul><br>
<div class="right">
        <a href="logout.php" align="right">Logout</a>
</div>
    <div class="nav navbar-center">
     <center> <a href="#" class="navbar-center"><img src="final.png"></center> </a><br/>
    </div>
    
  </div>
</nav>
<!--<div id="left">
<a href="faculty.php"> Home </a><br>
<a href="workload.php">Workload Adjustment</a>
<a href="leave.php">Apply Leave</a>
  <a href="report.php">Leave Report</a>
  <a href="update.php">Update Profile</a>
  <a href="change.php">Change Password</a></div>-->
<div id="foot">
&nbsp&nbsp&copy; Anurag group of institutions 2017 
<div id="inside_foot">
<strong>Courtesy</strong>: Department of Information Technology
</div>
</div>
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
<br><br><br><br><center><div class="container">
  <div class="well ">
    <h4 class="bounceIn animated"   align="center">Leave Application Submitted!</h4>
	<h6  class="wow bounceInRight animated " data-wow-delay="1s" align="center">Status will be updated after review.</h6> 
	
    
  </div>
  </div></center>
</body>
</html>