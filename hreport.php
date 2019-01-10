<?php
include('session.php');
if($desg != "hod")
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
<script>
$("#myModal").hover(function(){
    $("#msg_div").hide();
    $("#msg_div").show();
});
</script>
<script>
function print1(){
    document.getElementById("headerr").style.display="none";
    document.getElementById("mySidenav").style.display="none";
    document.getElementById("foot").style.display="none";
    document.getElementById("head").style.display="none";
    document.getElementById("print").style.display="none";
    document.getElementById("menu").style.display="none";
    window.print();
    window.location = "hreport.php";
    }
</script>
<body>
</head>

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

<div nav navbar-fixed-bottom id="foot">
&nbsp&nbsp&copy; Anurag Group of Institutions, 2017 
<div id="inside_foot">
<strong>Courtesy</strong>: Dept. of Information Technology&nbsp&nbsp
</div>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<a href="hod.php">Home</a> 
<a href="hworkload.php">View Workload</a>  
<a href="hpending.php">Pending Applications</a>
<a href="hleave.php">Apply leave</a>
  <a href="hreport.php">Report</a>
  <a href="hlr.php">Leave Report</a>
  <a href="hcancel.php">Leave Cancellation</a>
  <a href="hupdate.php">View/Update Profile</a>
  <a href="hchange.php">Change Password</a>
</div>
<div id="menu">
<span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Menu</span></div>

<div id="head">

<center>

<h3 style="color: #1b68ae;">Monthly Report </h3>
<h4>To view Leave Report, select the Month or User Name </h4>
<form method="post" name="Select" action="">
<input type="radio" name="type"  value="month" id="month1" checked="checked" onclick="check()" style="margin-left: -140px;">Month
<input type ="radio" name="type" value="uname" id="uname1"  onclick="recheck()" style="margin-left: 160px;">Username<br>
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


</select> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" name="usern" id="uname" disabled>&nbsp&nbsp&nbsp&nbsp<button type="button"  data-toggle="modal" data-target="#myModal">Faculty Lookup</button>

<input type="hidden" name ="dept" value ="<? echo $dept; ?>" />
</select><br><br>
<input type="submit" value="Submit" style="margin-left: -190px;">
</form>
<div style="margin-right: -30px; margin-top: -10px;" id="help">



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="modal-content" style="width: 90%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Faculty List of <? echo $dept ;?> Dept. </h4>
      </div>
      <div class="modal-body">
<?

 



$sql1 = "SELECT * from logins where dept = '$dept'";




$result = mysqli_query($db,$sql1);




?>

<center>
<table border='1' cellpadding="5px">
  <tr><th>S.NO</th>
<th><center>Name</center></th>
<th><center>Username</center></th> 

     </tr></center> 


