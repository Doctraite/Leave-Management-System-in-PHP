<?PHP
	session_start();
	if($_SESSION['sid'] == session_id() && $_SESSION['user'] == "PC")
	{	
		$pc_id = $_SESSION['pc_id'];
		$staff_id = $_GET['staff_id'];
		
		$connection = @mysqli_connect("localhost", "root", "") or die(mysqli_error($connection));
		
		$sql1 = "SELECT * FROM leavesystemphp.staff WHERE staff_id = '".$pc_id."'";
		
		$sql2 = "SELECT * FROM leavesystemphp.leave_requests WHERE staff_id = '".$staff_id."'";
		
		$result1 = mysqli_query($connection, $sql1);
		
		$result2 = mysqli_query($connection, $sql2);
		if(mysqli_num_rows($result1) == 0)
		{
			echo 	"<script>
					alert(\"Staff ID ".$staff_id." does not exist !\");
					window.location=\"search_staff_to_view_history.php\";</script>";
		}
		
		while($row1 = mysqli_fetch_array($result1))
		{
			$first_name = $row1['first_name'];
			$middle_name = $row1['middle_name'];
			$last_name = $row1['last_name'];
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LMS</title>
<link rel="shortcut icon" href="../background/MoH-square.png" type="image/x-icon">
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
        <li><a class="greeting" href="#"> <?php echo $first_name." ".$middle_name." ".$last_name; ?></a></li>
      </ul>
    </div>
  </div>
  <div id="content_panel">
    <div id="heading">Leave History<hr size="2" color="#FFFFFF" ice:repeating=""/></div>
    <div id="form">
    <form method="post" action="approve_reject_db.php">
    <fieldset>
    <legend>Personal Information</legend>
    <label for="staff_id"><span>Staff ID </span>
    	<input type="text" name="staff_id" id="staff_id" readonly="true" value="<?php echo $staff_id ?>" style="background-color:#F6F6F6; color:#a90000" />
    </label>
    <label for="staff_name"><span>Staff Name </span>
    	<input type="text" readonly="true" value="<?php echo $first_name." ".$middle_name." ".$last_name ?>" style="background-color:#F6F6F6; color:#a90000" />
    </label>
    </fieldset>
    <br />
    <fieldset>
    <legend>Leave History</legend>
    <div id="table">
    	<span><table border="1" bgcolor="#006699" >
				<tr>
                	<th width="180px">Leave Types</th>
					<th width="120px">Applied On</th>
					<th width="120px">No. of Days</th>
					<th width="120px">Starting Date</th>
                    <th width="120px">Leave Status</th>
				</tr>
			</table></span>
    <?PHP
    while($row2 = mysqli_fetch_array($result2))
		{
			$leave_type = $row2['leave_type'];
			$date_applied = $row2['date_applied'];
			$days_requested = $row2['days_requested'];
			$start_date = $row2['start_date'];
			$status = $row2['leave_status'];
			
			echo "<table border=\"1\">
					<tr>
						<td width=\"180px\">".$leave_type."</td>
						<td width=\"120px\">".$date_applied."</td>
						<td width=\"120px\">".$days_requested."</td>
						<td width=\"120px\">".$start_date."</td>
						<td width=\"120px\">".$status."</td>
					</tr>
				</table>";
		}
		
	?>
    </div>
    </fieldset>
    </form>
    </div>
  </div>
  <?php $page = 'view_leave_history'; include 'sidebar.php';?>
  <div id="footer">
  	<p><br />&copy; J!N <?php echo date("Y"); ?> Leave Management System</p>
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
