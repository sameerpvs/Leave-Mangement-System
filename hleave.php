<?php
include('session.php');
if($desg != "hod")
{
header("location:index.php");

}
 if($_SERVER["REQUEST_METHOD"] == "POST") 
{

$tdate=$_POST['tdate'];
$fdate=$_POST['fdate'];
$mobile=$_POST['mobile'];
$purpose=$_POST['purpose'];
$leave_type=$_POST['leave_type'];
$status=$_POST['status'];
$days=$_POST['days'];
$workload="pending";
$d1a=$_POST['d1a'];
$d1b=$_POST['d1b'];
$d1c=$_POST['d1c'];
$f1=$_POST['f1'];
$d2a=$_POST['d2a'];
$d2b=$_POST['d2b'];
$d2c=$_POST['d2c'];
$f2=$_POST['f2'];
$d3a=$_POST['d3a'];
$d3b=$_POST['d3b'];
$d3c=$_POST['d3c'];
$f3=$_POST['f3'];
$d4a=$_POST['d4a'];
$d4b=$_POST['d4b'];
$d4c=$_POST['d4c'];
$f4=$_POST['f4'];
$wl=$_POST['wl'];

$ToEmail = $dept_email;  
$red_date= date(Ymd);
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
 if($leave_type == 'Casual Leave')
{
$cl= $days;
}
else
{
$cl=0;
}
 if($leave_type == 'maternity leave')
{
$mml= $days;
}
else
{
$smml=0;
}
$no=0;
$d1;
$d2;
$d3;
$d4;
if($f1 !=="")
{
$no++;
$d1= "($d1a , $d1b , $d1c)";
}
if($f2 !=="")
{
$no++;
$d2= "($d2a , $d2b  , $d2c)";
}
if($f3 !=="")
{
$no++;

$d3= "($d3a , $d3b , $d3c)";
}
if($f4 !=="")
{
$no++;

$d4= "($d4a , $d4b , $d4c)";
}
$k = 0;
$j = 0;
if($mml >"90")
{
	
	$error= "Sorry!You can not apply Maternity leave for more than 90 days";
	$k = 1;
}
if($ccl >"2")
{
	$j = 1;
	$error= "Sorry! You can not apply CCL for More than 2 consecutive days";
	

}

$sql1 = "SELECT * 
FROM  `logins` 
WHERE  `username` LIKE  '$email' ";
$result1=mysqli_query($db,$sql1);
while($row = mysqli_fetch_array($result1, MYSQL_ASSOC))
{
$cccl = $row['ccl'];

}
$y=0;
if($ccl > $cccl)
{
$error= "Sorry! You can not apply CCL as you dont have sufficient CCL balance";
$y=2;
}


$fno=0;




if($k==0 && $j==0 && $y==0)
{

$st = "Pending with HR";

$no=0;
$status= $st ;
$workload="N/A";

$date1 = date("Y-m-d", strtotime($fdate));
$date2 = date("Y-m-d", strtotime($tdate));
$sql =  "
 INSERT INTO `u418263775_test`.`status` (`name`, `dept`, `fdate`, `tdate`, `purpose`, `mobile`, `days`, `status`, `leave_type`, `username`, `id`, `workload`, `hod_remarks`, `oddays`, `admin_remarks`,`cl`, `ccl`, `sl`, `hod`, `admin`, `f1`, `d1`, `f2`, `d2`, `f3`, `d3`, `f4`, `d4`, `no`, `fno`, `ml`, `mml`,`a1`,`a2`,`a3`,`a4`,`date`)";

$sql .="VALUES (
'$name',    '$dept',  '$date1',  '$date2',  '$purpose',  '$mobile',  '$days',  '$status',  '$leave_type','$email',NULL, '$workload',NULL,'$oddays',NULL,'$cl','$ccl','$sl',NULL,NULL,'$f1','$d1','$f2','$d2','$f3','$d3','$f4','$d4','$no','$fno','$ml','$mml','0','0','0','0','$red_date');";

$result = mysqli_query($db, $sql);

header("Location:hthankyou.php");

}
else{
	
}
mysqli_close($db);    
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
    margin-top: -30px;
    border: 5px solid !important ;
    border-color: grey !important ;
    margin-left: -10px;
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

<span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

<div class="container-fluid" id="form-container">
<div class="row">
<div class="col-xs-offset-4 col-xs-4 ">
<center>
<div id="form">
<form name="Apply" method="post" action=" ">
<div style=" width:550px; color: #1B68AE; left:0;"><br><br><h3 id="head"><strong><center>Leave Application</center></strong> </h3><hr><h5 style="color:red;"><?  echo $error;?></h5></div>
<div class="well">
<div class="table-responsive">
<table class="table-condensed">
<tr>
<td>
 <strong>Name:</strong> <? echo $name ;?> 