<?
$count=1;
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{


$name = $row['name'];
$username = $row['username'];

 


  echo "  
	<center>	
      <tr>
<td> <center>$count</center></th>
<td> $name</th>
<td>$username</td>

  
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
</center>
</div>
<hr>
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
<script>
function check()
{


document.getElementById('uname').disabled=true;
document.getElementById('month').disabled=false;
document.getElementById('year').disabled=false;
}
function recheck()
{
document.getElementById('uname').disabled=false;
document.getElementById('month').disabled=true;
document.getElementById('year').disabled=true;
}
</script>
<script>
var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day ;

var today = year + "-" + month + "-" + day;       
document.getElementById("theDate").value = today;
</script>
<div id="printing">

<?
if( $_POST ){


$year =$_POST['year'];
$month = $_POST['month'];
$type = $_POST['type'];
$usern =$_POST['usern'];
$dept1 =$_POST['dept'];

if ($type == "month")
{
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

	$sql1 = "SELECT * from logins"; 
         



	$result = mysqli_query($db,$sql1);
        $rwno = mysqli_num_rows($result);
		if($rwno != 0)
		{
		echo "

		<center>
		<h3> Leave report as of $mon $year </h3>
		<table border='1' cellpadding='10px'>
		<tr><th>&nbsp&nbspS.No&nbsp&nbsp&nbsp</th>
		<th>&nbsp&nbsp&nbsp&nbsp&nbspName&nbsp&nbsp&nbsp&nbsp&nbsp</th>
		<th>&nbsp&nbsp&nbsp&nbsp&nbspCL&nbsp&nbsp&nbsp&nbsp&nbsp</th>
		<th>&nbsp&nbsp&nbsp&nbsp&nbspOD&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th>&nbsp&nbsp&nbsp&nbsp&nbspCCL&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th>&nbsp&nbsp&nbsp&nbsp&nbspSL&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th>&nbsp&nbsp&nbsp&nbsp&nbspML&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                <th>&nbsp&nbspMAL&nbsp&nbsp</th>
		<th>&nbsp&nbsp&nbsp&nbsp&nbspLeave Balance&nbsp&nbsp&nbsp&nbsp&nbsp</th> 
		</tr></center> ";

		}

		$count=1;

		while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
		{


		$name=$row['name'];
		$usern = $row['username'];
		$dept = $row['dept'];

	
        $sql2 = "SELECT sum(cl) as cl, sum(oddays) as ODs, sum(ccl) as CCLs, sum(ml) as MLs , sum(mml) as MMLs, sum(sl) as SL from status 
                where username like'%$usern%' and status =  'accepted' and MONTH( fdate ) <= '$month' AND YEAR( fdate )='$year'"; 
        $result1 = mysqli_query($db,$sql2);
		
while($roww = mysqli_fetch_array($result1, MYSQL_ASSOC))
		{
                     $cl = $roww['cl'];
                     $od = $roww['ODs'];
                     $ccl = $roww['CCls'];
                     $sl = $roww['SL'];
                     $ml = $roww['MLs'];
                     $mml = $roww['MMls'];  
                     if ($cl == 0)
                     {
                         $leave_bal = $month;
                         $cl = 0;
                     }
                     else if ($cl != 0) {
                         $leave_bal = $month - $cl;
                     }
                     if ($od == 0)
                     {
                         $od = 0;
                     }
                     if ($ccl == 0)
                     {
                         $ccl = 0;
                     }
                     if ($ml == 0)
                     {
                         $ml = 0;
                     }
                     if ($mml == 0)
                     {
                         $mml = 0;
                     }
                     if ($sl == 0)
                     {
                         $sl = 0;
                     }
			if($dept == "$dept1")
			{

				echo "  
						<center>	
						<tr>
						<td> <center>$count</center></th>
						<td>&nbsp$name</th>
						<td><center> $cl</center></td>
						<td><center> $od</center></td>
                                                <td><center>$ccl </center></td>
                                                <td><center>$sl </center></td>
                                                <td><center>$ml </center></td>
                                                <td><center>$mml </center></td>
                                                <td><center>$leave_bal </center></td>
						</tr>
						</center> 
					";
				$count++;
			}
			
		    }
   
	
}
echo '</table></div>';
echo'<a href="#" onclick="printInfo(this)" style="margin-left: 650px;">Print</a>';
echo'<br><br><br><br>';
}
else if($type =="uname")
{

if($usern=="")
{

$msg="Please enter username";
}

else
{
$sql = "SELECT * FROM  `status` WHERE  `username` LIKE  '$usern' and `dept` LIKE '$dept1'";





$result = mysqli_query($db,$sql);
$rwno = mysqli_num_rows($result);

if($rwno != 0)
{
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{
$nameh = $row['name'];
}

echo "

<center>
<h3>  Leave report of $nameh </h3>
<table border='1' cellpadding='20px'>
  <tr><th>S.No</th>
<th>DoA</th>
 <th>From Date</th>
<th>To date </th>
<th> Type of Leave</th>
<th>Purpose</th>
<th> No.of Days</th>
<th>Status</th> 

     </tr></center> ";
}
else
{
?>
<div style="color: red;">
<?
  echo "<center><h4>No records for $usern.</h4></center>";
  
}

?>
</div>
<?
$sql8 = "SELECT * FROM  `status` WHERE  `username` LIKE  '$usern' and `dept` LIKE '$dept1'";




$result8 = mysqli_query($db,$sql8);

$count=1;
while($row = mysqli_fetch_array($result8, MYSQL_ASSOC))
{


$name = $row['name'];
$days = $row['days'];
$fdate = $row['fdate'];
$tdate = $row['tdate'];
$purpose = $row['purpose'];
$status = $row['status'];
$days = $row['days'];
$do=$row['date'];
$leave_type = $row['leave_type'];
$date3 = date("d-m-Y", strtotime($fdate));
$date4 = date("d-m-Y", strtotime($tdate));
 if($do!="")
{
$doa = date("d-m-Y", strtotime($do));

}

 
  echo "  
	<center>	
      <tr>
<td> <center>$count</center></td>
<td> $doa</td>
<td>$date3</th>
<td> $date4</td>
<td>$leave_type </td>
<td> $purpose</td>
<td> $days</td>
<td> status</td>  
     </tr>
     </center> 
";
$count++;
}
$sql5 = "SELECT * FROM  `logins` WHERE  `username` LIKE  '$usern' and `dept` LIKE '$dept1'";
		$result5 = mysqli_query($db,$sql5);
		while($row = mysqli_fetch_array($result5, MYSQL_ASSOC))
		{
			$leavesleft = $row['leaves_left'];
			$odday = $row['onduty'];
$names =$row['name'];
		
			if($odday=="")
			{
				$odday="0";
			}
	        	echo"</table> ";


		}
	
	
}
echo"</table> </div>";
echo "<center><h4> $msg </h4></center> ";
echo"<br><br><center><input type='button' onclick='print1()' id='print' value='print'></center><br><br><br>"; 

}



}


?>


</html>
