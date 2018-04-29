<?php
    require 'connect.php';
	class ReturnPin {
      public $wallpin = "";
   	}
	$data = json_decode(file_get_contents("php://input"), true);
	// Check connection
	if (mysqli_connect_errno()) {
	    die("Connection failed: " . mysqli_connect_errno());
	} 

	$tag_array = array();
	foreach ($data as $key => $value){
		if($value == TRUE && $key != "wallName" && $key != "builder"){
			$tag_array[] = $key;
		}
	}
	$storestring = implode(" ", $tag_array);
	//echo $storestring;
	//echo "\n";
	$sql = "INSERT INTO recordwall (wallname, visited, category, public, builder, picture) VALUES ("."\"".$data['wallName']."\", 0, "."\"".$storestring."\","."0, "."\"".$data['builder']."\","."\"\"".")";
	//echo "check...".$sql;
	$result = mysqli_query($conn,$sql);
	if(! $result )
	{
	    die('cannot read from database' . mysqli_error($conn));
	}
	$rp = new ReturnPin();
	$rp -> wallpin = mysqli_insert_id($conn);
	mysqli_close($conn);
	header("Content-type: application/json");
	echo (json_encode($rp));
?>
