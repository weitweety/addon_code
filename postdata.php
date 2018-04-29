<?php
    require 'connect.php';
	class ReturnName {
      public $wallname = "";
      public $builder = "";
   	}
	$data = json_decode(file_get_contents("php://input"), true);
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
	$row = mysqli_fetch_array($result);
	//var_dump($row);
	$rn = new ReturnName();
	$rn -> wallname = $row['wallname'];
	$rn -> builder = $row['builder'];
	mysqli_close($conn);
	header("Content-type: application/json");
	echo (json_encode($rn));
?>
