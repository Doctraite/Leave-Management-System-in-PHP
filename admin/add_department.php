<?php
	session_start();
	if($_SESSION['sid'] == session_id() && $_SESSION['user'] == "admin")
	{
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../background/MoH-square.png" type="image/x-icon">
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
        <li><a class="greeting" href="#">Hi <?php echo $_SESSION['user']; ?></a></li>
      </ul>
    </div>
  </div>
  <div id="content_panel">
    <div id="heading">Add Department<hr size="2" color="#FFFFFF" ice:repeating=""/>
</div>
    <form action="add_department_db.php" method="post">
        <label for="department_id" ><span>Department ID <span class="required">*</span></span>
          <input type="text" autocomplete="off" name="department_id" id="department_id" placeholder="Department ID" required="required" style="width:560px" />
        </label>

         <label for="department_name" ><span>Department Name<span class="required">*</span></span>
          <input type="text" autocomplete="off"  name="department_name" id="department_name" placeholder="Department name" required="required" style="width:560px" />
        </label>

        <label>
          <input type="submit" value="Add" />
        </label>
    </form>
  </div>
  <?php $page = 'add_department'; include 'sidebar.php'?>
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
?>
