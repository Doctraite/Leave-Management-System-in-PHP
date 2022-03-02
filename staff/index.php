<?PHP
	session_start();
	if($_SESSION['sid'] == session_id() && $_SESSION['user'] == "Staff")
	{	
		$staff_id = $_SESSION['staff_id'];
		
		$connection = @mysqli_connect("localhost", "root", "") or die(mysqli_error($connection));
		
		$sql1 = "SELECT * FROM leavesystemphp.staff WHERE staff_id = '".$staff_id."'";
		
		$sql2 = "SELECT * FROM leavesystemphp.leave_statistics WHERE staff_id = '".$staff_id."'";
		
		$result1 = mysqli_query( $connection, $sql1);
		
		$result2 = mysqli_query( $connection, $sql2);
		
		while($row1 = mysqli_fetch_array($result1))
		{
			$first_name = $row1['first_name'];
			$middle_name = $row1['middle_name'];
			$last_name = $row1['last_name'];
		}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LMS</title>
<link rel="shortcut icon" href="../background/MoH-square.png" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href="../all.css" rel="stylesheet" type="text/css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../images/bg.gif);
}
</style>
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
  <div id="header">
	  <div>
	  <img src="../images/Coat_of_arms_of_Eswatini.png" width="120" height="90" style="position:absolute;margin-top: 10px;padding:9px;">
	  </div>
    <div id="title">Regional Health Leave Management System</div>
    <div id="quick_links">
      <ul>
        <li><a class="home" href="index.php">Home</a></li>
        <li>|</li>
       
        <li><a class="logout" href="../logout.php">Logout</a></li>
        <li>|</li>
        <li><a class="greeting" href="#">Hi <?php echo $first_name." ".$middle_name." ".$last_name; ?></a></li>
      </ul>
    </div>
  </div>
  <div id="content_panel">
    <div id="heading">Home<hr size="2" color="#FFFFFF" ice:repeating=""/></div>
    <div id="form">
    <form method="post" action="approve_reject_db.php">
    <fieldset>
    <legend>Personal Information</legend>

	<div class="main-section">

<div class="dashbord">
  <div class="icon-section">
	<i class="fa fa-user-check" aria-hidden="true"></i><br>
	<small>Approved Leave</small>
	<p><?php include 'counters/approvecount.php'?></p>
  </div>
 
</div>

<div class="dashbord dashbord-green">
  <div class="icon-section">
	<i class="fa fa-sign-out" aria-hidden="true"></i><br>
	<small>Pending</small>
	<p><?php include 'counters/leavetypescount.php'?></p>
  </div>
 
</div>

<div class="dashbord dashbord-orange">
  <div class="icon-section">
	<i class="fa fa-user-times" aria-hidden="true"></i><br>
	<small>Rejected Leave</small>
	<p><?php include 'counters/programcocount.php'?></p>
  </div>
 
</div>


    </fieldset>
    <br />
    <fieldset>
    <legend>Current Leave Balances</legend>
    <div id="table">
    	<span><table border="1" bgcolor="#006699" >
				<tr>
                	<th width="200px">Leave Types</th>
					<th width="200px">Maximum Allowed Leaves</th>
					<th width="200px">Leaves Taken</th>
					<th width="200px">Remaining Leaves</th>
				</tr>
			</table></span>
    <?PHP
    while($row2 = mysqli_fetch_array($result2))
		{
			$leave_type = $row2['leave_type'];
			$maximum_leaves = $row2['maximum_leaves'];
			$laves_taken = $row2['leaves_taken'];
			$remaining_leaves = $maximum_leaves - $laves_taken;
			echo "<table border=\"1\">
					<tr>
						<td width=\"200px\">".$leave_type."</td>
						<td width=\"200px\">".$maximum_leaves."</td>
						<td width=\"200px\">".$laves_taken."</td>
						<td width=\"200px\">".$remaining_leaves."</td>
					</tr>
				</table>";
		}
		
	?>
    </div>
    </fieldset>
    </form>
    </div>
  </div>
  <?php $page = 'home';  include 'sidebar.php'?>
  <div id="footer">
  	<p><br />&copy;Developer(s): S.Shongwe & Z.Mhlanga <?php echo date("Y"); ?> Regional Health Leave Management System</p>
  </div>
</div>
</body>
</html>
<?php
	}
	else
	{
		header("Location: ../index.php");
	}
	mysqli_close($connection);
?>


<style>
  .main-section{
	width:80%;
	margin:0 auto;
	text-align: center;
	padding: 0px 5px;
}
.dashbord{
	width:32%;
	display: inline-block;
	background-color:#34495E;
	color:#fff;
	margin-top: 50px; 
}
.icon-section i{
	font-size: 30px;
	padding:10px;
	border:1px solid #fff;
	border-radius:50%;
	margin-top:-25px;
	margin-bottom: 10px;
	background-color:#34495E;
}
.icon-section p{
	margin:0px;
	font-size: 20px;
	padding-bottom: 10px;
}
.detail-section{
	background-color: #2F4254;
	padding: 5px 0px;
}
.dashbord .detail-section:hover{
	background-color: #5a5a5a;
	cursor: pointer;
}
.detail-section a{
	color:#fff;
	text-decoration: none;
}
.dashbord-green .icon-section,.dashbord-green .icon-section i{
	background-color: #16A085;
}
.dashbord-green .detail-section{
	background-color: #149077;
}
.dashbord-orange .icon-section,.dashbord-orange .icon-section i{
	background-color: #F39C12;
}
.dashbord-orange .detail-section{
	background-color: #DA8C10;
}
.dashbord-blue .icon-section,.dashbord-blue .icon-section i{
	background-color: #2980B9;
}
.dashbord-blue .detail-section{
	background-color:#2573A6;
}
.dashbord-red .icon-section,.dashbord-red .icon-section i{
	background-color:#E74C3C;
}
.dashbord-red .detail-section{
	background-color:#CF4436;
}
.dashbord-skyblue .icon-section,.dashbord-skyblue .icon-section i{
	background-color:#8E44AD;
}
.dashbord-skyblue .detail-section{
	background-color:#803D9B;
}
</style>
