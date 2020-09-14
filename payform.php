<?php session_start();?>

<?php
include 'dbconnect.php';
$amount=$_POST["amount"];
$date=$_POST["date"];
$customer_id=$_POST["customer"];
$microfinance_id=$_SESSION['microfinance_id'];


$query="INSERT INTO `payment` (`payment_id`, `date`, `amount`, `customer_id`, `microfinance_id`, `loan_id`) VALUES (NULL, '$date', '$amount', '$customer_id', '$microfinance_id', '$amount')";
 
$query_run=mysqli_query($connection,$query);

$query2="UPDATE `loan` SET status='PAID' WHERE loan_id='$amount'";
$query_run1=mysqli_query($connection,$query2);


if ($query_run1!=NULL AND $query_run!=NULL) {

     				echo '<script type="text/javascript"> alert("Loan Inserted") </script>';
     				
                ?>
                         <script type="text/javascript">
                           window.location='index.php';
                         </script>
                         <?php
                     }
     			else
     			{
     				echo '<script type="text/javascript"> alert("Loan not Inserted") </script>'.mysqli_error($connection);
     			}


?>
