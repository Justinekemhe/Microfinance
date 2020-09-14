<?php session_start();?>

<?php
include 'dbconnect.php';
$amount=$_POST["amount"];
$date=$_POST["date"];
$customer_id=$_POST["customer"];
$microfinance_id=$_SESSION['microfinance_id'];


$query="INSERT INTO `loan` (`loan_id`, `amount`, `date`, `customer_id`, `microfinance_id`, `status`) VALUES (NULL, '$amount', '$date', '$customer_id', '$microfinance_id', 'Not Paid')";
 
$query_run=mysqli_query($connection,$query);

$query2="UPDATE `customer` SET status='NOT PAID' WHERE customer_id='$customer_id'";
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