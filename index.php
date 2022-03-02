<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LMS</title>
<link rel="shortcut icon" href="./background/MoH-square.png" type="image/x-icon">
<style type="text/css">

@font-face {
  font-family: Raleway;
  src: url(font/Raleway-VariableFont_wght.ttf);
}

html * {
  font-family: Raleway;
}

body {
	margin: 0px;
	background: #bdc3c7;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #2c3e50, #bdc3c7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
#container {
	background-repeat: no-repeat;
	margin-right: auto;
	margin-left: auto;
	text-align: center;
	background-attachment: fixed;
	margin-top: 100px;
	font-family: Raleway;
	font-size: 30px;
	color: #FFF;
	font-weight: 700;
}
#container a{
	font-family: Raleway;
	font-size: 14px;
	text-decoration:none;
	color:#FFF;
}
#container a:hover{
	text-decoration:underline;
}
input:-moz-placeholder { color: #fff; }
input:-ms-input-placeholder { color: #fff; }
input::-webkit-input-placeholder { color: #fff; }
#container input[type="text"],
#container input[type="password"]{
	 border: 1px solid rgba(255,255,255,.15);
    -moz-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
    -webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
    box-shadow: 0 2px 3px 0 rgba(0,0,0,.1) inset;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	-o-transition: all 0.30s ease-in-out;
	outline: none;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	/* [disabled]-moz-box-sizing: border-box; */
	 background: #2d2d2d; /* browsers that don't support rgba */
    background: rgba(45,45,45,.15);
	color:#FFF;
	
	margin-bottom: 25px;
	width: 300px;
	height:40px;
	padding: 1%;
	font-family: Raleway;
	border-radius:5px;
	font-size:14px;
}
#container input[type="text"]:focus,
#container input[type="password"]:focus{
	box-shadow: 0 0 10px #444;
	padding: 1%;
	border: 1px solid #333;
}
#container input[type="submit"]{
	cursor:pointer;
	width: 300px;
	height: 50px;
	background: #34b5c2e0;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #061700, #52c234);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #001617cc, #34b5c2e0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

	color: #FFF;
	padding: 1%;
	border-bottom: none;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;
	font-family: Raleway;
	border-radius:5px;
	moz-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.25) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    -webkit-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.25) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    box-shadow:
        0 15px 30px 0 rgba(255,255,255,.25) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
	font-size: 20px;
    font-weight: 500;
    color: #fff;
    text-shadow: 0 1px 2px rgba(0,0,0,.1);
    -o-transition: all .2s;
    -moz-transition: all .2s;
    -webkit-transition: all .2s;
    -ms-transition: all .2s;
}
#container input[type="submit"]:hover{
	-moz-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    -webkit-box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
    box-shadow:
        0 15px 30px 0 rgba(255,255,255,.15) inset,
        0 2px 7px 0 rgba(0,0,0,.2);
}
#copyright_text {
	position: fixed;
	left: 0px;
	bottom: 10px;
	height: auto;
	width: 100%;
	text-align: center;
	color: #FFF;
	font-family: Raleway;
	font-weight: 500;
	font-size: 14px;
	background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
}

.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  border-radius: 25px;
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 30%;
  padding: 20px;
  text-align: center;
}

 body {
  
    font-family: Agency FB;
    background-image: url("imagess/logo.png");
    background-repeat: no-repeat;
    background-size: 70%;
    background-position: 50% 15%;
}

</style>

</head>

<body>
<div id="container">
<div class="bg-text">
Login Authentication Section
  <form method="post" action="login.php">
  	<br /><input type="text" name="txt_username" placeholder="Username/Email" required="required" /><br />
    <input type="password" name="pswd_password" placeholder="Password" required="required" /><br />
   <input type="submit" value="Login" /><br /><br />
  </form>
</div>
</div>
<div id="copyright_text">&copy;Developer(s): S.Shongwe & Z.Mhlanga <?php echo date("Y"); ?> Regional Health Leave Management System</div>
</body>
</html>
