<?php

$db_name = "synergy";
$mysql_user = "root";
$mysql_pass = "x5jTegHu63HiLEa0";
$server_name = "localhost";
$con = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);



		//include_once('data_connect.php');
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$college=$_POST['college'];
		$id=$_POST['id'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$mob=$_POST['mobile'];
		$email=$_POST['email'];
		
		
		$cat = $_POST['cat'];
		if ($cat == "m")
		{
			echo 'Correct';
			$ml = 700;
		}
		else if($cat == 'nm')
		{
			$ml = 900;
		}
		else 
		{
			echo 'Incorrect';
			$ml = 0;
		}
		
		$cat2 = $_POST['cat2'];
		if ($cat2 == "m"){
			echo 'Correct';
			$vlsi = 800;
		}
		else if($cat2 == 'nm'){
			$vlsi = 1000;
		}
		else {
			echo 'Incorrect';
			$vlsi = 0;
		}
		
		$cat3 = $_POST['cat3'];
		if ($cat3 == "m"){
			echo 'Correct';
			$adw = 800;
		}
		else if($cat3 == 'nm'){
			$adw = 1000;
		}
		else {
			echo 'Incorrect';
			$adw = 0;
		}
		
		
		$cat4 = $_POST['cat4'];
		if ($cat4 == "m"){
			echo 'Correct';
			$rw = 800;
		}
		else if($cat4 == 'nm'){
			$rw = 1000;
		}
		else {
			echo 'Incorrect';
			$rw = 0;
		}
		
		
		/*$cat=$_POST['cat'];
		$cat2=$_POST['cat2'];
		$cat3=$_POST['cat3'];
		$cat4=$_POST['cat4'];  
		
		
		
		
		
		
		if(isset($_POST['cat']))
		{
			if($cat=="m"){
			$ml=700;
			}
			if($cat=="nm"){
			$ml=900;
			}  
		}
		
		if(isset($_POST['cat2']))
		{
			if($cat2=="m"){
			$vlsi=800;
			}
			if($cat2=="nm"){
			$vlsi=1000;
			}
		}
		
		
		if(isset($_POST['cat3']))
		{
			if($cat3=="m"){
			$adw=200;
			}
			if($cat3=="nm"){
			$adw=200;
			}
		}
		if(isset($_POST['cat4']))
		{
			if($cat4=="m"){
			$rw=700;
			}
			if($cat4=="nm"){
			$rw=900;
			}
		}  */
		
	
		/*
		
		if($cat=="m"){
			$ml=700;
			}
			if($cat=="nm"){
			$ml=900;
			} 
		
		if($cat2=="m"){
			$vlsi=800;
			}
			if($cat2=="nm"){
			$vlsi=1000;
			}
		
		if($cat3=="m"){
		$adw=200;
		}
		if($cat3=="nm"){
		$adw=200;
		}
		
		if($cat4=="m"){
		$rw=700;
		}
		if($cat4=="nm"){
		$rw=900;
		}  */
		
		
		
		if(isset($_POST['paper']))
		$paper=500;
		else
		$paper=0;
	
		if(isset($_POST['code']))
		$code=300;
		else
		$code=0;
	
		if(isset($_POST['guestlecture']))
		$guestlecture=1;
		else
		$guestlecture=0;	
	
		
		if(isset($_POST['cultural']))
		$cultural=350;
		else
		$cultural=0;
	
	
		if(isset($_POST['c1']))
		$c1=1450;
		else
		$c1=0;
	
		if(isset($_POST['c2']))
		$c2=1450;
		else
		$c2=0;
		
		if(isset($_POST['c3']))
		$c3=1450;
		else
		$c3=0;
	
		if(isset($_POST['c4']))
		$c4=1450;
		else
		$c4=0;
		
		
		//$amount=$paper+$project+$code+$ml+$vsli+$cultural+$c1+$c2+$c3+$c4+$web+$research;
		
		$amount=$ml+$vlsi+$adw+$rw+$paper+$code+$cultural+$c1+$c2+$c3+$c4 ;

		$sql = "Select max(ref) from payment;";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_row($res);
                $ref1 = $row[0];

                $q2 = "Select Count(trans) from payment where ref='$ref1';";
		$ans = mysqli_query($con,$q2);
		$row = mysqli_fetch_row($ans);
                $count = $row[0] + 1;

                $query="update payment set Count='$count' where ReferenceNumber='$ref1';";
		mysqli_query($con,$query);

		$refno = $ref1 + $count;
		$tran= "SYN".$refno;
		
		//$sql="INSERT INTO pre_payment values('$fname','$lname','$college','$id','$address','$city','$state','$mob','$email','$paper','$project','$code','$ml','$vlsi','$web','$research','$cutural','$c1','$c2','$c3','$c4','$amount','$refno')";
		//$sql="INSERT INTO registration(first name,last name,college,id,address,city,state,mobile,email,ml,vlsi,adw,rw,paper,code,guestlecture,cultural,amount,ref)values('$fname','$lname','$college','$id','$address','$city','$state','$mob','$email','$ml','$vlsi','$adw','$rw','$paper','$code','$guestlecture','$cultural','$amount','$refno')";
		$ee="INSERT INTO registration VALUES ('$fname','$lname','$college','$id','$address','$city','$state','$mob','$email','$ml','$vlsi','$adw','$rw','$paper','$code','$guestlecture','$cultural','$c1','$c2','$c3','$c4','$amount','$refno')";
		
mysqli_query($con,$ee);

		echo '<form id="pay" method="post" action=" https://academics.vit.ac.in/online_application2/onlinepayment/Online_pay_request1.asp">';
		echo'	
		<input type="hidden" name="id_trans" value="'.$tran.'">
		<input type="hidden" name="id_name" value="'.$fname.'">
		<input type="hidden" name="id_event" value="37">
		<input type="hidden" name="amt_event" value="'.$amount.'">
		<input type="hidden" name="id_Merchant" value="1036">
		<input type="hidden" name="id_Password" value="sff$y78jdnergy_16">';
		echo '</form>';
		
?>
<html>
<script type="text/javascript" src="static1/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
         $("#pay").submit();
    });
</script>
</html>