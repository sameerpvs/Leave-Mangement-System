<?php
include('session.php');
if($desg != "admin")
{
header("location:index.php");
}
 if($_SERVER["REQUEST_METHOD"] == "POST") 
{

$n=$_POST['count'];

for ($i = 1; $i < $n; $i++)
{
$name_l="name_l$i";
$statu="status$i";
$remark="remarks$i";
$namef=$_POST[$name_l];
$fstatus=$_POST[$statu];
$remarks=$_POST[$remark];
if($fstatus=="")
{
$fstatus="Pending with HR";
}

$query2 ="UPDATE  `u418263775_test`.`status` SET  `admin` =  '$fstatus' ,`admin_remarks` =  '$remarks' WHERE  `status`.`id` ='$namef' ;";
$result2 = mysqli_query($db,$query2);
if($fstatus == "Recommended")
{
$query4 ="UPDATE  `u418263775_test`.`status` SET  `status` =  'Pending with Director' , `admin` ='Recommended' WHERE  `status`.`id` ='$namef'";
$result4 = mysqli_query($db,$query4);
$sql4= "Select * from `status` WHERE  `status`.`id` ='$namef' ";
$result8 = mysqli_query($db,$sql4);
while($row = mysqli_fetch_array($result8, MYSQL_ASSOC))
{

$name5=$row['name'];
$email5=$row['username'];
 
  $days5 = $row['days'];
$tfdate=$row['tdate'];
$ffdate = $row['fdate'];

 
}

$date3 = date("d-m-Y", strtotime($ffdate));
$date4 = date("d-m-Y", strtotime($tfdate));
  $ToEmail ="director@cvsr.ac.in";
$EmailSubject ="Leave Application of ".$name5." ";
$MESSAGE_BODY ="<html>Dear Director,<br>Mr/Ms/Dr/Prof. ".$name5." has submitted leave application from ".$date3." for ".$days5." day/s.<br>Click <a href='http://agilms.96.lt/'>here</a> to approve or reject the leave application . <br><br>With Regard<br>Leave Management System,AGI </html> ";

$mailheader .= "From: agilms@anurag.edu.in" . "\r\n"  ;
$mailheader .= "Reply-To:$email5" . "\r\n" ; 
$mailheader .= "Cc:$email5" . "\r\n";
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);



}
if($fstatus == "Not Recommended")
{
$query5 ="UPDATE  `u418263775_test`.`status` SET  `status` =  'Pending with Director' , `admin` ='Not Recommended' WHERE  `status`.`id` ='$namef'";
$result5 = mysqli_query($db,$query5);
$sql5= "Select * from `status`  WHERE  `status`.`id` ='$namef' ";
$result6 = mysqli_query($db,$sql5);
while($row = mysqli_fetch_array($result6, MYSQL_ASSOC))
{

$name5=$row['name'];
$email5=$row['username'];
 
  $days5 = $row['days'];
$tfdate=$row['tdate'];
$ffdate = $row['fdate'];

 
}

$date3 = date("d-m-Y", strtotime($ffdate));
$date4 = date("d-m-Y", strtotime($tfdate));
 $ToEmail ="director@cvsr.ac.in";
$EmailSubject ="Leave Application of ".$name5." ";
$MESSAGE_BODY ="<html>Dear Director,<br>Mr/Ms/Dr/Prof. ".$name5." has submitted leave application from ".$date3." for ".$days5." day/s. <br>Please take an appropriate decision within 3 working days.<br>Click <a href='http://agilms.96.lt/'>here</a> to approve or reject the leave application . <br><br>With Regard<br>Leave Management System,AGI </html> ";

$mailheader .= "From: agilms@anurag.edu.in" . "\r\n"  ;
$mailheader .= "Reply-To:$email5" . "\r\n" ; 
$mailheader .= "Cc:$email5" . "\r\n";
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);



}



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
<div id="main">
<center><br><br><h2 style="color: #1b68ae;">Pending Leave Applications </h2><br></center>
<?
$sql= "Select * from `status` where status = 'Pending with HR'  ";


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
<th>Type of Leave</th>
  <th>From Date</th>
<th>To Date</th>
      <th># Days</th>
      <th> Purpose</th>
      <th>Leave Balance</th>
	<th>Work Load Adjustment</th> 
<th>Hod Remarks</th>
<th> Admin Remarks</th>
<th> &#10003; </th>
<th> &#10005; </th> 
     </tr></center>";

}
 echo '<form method ="post" action="">';
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
$do=$row['date'];
$hod_remarks=$row['hod_remarks'];
$dep10=$row['dept'];
$workload = $row['workload'];
$date3 = date("d-m-Y", strtotime($fdate));
$date4 = date("d-m-Y", strtotime($tdate));
 if($do!="")
{
$dop = date("d-m-Y", strtotime($do));
}

 $month= date(m);


$year=date(Y);

	 $sq20 = "SELECT sum(cl) as cl from status 
                where `username` like '%$email1%' and status =  'accepted' and MONTH( fdate ) <= '$month' AND YEAR( fdate ) ='$year'"; 
        $result20 = mysqli_query($db,$sq20);
       while($row2 = mysqli_fetch_array($result20, MYSQL_ASSOC))
{

$cl=$row2['cl'];


$fcl=$month-$cl;
}


  
  echo "  
	<center>	
      <tr>
<td> <center>$count</center></th>

<td><input type='hidden' name='name_l$count' value='$id'/>$name1</td>
<td>$dep10</center></th>
<td> $dop</td>
<td> $leave_type</td>
<td> $date3</td>
<td> $date4</td>
      <td><center> $days </center></td>
     <td> $purpose  </td>
<td><center> $fcl</center></td>
      <td> $workload</td>
	   <td> $hod_remarks </td>
<td><input type ='text' name='remarks$count' size='15' required></td>
<td><center><input type ='radio' name='status$count' value ='Recommended'/></center></td>
<td><center><input type ='radio' name='status$count' value ='Not Recommended'/></center></td>     </tr>
    </center> 
";
$count++;

}
echo"<input type='hidden' name='count' value ='$count'/>";
echo" </table> </div></div>";
if($count < 2)
{
echo "<center><h4>You don't have any Pending Leave Applications </h4><center>";
}
else { echo"<center><input type ='submit'  style='background-color:transparent' value='Submit' ><br><br><br><br></center> ";}

?>
</div>

</body>
</html>




