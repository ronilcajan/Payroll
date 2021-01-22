<?php 
    include '../server/server.php';

    $validation = array('success' => false, 'message' => array());

    $id = $_POST['id'];
    $pay = $_POST['pay'];

    $query = "SELECT * FROM salesrep WHERE id='$id'";

    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    if(!empty($pay)){
        $salesrep_com = $row['comission'] / 100;
        $net = $pay * $salesrep_com;
        $salesrep_tax = $row['tax'] /100;
        $tax = $net * $salesrep_tax;
        $total_com = $net - $tax;
        $validation['message'] = number_format($total_com,2);
        $validation['success'] = true;
    }else{
        $validation['message'] = 0;
        $validation['success'] = true;
    }
    

    echo json_encode($validation);
    
?>