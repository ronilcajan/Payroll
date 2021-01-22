<?php 

    $query = "SELECT * FROM salesrep";

    $result = $conn->query($query);
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    
?>