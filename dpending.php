<?php
include('session.php');
if($desg != "director")
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

$namef=$_POST[$name_l];
$fstatus=$_POST[$statu];
$remarks=$_POST[$remark];
if($fstatus=="")
{
$fstatus="Pending with Director";
}

$query2 ="UPDATE  `u418263775_test`.`status` SET  `status` =  '$fstatus'  WHERE  `status`.`id` ='$namef' ;";
$result2 = mysqli_query($db,$query2);


$query4= "Select * from `u418263775_test`.`status` WHERE `id`='$namef'";
$result4 =mysqli_query($db,$query4);
while($row6 = mysqli_fetch_array($result4, MYSQL_ASSOC))
{
$lt=$row6['leave_type'];
$un=$row6['username'];
$na=$row6['name'];
$da=$row6['days'];
$ccl=$row6['ccl'];
}
if($ccl !==0 && $fstatus=="Accepted")
{

$query10= "Select * from `u418263775_test`.`logins` WHERE `username`='$un'";
$result10 =mysqli_query($db,$query10);
while($row6 = mysqli_fetch_array($result10, MYSQL_ASSOC))
{
$lt=$row6['ccl'];

}
$lt=$lt-$ccl;

$query11= "UPDATE  `u418263775_test`.`logins` SET  `ccl` =  '$lt' WHERE  `logins`.`username` =  '$un'";


$result11 =mysqli_query($db,$query11);



}


if($fstatus=="Rejected" || $fstatus=="Accepted" )
{
$EmailSubject ="Leave Application Status of ".$na." ";
$MESSAGE_BODY ="<html>Dear Sir/Maam,<br> Mr.".$na." your leave application has been ".$fstatus."  <br><br>With Regard<br>Leave Management System </html> ";
$mailheader .= "From: agilms@anurag.edu.in" . "\r\n"  ;
$mailheader .= "Reply-To:$email" . "\r\n" ; 
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
mail($un, $EmailSubject, $MESSAGE_BODY, $mailheader);
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
td{
     border-spacing: 20px;
    //border-collapse: separate;
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
<center><br><br><h3 style="color: #1b68ae;">Pending Leave Applications </h3><br></center>
<?
$sql= "Select * from `status` where status = 'Pending with Director'  ";


$result = mysqli_query($db,$sql);
$rwno = mysqli_num_rows($result);

if($rwno != 0)
{

echo "
<center>
<div class='well'>
<div class='table-responsive'> 
<center><table class='table' border='1'>


  <tr><th>S.NO</th>
<th><center>Name</center></th>
<th><center>Department</center></th>
<th>DoA</th>
<th>Type of Leave</th>
  <th>From Date</th>
<th>To Date</th>
      <th># Days</th>
      <th> Purpose</th>
      <th>Leave Balance</th>
	<th>Work Load Adjustment</th> 

<th> Hod Remarks</th>

<th>Admin Remarks</th>
<th> &#10003;</th>
<th> &#10005; </th> 
     </tr></center>
";
}
 echo '<form method ="post" action="">';
$count=1;
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{

	$fdate= $row['fdate'];
  $tdate = $row['tdate'];
$leave_type = $row['leave_type'];
$name1=$row['name'];
$dpt=$row['dept'];
$do=$row['date'];
$email1=$row['username'];
  $purpose = $row['purpose'];
  $status = $row['status'];
  $days = $row['days'];
$id=$row['id'];
$hod_remarks=$row['hod_remarks'];
$admin_remarks=$row['admin_remarks'];
$hod=$row['hod'];
$admin=$row['admin'];
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

<td> <input type='hidden' name='name_l$count' value='$id'/>$name1</td>
<td> <center>$dpt</center></th>
<td> $dop</td>
<td><center> $leave_type</center></td>
<td><center> $date3</center></td>
<td><center> $date4</center></td>
      <td><center> $days </center></td>
     <td><center> $purpose </center> </td>

<td><center> $fcl</center></td>
      <td><center> $workload </center></td>

	 <td><center> $hod_remarks </center></td>

	 <td><center> $admin_remarks </center></td>

<td><center><input type ='radio' name='status$count' value ='Accepted'/></center></td>
<td><center><input type ='radio' name='status$count' value ='Rejected'/></center></td>     </tr>
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
else { echo"<center><input type ='submit'  style='background-color:transparent' value='Submit' ></center><br><br><br> ";}

?>
</div>
</div>
</center>
</body>
</html>




