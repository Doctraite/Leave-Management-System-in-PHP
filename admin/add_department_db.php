<?PHP
	// Retrieving values from textboxes
	
	
	
	// Initializing the values, following DRY (Don't Repeat Yourself) Approach
	
	// Obtaining connection using DSN and ODBC
	$connection = mysqli_connect("localhost", "root", "","leavesystemphp");
	
	// Sql query
	/*$sql1 = "SELECT deprtment_id FROM leavesystemphp.department WHERE department_id = '".$user_type."' ";
	$sql2 = "INSERT INTO leavesystemphp.department (department_id, department_name) VALUES ('$user_type','$Department')";
	$sql5 = "SELECT * FROM leavesystemphp.department";
	$result4 = mysqli_query( $connection, $sql5);
	$result1 = mysqli_query( $connection, $sql1);
	$row = mysqli_fetch_array($result1);*/
	if($connection == false)
	{
		die("ERROR: Could not connect database leavesystemphp. ".mysqli_connect_error());
		// Firing query
		/*$result2 = mysqli_query( $connection, $sql2);
		while($row = mysqli_fetch_array($result4))
		{
			$user_type = $row['deprtment_id'];
			$Department = $row['department_name'];
			$sql4 = "INSERT INTO leavesystemphp.department (deprtment_id, department_name) VALUES ('$user_type', '$Department')";
			mysqli_query( $connection, $sql4) or die(mysqli_error($connection));
		}
		echo 	"<script>
					alert(\"Department added.\");
				</script>";
		
		echo "<script>window.location=\"add_department.php\";</script>";*/
	}
	
	$user_type = $_POST["department_id"];
	$Department = $_POST["department_name"];

	$sql = "INSERT INTO leavesystemphp.department VALUES('$user_type','$Department')";
	if(mysqli_query($connection, $sql))
	{
		echo	"<script>
				alert(\"New Department Added and ID  is '".$user_type."'\");
				window.location=\"add_department.php\";</script>";
	}else
	{
		echo 	"<script>
					alert(\"Department ID already exist, Please use different Department ID.\");
				</script>";
		echo "<script>window.location=\"add_department.php\";</script>";
	}

	// Closing Connection
	mysqli_close($connection);
	
?>