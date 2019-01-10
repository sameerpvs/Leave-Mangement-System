<?php
include('session.php');
if($desg != "admin")
{
header("location:index.php");

}

$red_date= date(Ymd);
 if($_SERVER["REQUEST_METHOD"] == "POST") 
{

if($_POST['sub'])
{

$dept16=$_POST['dept16'];


}

else if($_POST['submit'])
{
$tdate=$_POST['tdate'];
$fdate=$_POST['fdate'];
$name2=$_POST['name'];
$admin_remarks=$_POST['purpose'];
$leave_type=$_POST['leave_type'];
$status=$_POST['status'];
$days=$_POST['days'];
$workload="none";
$ccl_days=$_POST['ccl_days'];
$wl=$_POST['wl'];



$sql1 = "SELECT * 
FROM  `logins` 
WHERE  `name` LIKE  '$name2' ";
$result1=mysqli_query($db,$sql1);
while($row = mysqli_fetch_array($result1, MYSQL_ASSOC))
{
$un = $row['username'];
$dept5=$row['dept'];

}
if($leave_type == 'on duty')
{
$oddays= $days;
}
else
{
$oddays=0;
}
if($leave_type == 'ccl')
{
$ccl= $days;
}
else
{
$ccl=0;
}
 if($leave_type == 'special leave')
{
$sl= $days;
}
else
{
$sl=0;
}
 if($leave_type == 'medical leave')
{
$ml= $days;
}
else
{
$ml=0;

}
$cl1=0;
$cl2=0;
$cl3=0;
 if($leave_type == "casual leave")
{
$cl3= $days;
}




 if($leave_type == "half day")
{
$cl1= 0.5;
$days=0.5;
}

 if($leave_type == "late deduction")
{
$cl2= $days;
}

 if($leave_type == 'maternity leave')
{
$mml= $days;
}
else
{
$smml=0;
}
$cl= $cl1 + $cl2 + $cl3;

if($wl==no)
{

$date1 = date("Y-m-d", strtotime($fdate));
$date2 = date("Y-m-d", strtotime($tdate));
$sql =  "
 INSERT INTO `u418263775_test`.`status` (`name`, `dept`, `fdate`, `tdate`, `purpose`, `mobile`, `days`, `status`, `leave_type`, `username`, `id`, `workload`, `hod_remarks`, `oddays`, `admin_remarks`,`cl`, `ccl`, `sl`, `hod`, `admin`, `f1`, `d1`, `f2`, `d2`, `f3`, `d3`, `f4`, `d4`, `no`, `fno`, `ml`, `mml`,`a1`,`a2`,`a3`,`a4`,`date`)";

$sql .="VALUES (
'$name2',    '$dept5',  '$date1',  '$date2',  'NULL',  'NULL',  '$days',  '$status',  '$leave_type','$un',NULL, '$workload',NULL,'$oddays','$admin_remarks','$cl','$ccl','$sl',NULL,NULL,'NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','$ml','$mml','0','0','0','0','$red_date');";

$result = mysqli_query($db, $sql);
$msg="Successfully Updated";

}
if($wl==yes)
{

$sql2="UPDATE  `u418263775_test`.`logins` SET  `ccl` =  '$ccl_days' WHERE  `logins`.`username` =  '$un'";
$result2  = mysqli_query($db, $sql2);
$msg="Successfully Updated";
}


mysqli_close($db);    
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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
input.radio { display: inline; }
#form
{
margin-top:-100px;
margin-left: -60px;
}
.table
{
margin-top:-10px !important;
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
    width: 550px;
    margin-top: 20px;
    border: 5px solid !important ;
    border-color: grey !important ;
    margin-left: -30px;
border-top:none !important;
}
.well2{
    width: 550px;
    border: 5px solid !important ;
    border-color: grey !important ;
    margin-left: -90px;
    margin-top: -20px;
	border-bottom:none !important;
background-color: #f8f8f8;
}
label{display:inline-block;}
input{display:block;}
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
<script>https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js</script>
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

<center>



<div style=" width:550px; color: #1B68AE; left:0;"><br><br><h3 id="head" style="margin-left: -20px; margin-top: -30px;"><strong><center>Admin Control Panel</center></strong> </h3><hr><h5 style="color:blue;"><br><?  echo $msg;?></h5></div>

<form name="Apply" method="post" action=" ">
<div class="well2">

<div class="table-responsive">
<table class="table-condensed">
<tr>
<td>
 <strong>Select Department *</strong><select name="dept16">
<option value=""></option>
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








</select>
</td>

 <div class="form-group" id="submit">
<td colspan="2">
  <center>
  <input type ="submit" name="sub"  style="background-color:transparent"  value="Select"> </center></td></tr>
</table>

</form>
</div></div></div>
</center>

<br><br><br>
<center>
<div id="form">
<form name="Apply" method="post" action=" ">
<div class="well">
<div class="table-responsive">
<table class="table-condensed">
<tr>


<td>
<Strong>Name &nbsp&nbsp</strong> 
<strong><select name="name" id="name" style="width: 96%;">
 <option value="" selected/>
<?php
$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$dis = "SELECT name FROM `logins` where `dept` like '%$dept16%' order by name ";
$resultt = mysqli_query($con, $dis);
while($roww = mysqli_fetch_array($resultt, MYSQL_ASSOC))
{
$namee = $roww['name'];
echo "<option value=\"$namee\" required>" . $roww['name'] . "</option>";
}
?>
</select></strong>
</td>
<td><label><Strong>Department &nbsp&nbsp <input type="text" value="<? echo $dept16;?>" disabled /></strong></label></td>
</tr>
<tr>
<td>
<label>From Date <input type="text" id="fdate" name="fdate" required>
</label>
</td>
<td>
&nbsp&nbsp <label>To Date <input type="text" id="theDate" name="tdate" required></label><br></td></tr>
<tr>
<td>
<div class="form-group">
 <label for="workload">Add CCL : <input type="radio" class="radio"  name="wl" id="yes" onclick="check()" value="yes" >Yes <input type="radio" class="radio" name="wl" id="no" onclick="recheck()" value="no" checked>No</label>
</label></td></div>
<td>&nbsp&nbsp<div class="form-group">
<label for="ccl days"> CCL Days :</label><input type="text" name="ccl_days" id="l1" disabled>
<input type="hidden" value="Accepted" name="status"/>
 <div class="form-group" id="submit">
</td></tr>
<tr>
<tr>
<td>
<label>Type of Leave <select name="leave_type" id="l2" class="form-control">
  <option value="casual leave" >Casual Leave</option>
  <option value="half day" >Half Day </option>
  <option value="late deduction">Late Deduction</option>
  <option value="on duty">On Duty </option>
<option value="ccl">CCL </option>
<option value="special leave">Special Leave </option>
 <option value="medical leave">Medical Leave </option>
 <option value="maternity leave">Maternity Leave </option>
</select>
</label>
</td>
<td>
&nbsp&nbsp<label>Days <input type="text" id="days" name="days"  ></label>

</td>
</tr>

<td colspan="2">
<center>
<label>Admin Remarks<textarea class="form-control" name="purpose" required ></textarea></center>
</label></td>

</tr>

<tr><td colspan="2">
  <center>
  <input type ="submit"  name="submit" style="background-color:transparent" onclick="return confirm('Are you sure, you want to submit?')" value="Submit"> </center></td></tr>
</table>
</div> 
</form>
<center>
</div>
</div>
</div>
</div>

</div>
<br><br>
<div id="foot">
&nbsp&nbsp&copy; Anurag Group of Institutions, 2017 
<div id="inside_foot">
<strong>Courtesy</strong>: Department of Information Technology 
</div>

</div>
 </center>
 </div>
 </div>
 </div>
</body>

    

<script language="JavaScript">
var frmvalidator  = new Validator("Apply");

frmvalidator.addValidation("fdate","req","Please provide from date");

frmvalidator.addValidation("workload","req","Please specify to whom the workload is adjusted to");
frmvalidator.addValidation("purpose","req","Please specify the reason");
frmvalidator.addValidation("days","req","Please enter number of days");
frmvalidator.addValidation("mobile","req","Please enter your mobile number");

</script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#fdate" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#theDate" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })




      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
  <script>
function check()
{


document.getElementById('l1').disabled=false;
document.getElementById('l2').disabled=true;
document.getElementById('days').disabled=true;
}
function recheck()
{

document.getElementById('l1').disabled=true;
document.getElementById('l2').disabled=false;
document.getElementById('days').disabled=false;

}

function test()
{
document.getElementById("day").value = "0.5";
document.getElementById("days").value = "0.5";
}
</script>
</html>
