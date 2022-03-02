<?php

    $servername="localhost";
    $uname="root";
    $pass="";
    $db="leavesystemphp";

    $conn=mysqli_connect($servername,$uname,$pass,$db);

    if(!$conn){
        die("Connection Failed");
    }

    $sql = "SELECT * FROM leavesystemphp.leave_requests WHERE leave_status = 'Rejected' and staff_id = '".$staff_id."'";
                    $query = $conn->query($sql);

                    echo "$query->num_rows";
?>