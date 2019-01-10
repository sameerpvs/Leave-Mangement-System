<?php
include('session.php');
include('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST") 
{
$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$tdate=$_POST['tdate'];
$fdate=$_POST['fdate'];
$mobile=$_POST['mobile'];
$purpose=$_POST['purpose'];
$leave_type=$_POST['leave_type'];
$status=$_POST['status'];
$days=$_POST['days'];
$workload=$_POST['workload'];
$ToEmail = $dept_email;  
$date1 = date("Y-m-d", strtotime($fdate));
$date2 = date("Y-m-d", strtotime($tdate));
$sql =  "
 INSERT INTO  `test_it`.`status` (`name` ,`username` ,`dept` ,`fdate` ,`tdate` ,`purpose` ,`mobile` ,`days` ,`status` ,`leave_type`,`id`,`workload`
)";

$sql .="VALUES (
'$name',  '$email',  '$dept',  '$date1',  '$date2',  '$purpose',  '$mobile',  '$days',  '$status',  '$leave_type',NULL, '$workload');";

if (mysqli_query($con, $sql)) {
$date3 = date("Y-m-d", strtotime($fdate));
$date4 = date("Y-m-d", strtotime($tdate));
  
$EmailSubject ="Leave Application of ".$name." ";
$MESSAGE_BODY ="<html>Dear Professor,<br>".$name." has submitted leave application from ".$date3." for ".$days." day/s. <br>Please take an appropriate decision within 3 working days.<br>Click <a href='sportsbout.in/index.php'>here</a> to approve or reject the leave application . <br><br>With Regard<br>Leave Management System,AGI </html> ";

$mailheader .= "From: LeaveManagementSystem@aagama2k16.in" . "\r\n"  ;
$mailheader .= "Reply-To:$email" . "\r\n" ; 
$mailheader .= "Cc:$email" . "\r\n";
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);
header('Location: thankyou.php');
} else {
    $msg1= "Error: " . $sql . "<br>" . mysqli_error($conn);
echo $msg1;
}

mysqli_close($conn);    
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
    background-color: #f6f6f6;
    font-size: 12px;
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
    font-size: 25px;
    color: white;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: black;
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
    width: 530px;
    margin-top: -10px;
    border: 5px solid !important ;
    border-color: grey !important ;
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
  <a href="faculty.php">Home</a>
  <a href="leave.php">Apply Leave</a>
  <a href="report.php">Leave Report</a>
  <a href="update.php">View/Update Profile</a>
  <a href="change.php">Change Password</a>
</div>

<span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

<div class="container-fluid" id="form-container">
<div class="row">
<div class="col-xs-offset-4 col-xs-4 ">

<div id="form">
<form name="Apply" method="post" action=" ">
<div style=" width:550px; color: #1B68AE; left:0;"><br><br><h3 id="head"><strong><center>Leave Application Form</center></strong> </h3><hr></div>
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
<label>From Date <input type="text" id="fdate" name="fdate" >
</label>
</td>
<td>
&nbsp&nbsp <label>To Date <input type="text" id="theDate" name="tdate"></label><br></td></tr>
<tr>
<td>
<label>Type of Leave <select name="leave_type" class="form-control">
  <option value="Casual Leave" >Casual Leave</option>
  <option value="Special Leave">Special leave</option>
  <option value="On Duty Leave">On Duty Leave</option>
</select>
</label>
</td>
<td>
&nbsp&nbsp<label>Days <input type="number" id="days" name="days"></label>
</td>
</tr>
<tr>
<td>
<label>Purpose <input type="text" class="form-control" name="purpose"  >
</label></td>
<td>
&nbsp&nbsp<label>Emergency Contact No. <input type="number" class="form-control" name="mobile" maxlength="10" value="<? echo $phone;?>" ></label>
</td>
</tr>
<tr>
<td colspan="2">
<div class="form-group">
 <label for="workload">Work Load Adjustment</label>

 <textarea class="form-control" rows="4" id="workload" name="workload" placeholder="Sno.|Date|Branch|Period|Adjusted To Faculty Name"></textarea>

 </div>

<input type="hidden" value="pending" name="status"/>
 <div class="form-group" id="submit">
</td></tr>
<tr><td colspan="2">
  <center>
  <input type ="submit"  style="background-color:transparent" onclick="return confirm('Are you sure?')" value="Submit"> </center></td></tr>
</table>
</div>
</div> 
</form>
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
</html>
