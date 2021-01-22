<?php 

    $query = "SELECT *, pdf.id as id, pdf.date as `date` FROM pdf JOIN salesrep ON pdf.salesrep_id=salesrep.id JOIN user ON pdf.username=user.username";

    $result = $conn->query($query);
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    
?>