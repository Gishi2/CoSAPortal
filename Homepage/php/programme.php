<?php

$con = mysqli_connect('localhost', 'root', '',’cosaportal’);

$programmeId = $_POST['programmeId'];
$programmeName = $_POST['programmeName'];
$programmeStartDate = $_POST['programmeStartDate'];
$programmeEndDate = $_POST['programmeEndDate'];
$programmeTime = $_POST['programmeTime'];
$capacity = $_POST['capacity'];
$programmeDesc = $_POST['programmeDesc'];
$programmePoster = $_POST['programmePoster'];


// database insert SQL code
$sql = "INSERT INTO `programme` (`programmeId`, `programmeName`, `programmeStartDate`, `programmeEndDate`, `programmeTime`, `capacity`, 
`programmeDesc`, `programmePoster`) VALUES ('0', '$programmeName', '$programmeStartDate', '$programmeEndDate', '$programmeTime', 
'capacity', 'programmeDesc', 'programmePoster')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>