<?php 
    include '../server/server.php';

    $id = $_GET['id'];

    $query = "DELETE FROM pdf WHERE id=$id";

    $result = $conn->query($query);
    
    if($result){
        $_SESSION['msg'] = "PDF Deleted!";
        header("Location: ../pdf.php");
    }
?>