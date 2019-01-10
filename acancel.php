<?php
include('session.php');
if($desg != "admin")
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
    padding-top: 50px;
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
#head
{
margin-top: -50px;
}
.navbar-xs { min-height:118px; height: 118px; background-color: #f8f8f8 !important; }
.navbar-xs .navbar-brand{ padding: 0px 12px;font-size: 16px;line-height: 118px; background-color: #f8f8f8;}
.navbar-xs .navbar-nav > li > a {  padding-top: 0px; padding-bottom: 0px; line-height: 118px; background-color: #f8f8f8; }
#inside_foot{
    position: absolute;
    right: 0;
    margin-top: -17px;
}

</style>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>

<script>
function print1(){
    document.getElementById("headerr").style.display="none";
    document.getElementById("mySidenav").style.display="none";
    document.getElementById("foot").style.display="none";
    document.getElementById("head").style.display="none"
    document.getElementById("print").style.display="none";
    document.getElementById("menu").style.display="none";
    window.print();
    window.location = "areport.php";
    }
</script>
  <title>AGI</title>
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


<nav class="navbar navbar-xs " style=" background-color: #f8f8f8;" id="headerr">
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
<div id="head">
<center>

<h2 style="color:#1b68ae;">Leave Cancellation </h2>
<h4>Enter Username </h4>
<form method="post" name="Select" action="">


<input type="text" name="usern" id="uname" >



<br><br>
<input type="submit" name="sub" value="submit">
</form>
<div style="margin-right: -30px; margin-top: -10px;" id="help">

<button type="button"  data-toggle="modal" data-target="#myModal">Faculty Lookup</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Faculty Username and Name</h4>
      </div>
      <div class="modal-body">

<?

 


$sql1 = "SELECT * from logins ";




$result = mysqli_query($db,$sql1);



echo "

<center>
<table class='table table-bordered' >
  <tr><th>S.No</th>

<th><center>Name</center></th>
<th><center>Username</center></th>

     </tr></center> ";



$count=1;
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{


$name = $row['name'];
$usern = $row['username'];


 


  echo "  
	<center>	
      <tr>
<td> <center>$count</center></th>

<td> $name</td>
<td> $usern</td>

  
     </tr>
     </center> 
";
$count++;

}

echo"</table> </div>";



?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<hr>

</center>
</div>

</body>

<script>

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function printInfo(ele) {
    var openWindow = window.open("", "title", "attributes");
    openWindow.document.write(ele.previousSibling.innerHTML);
    openWindow.document.close();
    openWindow.focus();
    openWindow.print();
    openWindow.close();
}
</script>


<div id="printing">











<div class="nav navbar-fixed" id="foot">
&nbsp&nbsp&copy; Anurag Group of Institutions, 2017 
<div id="inside_foot">
<strong>Courtesy</strong>: Dept. of Information Technology&nbsp&nbsp
</div>
</div>

</html>
<?
if($_SERVER["REQUEST_METHOD"] == "POST") 
{



if($_POST['sub']){

$usern = $_POST['usern'];




 
$sql2="Select * from status where `username`='$usern'";
$result2= mysqli_query($db,$sql2);

$rwno = mysqli_num_rows($result2);

if($rwno != 0)
{

echo "
<div class='well'>
<div class='table-responsive'> 
<center><table class='table-condensed' border='1'>


  <tr><th>S.NO</th>
<th><center>Name</center></th>
<!--<th><center>Email</center></th>-->
<th>Type of Leave</th>
  <th>From Date</th>
<th>To Date</th>
      <th>Number of Days</th>
      <th> Purpose</th>
      
	<th>Work Load Adjustment:</th> 
<th>Status</th>

<th> Cancel Leave </th>

     </tr></center>
";
}
 echo '<form method ="post" action="">';
$count=1;
while($row = mysqli_fetch_array($result2, MYSQL_ASSOC))
{

	$fdate= $row['fdate'];
  $tdate = $row['tdate'];
$leave_type = $row['leave_type'];
$name1=$row['name'];
$email1=$row['username'];

  $purpose = $row['purpose'];
  $status = $row['status'];
  $days = $row['days'];
$id=$row['id'];


$workload = $row['workload'];
$date3 = date("d-m-Y", strtotime($fdate));
$date4 = date("d-m-Y", strtotime($tdate));
 


  
  echo "  
	<center>	
      <tr>
<td> <center>$count</center></th>

<td> <center><input type='hidden' name='name_l$count' value='$id'/>$name1</center></td>
<td><center> $leave_type</center></td>
<td><center> $date3</center></td>
<td><center> $date4</center></td>
      <td><center> $days </center></td>
     <td><center> $purpose </center> </td>
      <td><center> $workload </center></td>
      <td><center> $status </center></td>
	   <td><center><input type ='radio' name='status$count' value ='can'/></center></td>
    </tr>
    </center> 
";
$count++;

}
echo"<input type='hidden' name='count' value ='$count'/>";
echo" </table> </div></div>";
echo"<center><input type ='submit' name='submit' style='background-color:transparent' value='Submit' ></center></form><br><br> ";

}



    

else if($_POST['submit']){
    
$n=$_POST['count'];

for ($i = 1; $i < $n; $i++)
{
$name_l="name_l$i";
$statu="status$i";
$namef=$_POST[$name_l];
$fstatus=$_POST[$statu];
$remarks=$_POST[$remark];
	

if($fstatus == "can")
{
	
	$query4 ="DELETE FROM `status` WHERE `id` = '$namef'";
$result4 = mysqli_query($db,$query4);
if($result4)
{
	echo "<center><strong><h4>Successfully cancelled leave</h4></strong></center>";
}

}

	
}




}
}

?>