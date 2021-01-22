<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());
    $id 	    = $conn->real_escape_string($_POST['id']);
	$name 	    = $conn->real_escape_string($_POST['name']);
	$comission 	= $conn->real_escape_string($_POST['comission']);
	$tax 	    = $conn->real_escape_string($_POST['tax']);
	$bonus 		= $conn->real_escape_string($_POST['bonus']);
  
    $update  = "UPDATE salesrep SET `name`='$name',comission=$comission, tax=$tax, bonus=$bonus WHERE id='$id'";
    $update  = $conn->query($update);
    if($update === true){
        $validation['message'] = 'Salesrep Profile information has been updated!';
        $validation['success'] = true;
    }else{
        $validation['message'] = 'Salesrep Profile not updated!';
        $validation['success'] = false;
    }

	$conn->close();

	echo json_encode($validation);

?>