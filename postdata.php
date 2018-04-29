<?php
    require 'connect.php';
	class ReturnName {
      public $wallname = "";
      public $builder = "";
   	}
	$data = json_decode(file_get_contents("php://input"), true);
	/*
	$servername = "localhost";
	$username = "root";
	$password = "jyKP5nAEC52Ikvut";
	$dbname = "users";
	*/
	// Create connection
	//$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (mysqli_connect_errno()) {
	    die("Connection failed: " . mysqli_connect_errno());
	} 
	$sql = "SELECT * FROM recordwall WHERE Pin = ".$data['wallPin'];
	//echo "check...".$sql;

	$result = mysqli_query($conn,$sql);
	if(! $result )
	{
	    die('cannot read from database' . mysqli_error($conn));
	}
	//echo "check...".$sql;
	/*for debug...
	if(mysqli_query($conn,$sql))
		echo "insert success\n";
	else
		echo "something error\n";
	*/
	$row = mysqli_fetch_array($result);
	//var_dump($row);
	$rn = new ReturnName();
	$rn -> wallname = $row['wallname'];
	$rn -> builder = $row['builder'];
	mysqli_close($conn);
	header("Content-type: application/json");
	echo (json_encode($rn));
?>