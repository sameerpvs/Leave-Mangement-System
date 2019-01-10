<?php
include('session.php');
if($desg != "director")
{
header("location:index.php");
}
 ?>

<html>
<style>
.right {
    text-align: right;
    float: right;
}
#foot {
   
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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#main{
margin-top:-50px;
}
.navbar-xs { min-height:118px; height: 118px; background-color: #f8f8f8; }
.navbar-xs .navbar-brand{ padding: 0px 12px;font-size: 16px;line-height: 118px; background-color: #f8f8f8;}
.navbar-xs .navbar-nav > li > a {  padding-top: 0px; padding-bottom: 0px; line-height: 118px; background-color: #f8f8f8; }
#inside_foot{
    position: absolute;
    right: 0;
    margin-top: -17px;
}
.well{
    border: 1px solid grey !important;
    width: 90%;
}
table{
   font-size: small !important;
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


<div class="nav navbar-fixed-bottom" id="foot">
&nbsp&nbsp&copy; Anurag group of institutions 2017 
<div id="inside_foot">
<strong>Courtesy</strong>: Dept. of Information Technology&nbsp&nbsp 
</div>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<a href="director.php">Home</a>
<a href="dpending.php">Pending Applications</a>
<a href="dleave.php">Apply Leave</a>
<a href="dreport.php">Reports</a>
<a href="dlr.php">Leave Reports</a>
  <a href="dupdate.php">View/Update Profile</a>
  <a href="dchange.php">Change Password</a>
  </div>

<span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
<div id="main">
<center><br><h2 style="color: #1b68ae;"> Leave Report</h2>
<h4>To view Leave Report, select the Month and Department </h4>
<form method="post" name="Select" action="">
<select name="month" id="month">
  <option value="1">Jan</option>
  <option value="2">Feb</option>
  <option value="3">Mar</option>
  <option value="4">April</option>
<option value="5">May</option>
  <option value="6">Jun</option>
  <option value="7">Jul</option>
  <option value="8">Aug</option>
<option value="9">Sep</option>
  <option value="10">Oct</option>
  <option value="11">Nov</option>
  <option value="12">Dec</option>
</select>
<select name="year" id="year">
  <option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
</select> <select name="dept" id="dept">
<option value="Chemical">CHEMICAL</option>
<option value="Civil">CIVIL</option>
<option value="CSE">CSE</option>
<option value="EEE">EEE</option>
<option value="ECE">ECE</option>
<option value="IT">IT</option>
<option value="MBA">MBA</option>
<option value="Mechanical">ME</option>
<option value="Pharmacy">PHARM</option>
  <option value="English">English</option>
<option value="Chemistry">Chemistry</option>
<option value="Physics">Physics</option>
<option value="Maths">Maths</option>
<option value="Physical Education">Physical Education</option>
<option value="all">ALL</option>

</select><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value="Submit" style="margin-left: -100px;">
</center>
</form>
<? 
if( $_POST ){
$year =$_POST['year'];
$month = $_POST['month'];
$dept1 =$_POST['dept'];

	if($month =="1")
	{
	$mon="January"; 
	}
	else if ($month=="2")
	{
	$mon="February";
	}
	else if ($month=="3")
	{
	$mon="March";
	}else if ($month=="4")
	{
	$mon="April";
	}else if ($month=="5")
	{
	$mon="May";
	}else if ($month=="6")
	{
	$mon="June";
	}else if ($month=="7")
	{
	$mon="July";
	}
	else if ($month=="8")
	{
	$mon="August";
	}
	else if ($month=="9")
	{
	$mon="September";
	}else if ($month=="10")
	{
	$mon="October";
	}else if ($month=="11")
	{
	$mon="November";
	}
	else
	{
	$mon="December";
	}
if($dept1=="all")
{
	$sql= "SELECT * FROM `status` WHERE MONTH(FDATE) ='$month'  AND YEAR( fdate )='$year' order by fdate DESC,dept,name  ";
}
else
{
	$sql= "SELECT * FROM `status` WHERE MONTH(FDATE) ='$month' AND YEAR( fdate )='$year' and `dept` like '$dept1' order by fdate DESC,dept,name ";
}

$result = mysqli_query($db,$sql);
$rwno = mysqli_num_rows($result);
if($rwno != 0)
{

echo"

<center>
<div class='well'>
<div class='table-responsive'> 
<table class='table-condensed' border='1'>


  <tr><th>S.No</th>
<th>Name</th>
<th>Department</th>
<th>DoA</th>
<!--<th><center>Email</center></th>-->
<th>Type of Leave</th>
  <th>From Date</th>
<th>To Date</th>
      <th># Days</th>
      <th> Purpose</th>
      
	<th>Work Load Adjustment</th> 
<th>Hod Remarks</th>
<th> Admin Remarks</th>
<th>Status</th>
     </tr></center>";

}

$count=1;
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{

	$fdate= $row['fdate'];
  $tdate = $row['tdate'];
$leave_type = $row['leave_type'];
$name1=$row['name'];
$email1=$row['username'];
$hod=$row['hod'];
  $purpose = $row['purpose'];
  $status = $row['status'];
  $days = $row['days'];
$id=$row['id'];
$hod_remarks=$row['hod_remarks'];
$admin_remarks=$row['admin_remarks'];
$dept3=$row['dept'];
$workload = $row['workload'];
$date3 = date("d-m-Y", strtotime($fdate));
$date4 = date("d-m-Y", strtotime($tdate));
$do=$row['date'];

if($do!="")
{

$doa = date("d-m-Y", strtotime($do));
}


  
  echo "  
	<center>	
      <tr>
<td> <center>$count</center></th>

<td>$name1</td>
<td>$dept3</td>
<td>$doa</td>
<td> $leave_type</td>
<td> $date3</td>
<td>$date4</td>
      <td> $days </td>
     <td> $purpose </td>
      <td> $workload </td>
	   <td>$hod_remarks </td>
<td> $admin_remarks</td>
	   <td> $status </td>
    </center> 
";
$count++;

}

echo" </table> </div></div><br><br>";
if($count < 2)
{
echo "<center><h4>No leaves applied </h4><center>";
}
}

?>
</div>

</body>
</html>
