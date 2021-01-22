<?php 
    include '../server/server.php';
    require('../assets/fpdf/fpdf.php');
    

    class PDF extends FPDF
    {
        function Header(){
            $this->Image('../assets/images/ops.png',15,6,28);
            // Line break
            parent::Header();
        }
            // Page footer
        function Footer(){
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            $this->SetTextColor(1, 1, 1);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

            // Better table
        function Table($header, $data)
        {
            // Column widths
            $w = array(50, 46, 46, 46);
            // Header
            $this->SetFillColor(223, 221, 221);
            $this->SetFont('Arial','',9);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $this->Ln();
            // Data
            foreach($data as $row)
            {
                $this->Cell($w[0],6,$row[0],'LRB',0,'C',false);
                $this->Cell($w[1],6,$row[1],'LRB',false);
                $this->Cell($w[2],6,$row[2],'LRB',0,'C',false);
                $this->Cell($w[3],6,$row[3],'LRB',0,'C',false);
                $this->Ln();
            }
            // Closing line
            $this->Cell(array_sum($w),0,'','T');
        }
        function Table2($header, $data, $total)
        {
            // Column widths
            $w = array(37, 35, 35, 35,35);
            // Header
            $this->SetFont('Arial','BU',9);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],0,0,'C',false);
            $this->Ln();
            // Data
            $this->SetFont('Arial','',8);
            foreach($data as $row)
            {
                $this->Cell($w[0],6,$row[0],0,0,'C',false);
                $this->Cell($w[1],6,'$'.number_format($row[1],2),0,0,'C',false);
                $this->Cell($w[2],6,'$'.number_format($row[2],2),0,0,'C',false);
                $this->Cell($w[3],6,$row[3],0,0,'C',false);
                $this->Cell($w[2],6,'$'.number_format($row[4],2),0,0,'C',false);
                $this->Ln();
            }
            $this->SetFont('Arial','B',9);
            for($i=0;$i<count($total);$i++)
                $this->Cell($w[$i],7,$total[$i],0,0,'C',false);
        }

    }

    $id = $_POST['salesrep'];
    $query = "SELECT * FROM salesrep WHERE id =$id";

    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $id = $row['id'];
    $name = $row['name'];
    $comission = $row['comission'];
    $tax = $row['tax'];
    $bonus = $row['bonus'];
    
    $day = explode("-", $_POST['week']);
    $startday = $day[0]; 
    $endday = $day[1];
    $month = $_POST['month']+1;
    $year = $_POST['year'];
    $now = date('m/d/Y');
    $week = date("W", strtotime($year."-".$month."-".$endday));

    $pdf = new PDF('P','mm','A4');
    $pdf->AddPage();
    $title = "Buyer Created Tax Invoice";
    $salesrep = "Salesrep ID:" .$id." ".$name;
    $period = $month."/".$startday."/".$year." - " .$month."/".$endday."/".$year;
    $pro_on = $now." ".$name." Looc Proper, Plaridel, Misamis OCcidental";
    $pro_by = "Eliteinsure Limited 1C/39 Mackelvie Street Grey Lynn, 1021 Auckland New Zealand +656456456 wwww.eliteinsure.com";
    $stmt = "Statement Week: Statement Date: Payment Type: Termination Date: IRD:";
    $stmt_D = $year.$week." ".$month."/".$endday."/".$year." Direct Credit";

    //Arial bold 40
    $pdf->SetFont('Arial','B',12);
    //Calculate width of title and position
    $w = $pdf->GetStringWidth($title)+140;
    $pdf->SetX((210-$w)/2);
    //Colors of frame, background and text
    $pdf->SetTextColor(37, 84, 252);
    $pdf->Cell($w,20,$title,0,1,'C',false);

    //Arial bold 40
    $pdf->SetFont('Arial','B',10);
    //Calculate width of title and position
    $w = $pdf->GetStringWidth($salesrep)+145;
    $pdf->SetX((210-$w)/2);
    //Colors of frame, background and text
    $pdf->SetTextColor(1, 1, 1);
    $pdf->SetFillColor(223, 221, 221);
    $pdf->Cell($w,7,$salesrep,0,1,'L',true);
    $w = $pdf->GetStringWidth($period)+145;
    $pdf->SetXY(17,33.5);
    $pdf->Cell($w,0,$period,0,1,'R',false);
    
    $pdf->Ln(10);
    $pdf->SetFont('Arial','BU',9);
    $w = $pdf->GetStringWidth('Produced on :')+165;
    $pdf->SetX((210-$w)/2);
    $pdf->Cell(22,3,'Produced on :',0,1,'L',false);

    $pdf->SetFont('Arial','',9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetXY(35,44);
    $pdf->MultiCell(22,4,$pro_on,0,1,'L',false);
    
    $pdf->SetFont('Arial','BU',9);
    $w = $pdf->GetStringWidth('Produced by:')+165;
    $pdf->SetXY(80,44);
    $pdf->Cell(22,3,'Produced by :',0,1,'L',false);

    $pdf->SetFont('Arial','',9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetXY(80,48);
    $pdf->MultiCell(35,4,$pro_by,0,1,'C',false);

    $pdf->SetFont('Arial','BU',9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetXY(142,44);
    $pdf->MultiCell(35,4,$stmt,0,1,'L',false);

    $pdf->SetFont('Arial','',9);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetXY(175,44);
    $pdf->MultiCell(20,4,$stmt_D,0,1,'L',false);
    $pdf->SetXY(175,59.9);
    $pdf->Cell(20,4,'0423949',0,1,'L',false);
    
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',10);
    //Calculate width of title and position
    $w = $pdf->GetStringWidth($salesrep)+140;
    $pdf->SetX((210-$w)/2);
    //Colors of frame, background and text
    $pdf->SetTextColor(1, 1, 1);
    $pdf->Cell($w,7,$title,0,1,'L',false);

    $header = array('Date', 'Description', 'Debit', 'Credit');

    $total = 0;
    if(!empty($_POST['comission'])){
        for($i=0;$i<count($_POST['comission']);$i++){
            $total += floatval(preg_replace('/,/','',$_POST['comission'][$i]));
        }
        $bonus = floatval(preg_replace('/,/','',$_POST['bonus']));
        $data = array(
                    array(
                        date('m/d/Y'),'Comission','','$'.number_format($total,2)
                    ),
                    array(
                        date('m/d/Y'),'Bonus','','$'.number_format($bonus,2)
                    ),
                    array(
                        '','','$0.00','$'.number_format(($bonus + $total),2)
                    ),
                );
        $pdf->Table($header,$data);

        $pdf->Ln(20);
        $compute = 'Net:  $'.number_format(($bonus + $total),2).' Withholding Tax:   $0.00 Payment Amount:';
        $amt = '$'.number_format(($bonus + $total),2);
        $pdf->SetFont('Arial','B',9);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetXY(150,120);
        $pdf->MultiCell(40,5,$compute,0,1,'L',false);
        $pdf->SetXY(179,130);
        $pdf->SetTextColor(255, 0, 0);
        $pdf->Cell(40,5,$amt,0,1,'L',false);
        
        
        $pdf->AddPage();
        $title2 = "Detail Comission Statement";
        //Arial bold 40
        $pdf->SetFont('Arial','B',12);
        //Calculate width of title and position
        $w = $pdf->GetStringWidth($title)+150;
        $pdf->SetX((210-$w)/2);
        //Colors of frame, background and text
        $pdf->SetTextColor(37, 84, 252);
        $pdf->Cell($w,20,$title2,0,1,'C',false);
        //Arial bold 40
        $pdf->SetFont('Arial','B',10);
        //Calculate width of title and position
        $w = $pdf->GetStringWidth($salesrep)+145;
        $pdf->SetX((210-$w)/2);
        //Colors of frame, background and text
        $pdf->SetTextColor(1, 1, 1);
        $pdf->SetFillColor(223, 221, 221);
        $pdf->Cell($w,7,$salesrep,0,1,'L',true);
        $w = $pdf->GetStringWidth($period)+145;
        $pdf->SetXY(17,33.5);
        $pdf->Cell($w,0,$period,0,1,'R',false);

        $pdf->Ln(5);
        $w = $pdf->GetStringWidth("Production")+167;
        $pdf->SetX((210-$w)/2);
        //Colors of frame, background and text
        $pdf->SetTextColor(1, 1, 1);
        $pdf->SetFillColor(223, 221, 221);
        $pdf->Cell($w,7,"Production",0,1,'L',true);

        $header2 = array('Client Name', 'Annual Premium', 'Commission', 'G.S.T', 'Balance');
        $data2 = array();
        for($i=0;$i<count($_POST['comission']);$i++){
            array_push($data2,array($_POST['clients_name'][$i],preg_replace('/,/','',$_POST['clients_payment'][$i]), preg_replace('/,/','',$_POST['comission'][$i]), '$0.00',
            preg_replace('/,/','',$_POST['clients_payment'][$i])-preg_replace('/,/','',$_POST['comission'][$i])));
        }
        $total_pay = 0;
        for($i=0;$i<count($_POST['clients_payment']);$i++){
            $total_pay += floatval(preg_replace('/,/','',$_POST['clients_payment'][$i]));
        }
        $total2 = array(
            'Total', '$'.number_format($total_pay,2),  '$'.number_format($total,2), '$0.00',  '$'.number_format(($total_pay-$total),2)
        );
        $pdf->Ln(5);
        
        $pdf->Table2($header2,$data2,$total2);
    }else{
        $_SESSION['msg'] = "No Commission found!";
        header("Location: ../create-payroll.php");
    }

    $pdf->AliasNbPages();
    
    $filename = date('dmYHis').'invoice.pdf';
    $user = $_SESSION["username"];
    $insert  = "INSERT INTO pdf (salesrep_id, username, `filename`) VALUES ($id, '$user', '$filename')";
    $insert  = $conn->query($insert);

    $pdf->Output();
    $pdf->Output('F', '../pdf/'.$filename);

?>