<?php session_start();?>

<?php
include 'dbconnect.php';
$first_name=$_POST["fname"];
$middle_name=$_POST["mname"];
$last_name=$_POST["lname"];
$phone_number=$_POST["phone_number"];
$address =  $_POST['address'];
$nida = $_POST['nida'];
$DOB = $_POST['DOB'];
$gender =  $_POST['gender'];
$microfinance_id=$_SESSION['microfinance_id'];

$sql="SELECT * FROM `customer`, `microfinance` WHERE customer.microfinance_id= microfinance.microfinance_id AND microfinance.microfinance_id= '$microfinance_id' AND customer.NIN= '".$nida."'";

$result=mysqli_query($connection,$sql);
$num=mysqli_num_rows($result);

if ($num!=0) {
    echo "<script> alert('User already exist in your Microfinance');
    window.location.href='index.php';</script>";
}

else{


$query="INSERT INTO `customer` (`customer_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `address`, `NIN`, `DOB`, `gender`, `status`, `microfinance_id`) VALUES (NULL, '$first_name', '$middle_name', '$last_name', '$phone_number', '$address', '$nida', '$DOB', '$gender', NULL,'$microfinance_id')";
 
$query_run=mysqli_query($connection,$query);


if ($query_run) {

     				echo '<script type="text/javascript"> alert("Customer is Registered") </script>';
     				
                ?>
                         <script type="text/javascript">
                           window.location='index.php';
                         </script>
                         <?php
                     }
     			else
     			{
     				echo '<script type="text/javascript"> alert("Customer is not Registered") </script>'.mysqli_error($connection);
     			}
            }


?>