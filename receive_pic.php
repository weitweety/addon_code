<?php
    require 'connect.php';
    class ReturnCheck {
      public $receive = "";
   	}
	$data = json_decode(file_get_contents("php://input"), true);
	//echo "okay1";
	if(is_array($data)){
		//echo "okay2";
		$rc = new ReturnCheck();
		$rc -> receive = "true";
		header("Content-type: application/json");
		echo (json_encode($rc));
			/*
		    $servername = "localhost";
		    $username = "root";
		    $password = "jyKP5nAEC52Ikvut";
		    $dbname = "users";
		    */
		    // Create connection
		    //$conn = mysqli_connect($servername, $username, $password, $dbname);
		    $content = $data['postIt'];
		    $type = "image/jpeg";
		    $picname = "picname";
		    $size = 1000;

		    $sql="INSERT INTO myimage (filename,filesize,filetype,filepic) values('"
		                  . $picname . "',"
		                  . $size . ",'"
		                  . $type . "','"
		                  . $content . "')";
		    $result = mysqli_query($conn,$sql);
		    if(! $result )
		    {
		        die('cannot read from database' . mysqli_error($conn));
		    }
		    $pic_id = (string)mysqli_insert_id($conn).",";
		    $sql = "UPDATE recordwall SET picture =  CONCAT(picture,'".$pic_id."')"."WHERE Pin = ".$data['wallPin'];
		    //echo "$sql";
		    $result = mysqli_query($conn,$sql);
			if(! $result )
		    {
		        die('cannot read from database' . mysqli_error($conn));
		    }
		    mysqli_close($conn);
	}
?>