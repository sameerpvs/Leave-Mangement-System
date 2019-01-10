<?php
include('session.php');
if($desg != "staff")
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
$b1=$_POST['b1'];
$b2=$_POST['b2'];
$b3=$_POST['b3'];
$b4=$_POST['b4'];

$fstatus=$_POST[$statu];

$sql1 = "SELECT * 
FROM  `status` 
WHERE  `id` = $namef
";
$result1 = mysqli_query($db,$sql1);
while($row = mysqli_fetch_array($result1,MYSQL_ASSOC))
{
$no=$row['no'];
$fno=$row['fno'];

}





if($fstatus=="")
{
$fstatus="0";
}

if($fstatus=="1")
{
if($b1 !== "0")
{
$b1="1";
$fno++;
}
if($b2 !== "0")
{
$b2="1";
$fno++;
}
if($b3 !== "0")
{
$b3="1";
$fno++;
}
if($b4 !== "0")
{
$b4="1";
$fno++;
}
$query3 ="UPDATE  `u418263775_test`.`status` SET  `a1` =  '$b1',
`a2` =  '$b2',
`a3` =  '$b3',
`a4` =  '$b4' , `fno` = '$fno' WHERE  `status`.`id` ='$namef'";

$result3 = mysqli_query($db,$query3);
}
 if($fstatus=="2")
{
if($b1 !== "0")
{
$b1="2";
}
if($b2 !== "0")
{
$b2="2";
}
if($b3 !== "0")
{
$b3="2";
}
if($b4 !== "0")
{
$b4="2";
}
$query2 ="UPDATE  `u418263775_test`.`status` SET  `a1` =  '$b1',
`a2` =  '$b2',
`a3` =  '$b3',
`a4` =  '$b4' WHERE  `status`.`id` ='$namef'";

$result2 = mysqli_query($db,$query2);
}
$query7="Select * from `status` where `status`.`id` = $namef ";
$result7=mysqli_query($db,$query7);
while($row = mysqli_fetch_array($result7,MYSQL_ASSOC)){
$z1=$row['a1'];
$z2=$row['a2'];
$z3=$row['a3'];
$z4=$row['a4'];

}
if($z1==2 || $z2==2 || $z3==2 || $z4==3)
{
$query6 ="UPDATE  `u418263775_test`.`status` SET  `status` =  'Workload Rejected' WHERE  `status`.`id` = $namef";

$result6 = mysqli_query($db,$query6);



}
if($no == $fno)
{
$query4 ="UPDATE  `u418263775_test`.`status` SET  `workload` =  'accepted' ,`status` =  'Pending with HOD' WHERE  `status`.`id` = $namef";

$result4 = mysqli_query($db,$query4);
$query5 ="Select * from status  WHERE  `status`.`id` = $namef";
$result5 = mysqli_query($db,$query5);
while($row = mysqli_fetch_array($result5,MYSQL_ASSOC))
{
$ffdate=$row['fdate'];
$tfdate=$row['tdate'];
$days5=$row['days'];
$email5=$row['username'];
$name5=$row['name'];
$dept5=$row['dept'];

}

if($dept5 == "Mechanical")
{
$ToEmail="hodmech@cvsr.ac.in";

}
else if($dept5 == "H&S")
{
$ToEmail="hodhs@cvsr.ac.in";

}
else if($dept5 == "Pharmacy")
{
$ToEmail="vasudhapharmacy@cvsr.ac.in";

}

else {
 $ToEmail ="hod$dept5@cvsr.ac.in";
}

if (mysqli_query($db, $query5)) {
$date3 = date("Y-m-d", strtotime($ffdate));
$date4 = date("Y-m-d", strtotime($tfdate));
 
$EmailSubject ="Leave Application of ".$name5." ";
$MESSAGE_BODY ="<html>Dear Head Of Department,<br>Mr/Ms/Dr/Prof. ".$name5." has submitted leave application from ".$date3." for ".$days5." day/s. <br>Click <a href='http://agilms.96.lt/'>here</a> to approve or reject the leave application . <br><br>With Regard<br>Leave Management System,AGI </html> ";

$mailheader .= "From: agilms@anurag.edu.in" . "\r\n"  ;
$mailheader .= "Reply-To:$email5" . "\r\n" ; 
$mailheader .= "Cc:$email5" . "\r\n";
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);






} else {
    $msg1= "Error: " . $sql . "<br>" . mysqli_error($conn);
echo $msg1;
}


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
    width: 850px;
    border: 5px solid #1B68AE !important;
}
td{
     border-spacing: 20px;
    //border-collapse: separate;
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
  <a href="faculty.php">Home</a>
  <a href="workload.php">View Workload</a>
<a href="leave.php">Apply leave</a>
  <a href="report.php">Leave Report</a>
  <a href="cancel.php">Leave Cancellation</a>
  <a href="update.php">View/Update Profile</a>
  <a href="change.php">Change Password</a>


</div>

<span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
<div id="main">
<center><br><br><h3 style="color: #1b68ae;">Pending Workload Adjustments </h3><br></center>
<?


$sql= "SELECT * 
FROM  `status` 
WHERE  `workload` LIKE  'pending'
AND  ((`f1` LIKE  '%$name%'
AND  `a1` =0) or (`f2` LIKE  '%$name%'
AND  `a2` =0) or (`f3` LIKE  '%$name%'
AND  `a3` =0) or (`f4` LIKE  '%$name%'
AND  `a4` =0))";
$result = mysqli_query($db,$sql);
$rwno = mysqli_num_rows($result);

if($rwno != 0)
{

echo "
<center>
<div class='well'>
<div class='table-responsive'> 
<center><table class='table-condensed' border='1'>

  <tr><th>S.NO</th>
 
<th><center>Name</center></th>
  <th>From Date</th>
<th>To Date</th>
      <th>Details(Date,Department,Period)</th>
      
<th> Approve </th>
<th> Reject </th> 
     </tr></center>
";
}
 echo '<form method ="post" action="">';
$count=1;
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{

	$fdate= $row['fdate'];
  $tdate = $row['tdate'];
$n =$row['name'];
$f1=$row['f1'];
  $f2 = $row['f2'];
  $f3 = $row['f3'];
  $f4 = $row['f4'];
$a1= $row[a1];
$a2= $row[a2];
$a3= $row[a3];
$a4= $row[a4];
$b1=0;
$b2=0;
$b3=0;
$b4=0;

	if($f1 == "$name" && $a1=="0")
{  
	  $d1=$row['d1'];
$b1=1;

 }
   if($f2 == "$name" && $a2=="0")
  {
	  
	  $d2=$row['d2'];
$b2=1;
  }
   if($f3 == "$name" && $a3=="0")
  {
	  
	  $d3=$row['d3'];
$b3=1;
  }
   if($f4 == "$name" && $a4=="0")
  {
	  
	  $d3=$row['d4'];
$b4=1;
  }

$date3 = date("d-m-Y", strtotime($fdate));
$date4 = date("d-m-Y", strtotime($tdate));
 $id=$row['id'];


  
  echo "  
	<center>	
      <tr>


<td> <center>$count</center></th>

<td> <center>$n</center></th>

<td><center> $date3</center></td>
<td><center> $date4</center></td>
      <td><center> $d1  $d2 $d3 $d4</center></td>
  

<td><center><input type ='radio' name='status$count' value ='1'/></center></td>
<td><center><input type ='radio' name='status$count' value ='2'/></center></td>     </tr>
    </center> 
 <center><input type='hidden' name='b1' value='$b1'/></center>
 <center><input type='hidden' name='b2' value='$b2'/></center>
 <center><input type='hidden' name='b3' value='$b3'/></center>
 <center><input type='hidden' name='b4' value='$b4'/></center>
<center><input type='hidden' name='name_l$count' value='$id'/></center>
";
$count++;

}
echo"<input type='hidden' name='count' value ='$count'/>";
echo" </table></center> </div></div>";

if($count < 2)
{
echo "<center><h3>You don't have any Pending Workload Adjustments </h3><center>";
}
else { echo"<center><input type ='submit'  style='background-color:transparent' value='Submit' ></center> ";}

?>
</div>

</body>
</html>




