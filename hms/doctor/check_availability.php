<?php 
require_once("include/config.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
$result =mysqli_query($con,"SELECT PatientEmail FROM tblpatient WHERE PatientEmail='$email'");
$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Email đã tồn tại .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email có sẵn để đăng ký.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>