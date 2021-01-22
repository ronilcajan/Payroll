<?php 
    include '../server/server.php';

    $validation = array('success' => false, 'message' => array());

   $id = $_POST['id'];

    $query = "SELECT * FROM salesrep WHERE id=$id";

    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $validation['message'] = number_format($row['bonus'],2);
    $validation['success'] = true;

    echo json_encode($validation);
    
?>