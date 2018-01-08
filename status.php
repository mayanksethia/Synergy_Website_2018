<?php
		include_once('data_connect.php');
		$status=$_POST['status'];
		$trans=$_POST['Refno'];
		$tpsl=$_POST['tpsltranid'];
		$bank_ref=$_POST['bankrefno'];
		$date=$_POST['txndate'];
                

		$ref=substr($trans,3);
		
		
		$sql = "Select Email from registration where ReferenceNumber='$ref'";
		
		$rows=mysql_num_rows(mysql_query($sql));
		
		$email;
		$name;
		$amount;
		
		if($rows)
		{
			if(!($tpsl===NULL))
			{
			$query1="select * from registration where ReferenceNumber='$ref'";
			$res = mysql_query($query1);
			$row = mysql_fetch_row($res);
			$email=$row[8];
			$name=$row[0];
			$amount=$row[21];
			$query="INSERT INTO payment(FName,LName,College,ID,Address,City,State,Mobile,Email,Paper,Project,Code,Ml,VLSI,Web,Research,Cultural,C1,C2,C3,C4,Amount,ReferenceNumber,TPSL,BankRef,Date) 
			values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[13]','$row[14]','$row[15]','$row[16]','$row[17]','$row[18]','$row[19]','$row[20]','$row[21]','$ref','$tpsl','$bank_ref','$date')";
			mysql_query($query);
			}
			else if($tpsl===NULL)
			{
			//$query="delete from pre_payment where ReferenceNumber='$ref'";
			$query="delete from registration where ReferenceNumber='$ref'";
			mysql_query($query);
			}
		}


	  
		
            if(!(isset($status)&&isset($trans)&&isset($tpsl)&&isset($bank_ref)&&isset($date)))
                header('Location: index.html');


?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title>Synergy 2017 - IETE VIT</title>
</head>
<!--Initialising css folders-->
<link rel="stylesheet" href="static1/css/materialize.min.css">

<!--Initialising javascript folders-->
<script type="text/javascript" src="static1/js/jquery-2.1.1.min.js"></script>
<script src="static1/js/materialize.min.1.js"></script>
<script src="static1/js/materialize.min.js"></script>


<body>
<div id="details">
<h2 align="center" style='padding-top:50;'>Transaction Details</h2>
<table style='width:100%;' class="centered striped">
		<thead>
		<tr>
			<th>Reference no.</th>
			<th>Name</th>
			<th>Email Id</th>
			<th>Amount</th>
			<th>TPSL Transaction ID</th>
			<th>Bank Reference No.</th>
			<th>Transaction Date</th>
		</tr>
		</thead>
		
		<tbody>
		<tr>
			<td align="center"><?php print $ref;?></td>
			<td align="center"><?php print $name;?></td>
			<td align="center"><?php echo $email;?></td>
			<td align="center"><?php echo $amount;?></td>
			<td align="center"><?php echo $tpsl;?></td>
			<td align="center"><?php echo $bank_ref;?></td>
			<td align="center"><?php echo $date;?></td>
		</tr>
		</tbody>
</table>

</div>

		<div class="row" style="text-align:center;padding:80">

<h6 align="center"><b>* Kindly take a screenshot of the page or note down the details as a proof of your registration.</b></h6>

<button class="btn col l2 m2 s4 white-text black lighten-1" style="position: absolute;transform:translateX(-50%)" name="action"><a href="https://synergyietevit.tk" class="white-text">Home</a></button>
		
</div>
		

</body>
</html>