<html lang="en">                          
 <head>
<?php
require 'faicon.php';
echo '<link href="data:image/x-icon;base64,'.$ficon.'" rel="icon" type="image/x-icon">';
?>
 <title>show picture</title>

 <?php
 	require 'connect.php';
	if(isset($_GET['wallname'])){
		$name = $_GET['wallname'];
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		// Perform queries 
		$sql = "SELECT Pin FROM recordwall WHERE wallname = "."\"".$name."\"";
		$result = mysqli_query($conn,$sql);//
		$row = mysqli_fetch_assoc($result);
		$pin = (string)($row['Pin']);
		mysqli_close($conn);
	}
	else if(isset($_GET['wallpin'])){
		$pin = $_GET['wallpin'];
		$sql = "SELECT wallname FROM recordwall WHERE Pin = ". $pin;
		$result = mysqli_query($conn,$sql);//
		$row = mysqli_fetch_assoc($result);
		$name = ($row['wallname']);
		mysqli_close($conn);
	}
	
?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
   crossorigin="anonymous"></script>
 
  <script type="text/javascript">var pin = '<?php echo $pin ?>';</script>
  <script type="text/javascript" src="./checkupdate.js" ></script>
  <style>
	img { 
    border:5;
    border-color: #77bca9;  
	}
	h2 {
		text-align:left;
		color:  #f7fbfc;
		margin-left:10px;
	}
	body {
		background-color:  #77bca9;
	}
  </style>
 </head>
 <body>
 <center>
 <h2><?php echo $name;?></h2>
 </center>
 <div id="printpic">
 </div>
 </body>
</html>
