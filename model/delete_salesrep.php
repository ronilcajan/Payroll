<?php 
    include '../server/server.php';

    $id = $_GET['id'];

    $query = "DELETE FROM salesrep WHERE id=$id";

    $result = $conn->query($query);
    
    if($result){
        $_SESSION['msg'] = "User Deleted!";
        header("Location: ../salesrep.php");
    }
?>