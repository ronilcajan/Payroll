<?php 
	include '../server/server.php';

	$validation = array('success' => false, 'message' => array());

	$name 	    = $conn->real_escape_string($_POST['name']);
	$comission 	= $conn->real_escape_string($_POST['comission']);
	$tax 	    = $conn->real_escape_string($_POST['tax']);
	$bonus 		= $conn->real_escape_string($_POST['bonus']);
    
    $insert  = "INSERT INTO salesrep (`name`, comission, tax, bonus) VALUES ('$name', $comission, $tax, $bonus)";
    $insert  = $conn->query($insert);
    if($insert === true){
        $validation['message'] = 'Sales Representative has been save!';
        $validation['success'] = true;
    }else{
        $validation['message'] = 'Sales Representative not save!';
        $validation['success'] = false;
    }

	$conn->close();

	echo json_encode($validation);

?>