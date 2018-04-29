<?php
	require 'connect.php';

	/*$servername = 'localhost';
    $username = 'root';
    $password = 'jyKP5nAEC52Ikvut';
    $dbname = 'users';
	$conn = mysqli_connect($servername, $username, $password, $dbname);*/
	/*if(isset($_GET['pinnum']))
		echo "pin exists";
	else
		echo "pin not exists";*/
	$pin = $_GET['pinnum'];
	//echo "pin is".$pin;
	$sql= "SELECT * FROM `recordwall` WHERE Pin = $pin";
	$result = mysqli_query($conn, $sql); 
	if (mysqli_num_rows($result)) { 
	 	$row = mysqli_fetch_assoc($result);
	 	//header('Content-Type: image/jpeg');
	 	$paths = explode(",", $row['picture']);
	 	$i = 1;
	 	foreach ($paths as $base64){
	 		//echo "base64 file is".$base64;
	 		//echo $base64;
	 		$i = $i + 1;
	 		$sql= "SELECT filepic,filetype FROM myimage WHERE idno =".$base64;
	 		//echo $sql;
	 		$result2 = mysqli_query($conn, $sql); 
			if ($result2 && mysqli_num_rows($result2)){
				$data=mysqli_fetch_array($result2);
			    $url = 'data: '.$data[1].';base64,'.$data[0];
			    //echo base64_decode($data[0]);
			    echo '<img src="', $url, '",width = "300", height = "300", border="5">';
			}
			else
				$i = $i;
	 	}
	}else { 
		echo "0 notes"; 
	}  
	mysqli_close($conn);
?>