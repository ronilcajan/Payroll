<?php 

    $id = $_GET['id'];

    $query = "SELECT * FROM salesrep WHERE id =$id";

    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $name = $row['name'];
    $comission = $row['comission'];
    $tax = $row['tax'];
    $bonus = $row['bonus'];
    
?>