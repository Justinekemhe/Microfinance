<?php


   require('dbconnect.php');

   // SELECT * FROM `loan`, `customer`, `microfinance` WHERE loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id=customer.customer_id AND customer.microfinance_id=microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id'
   // $sql = "SELECT * FROM loan
   //       WHERE customer_id LIKE '%%'"; 
   $sql =mysqli_query($connection,"SELECT * FROM `loan`, `customer`, `microfinance` WHERE loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id=customer.customer_id AND customer.microfinance_id=microfinance.microfinance_id AND loan.customer_id='".$_GET['customer_id']."'"); 
   $json = [];
   while($row=mysqli_fetch_array($sql)) {
        $json[$row['loan_id']] = $row['amount'];
   }


   echo json_encode($json);
?>