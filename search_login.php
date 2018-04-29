<?php
    //database configuration
    /*
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'jyKP5nAEC52Ikvut';
    $dbName = 'users';
    */
    //connect with the database
    //$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    require 'connect.php';
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = mysqli_query($conn, "SELECT * FROM recordwall WHERE wallname LIKE '%".$searchTerm."%' ORDER BY Pin ASC");
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row['wallname'];
    }
    
    //return json data
    echo json_encode($data);
    mysqli_close($conn);
?>

