<?php
	session_start();
	session_destroy();
	session_regenerate_id(true);
	/* setcookie(PHPSESSID, session_id(), time() - 1); */
	header("Location: index.php");
?>