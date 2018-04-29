<?php
    require 'connect.php';
    $searchTerm = $_GET['term'];
    
    $query = mysqli_query($conn, "SELECT * FROM recordwall WHERE wallname LIKE '%".$searchTerm."%' ORDER BY Pin ASC");
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row['wallname'];
    }
    echo json_encode($data);
    mysqli_close($conn);
?>

