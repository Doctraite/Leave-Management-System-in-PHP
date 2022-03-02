<?PHP
	session_start();
	if($_SESSION['sid'] == session_id() && $_SESSION['user'] == "Staff")
	{
		$connection = @mysqli_connect("localhost", "root", "") or die(mysqli_error($connection));
		$sql = "SELECT * FROM leavesystemphp.leave_types";
		$result = mysqli_query($connection, $sql);

		//Dummy Source Code
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
<script type="text/javascript" src="../jquery.js"></script>
<script>
	function total_days()
	{
		var start_date = document.getElementById("start_date");
		var end_date = document.getElementById("end_date");
		var start_day = new Date(start_date.value);
		var end_day = new Date(end_date.value);
		var milliseconds_per_day = 1000 * 60 * 60 * 24;
	
		var millis_between = end_day.getTime() - start_day.getTime();
		var days = millis_between / milliseconds_per_day;
		
		var total_days = (Math.floor(days)) + 1;
		var combined = total_days;
		var days_requested = document.getElementById('days_requested');
		days_requested.value = combined;
	}
	
	$(document).ready(function(){
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="one_day"){
                $(".multiple_days_leave").hide();
                $(".one_day_leave").show();
				$(".leave_type").show();
				$(".leave_requested_days").hide();
				$(".button").show();
            }
            if($(this).attr("value")=="multiple_days"){
                $(".one_day_leave").hide();
                $(".multiple_days_leave").show();
				$(".leave_type").show();
				$(".leave_requested_days").show();
				$(".button").show();
            }
        });
    });
	
	$(document).ready(function(){
    if(!$("input[type=radio][name='leave_duration']:checked").val())
	{
		 $(".one_day_leave").hide();
         $(".multiple_days_leave").hide();
		 $(".leave_type").hide();
		 $(".leave_requested_days").hide();
		 $(".button").hide();
	}
});
</script>
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
    <div id="heading">Apply Leave<hr size="2" color="#FFFFFF" ice:repeating=""/>
</div>
    <form action="apply_leave_db.php" method="post">
   
    	<label for="leave_duration" ><span>Leave Duration <span class="required">*</span></span>
            <input type="radio" value="one_day" name="leave_duration" id="leave_duration" />One Day
            <input type="radio" value="multiple_days" name="leave_duration" id="leave_duration" />Multiple Days
        </label>
        
  	<div class="leave_type" >
        <label for="leave_type" ><span>Leave Type <span class="required">*</span></span>
         	<select name="leave_type" id="leave_type">
		 	<?PHP
           		while ($row = mysqli_fetch_array($result))
            	{
                	$leave_type = $row['leave_type'];
                	echo "<option value=\"".$leave_type."\">".$leave_type."</option>";
            	}
          	?>
          	</select>
        </label>
	</div>
    
    <div class="one_day_leave" >
        <label for="leave_date" ><span>Date <span class="required">*</span></span>
        	<input type="date" name="leave_date" id="leave_date" />
        </label>
   	</div>
    
    <div class="multiple_days_leave" >     
        <label for="start_date" ><span>Start Date <span class="required">*</span></span>
        	<input type="date" name="start_date" id="start_date" onchange="total_days()" />
        </label>
        
        <label for="end_date" ><span>End Date <span class="required">*</span></span>
        	<input type="date" name="end_date" id="end_date" onchange="total_days()" />
        </label>
   	</div>
    
    <div class="leave_requested_days" >     
        <label for="days_requested" ><span>Days Requested </span>
        	<input type="text" name="days_requested" id="days_requested" readonly="true" placeholder="No. of Days"/>
        </label>
   	</div>
    
    <div class="button" >
        <label>
          <input type="submit" value="Submit Request" id="submit"/>
        </label>
	</div>
    
    </form>
  </div>
  <?php $page = 'apply_leave'; include 'sidebar.php'?>
  <div id="footer">
  	<p><br />&copy;  Developer(s): S.Shongwe & Z.Mhlanga <?php echo date("Y"); ?> Regional Health Leave Management System</p>
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
}
?>