</td>
<!--<strong>Email: </strong><? echo $email ;?> &nbsp&nbsp &nbsp&nbsp-->
<td>
<strong>&nbsp&nbsp Department: </strong><? echo $dept ;?><br>
</td>
</tr>
<tr>
<td>
<label>From Date <input type="text" id="fdate" onclick="splcheck()" name="fdate" readonly="readonly" required>
</label>
</td>
<td>
&nbsp&nbsp <label>To Date <input type="text" id="theDate" name="tdate" required readonly="readonly" disabled ></label><br></td></tr>
<tr>
<td>
<label>Type of Leave <select name="leave_type" class="form-control">
  <option value="Casual Leave" >Casual Leave</option>
  <option value="on duty">On Duty </option>
<option value="ccl">CCL </option>
<option value="special leave">Special Leave </option>
 <option value="medical leave">Medical Leave </option>
 <option value="maternity leave">Maternity Leave </option>
</select>
</label>
</td>
<td>
&nbsp&nbsp<label>Days <input type="text" id="day" name="day" disabled ></label>
&nbsp&nbsp<label> <input type="hidden" id="days" name="days" ></label>
</td>
</tr>
<tr>
<td>
<label>Purpose <input type="text" class="form-control" name="purpose" required >
</label></td>
<td>
&nbsp&nbsp<label>Emergency Contact No. <input type="number" class="form-control" name="mobile" maxlength="10" value="<? echo $phone;?>" ></label>
</td>
</tr>

</div>
</div>
<input type="hidden" value="Pending with HR" name="status"/>
 <div class="form-group" id="submit">
</td></tr>
<tr><td colspan="2">
  <center>
  <input type ="submit"  style="background-color:transparent" onclick="return confirm('Are you sure, you want to submit?')" value="Submit"> </center></td></tr>
</table>
</div> 
</form>
<center>
</div>
</div>
</div>
</div>
</div>
<div id="foot">
&nbsp&nbsp&copy; Anurag Group of Institutions, 2017 
<div id="inside_foot">
<strong>Courtesy</strong>: Department of Information Technology 
</div>

</div>
 
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
			$('#theDate').on('change', function(){  

		 	var d1 = new Date($('#fdate').val());
			var d2 = new Date ($('#theDate').val());
			var x = (d2.getTime()-d1.getTime())/(1000*60*60*24); 
			$('#day').val(x+1);
$('#days').val(x+1);
  
		 });
		 
		 });
		
	</script>


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
  $( function() {
$( "#l1" ).datepicker({ dateFormat: "dd/mm/y", });
$( "#l5" ).datepicker({ dateFormat: "dd/mm/y", });
$( "#l9" ).datepicker({ dateFormat: "dd/mm/y", });
$( "#l13" ).datepicker({ dateFormat: "dd/mm/y", });
  } );
  </script>
  <script>
  function splcheck()
{
document.getElementById('theDate').disabled=false;	
}
function check()
{


document.getElementById('l1').disabled=false;
document.getElementById('l2').disabled=false;
document.getElementById('l3').disabled=false;
document.getElementById('l4').disabled=false;

document.getElementById('l5').disabled=false;
document.getElementById('l6').disabled=false;
document.getElementById('l7').disabled=false;
document.getElementById('l8').disabled=false;

document.getElementById('l9').disabled=false;
document.getElementById('l10').disabled=false;
document.getElementById('l11').disabled=false;
document.getElementById('l12').disabled=false;

document.getElementById('l13').disabled=false;
document.getElementById('l14').disabled=false;
document.getElementById('l15').disabled=false;
document.getElementById('l16').disabled=false;

}
function recheck()
{

document.getElementById('l1').disabled=true;
document.getElementById('l2').disabled=true;
document.getElementById('l3').disabled=true;
document.getElementById('l4').disabled=true;

document.getElementById('l5').disabled=true;
document.getElementById('l6').disabled=true;
document.getElementById('l7').disabled=true;
document.getElementById('l8').disabled=true;

document.getElementById('l9').disabled=true;
document.getElementById('l10').disabled=true;
document.getElementById('l11').disabled=true;
document.getElementById('l12').disabled=true;

document.getElementById('l13').disabled=true;
document.getElementById('l14').disabled=true;
document.getElementById('l15').disabled=true;
document.getElementById('l16').disabled=true;

}
</script>
</html>
