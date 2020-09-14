
<?php 
session_start();
    if(!$_SESSION["name"]){
       header("Location:Login.php");
    }
include 'header.php';
include 'dbconnect.php';

$microfinance_id = $_SESSION['microfinance_id'];
$result = mysqli_query($connection, "SELECT * FROM `customer`, `microfinance`, `loan` WHERE customer.microfinance_id = microfinance.microfinance_id AND loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id = customer.customer_id AND customer.microfinance_id='$microfinance_id'");
?>

<div class="container">
<div class="card-panel hoverable">
    <div class="section">

      <!--   Icon Section   -->
      <table border="1">
        <thead>
          <tr bgcolor="#004d40">
         <td colspan="8" class="indigo darken-4 white-text center-align">List of Applicants</td>

         </tr>
          <tr>
              <th>Name</th>
              <th>Age</th>
              <th>Mobile</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Status of Loan</th>
              <!--<th>action</th>-->
          </tr>
        </thead>
        <?php 
  //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
  while($row = mysqli_fetch_assoc($result)) {
  $currentyear = strtotime(date("Y-m-d"));
  $birthdate   = strtotime($row['DOB']);   
  $age = (int)(($currentyear- $birthdate)/60/60/24/30/12); 
    echo "<tr>";
    echo "<td>".$row['first_name'].'&nbsp&nbsp'.$row['last_name']."</td>";
    echo "<td>".$age."</td>"; 
    echo "<td>".$row['phone_number']."</td>"; 
    echo "<td>".$row['address']."</td>"; 
    echo "<td>".$row['gender']."</td>"; 
    echo "<td>".$row['status']."</td>"; 
  }
  ?>
  </table>
  <form method="POST" action="print_all.php">
<!-- 
            <button type="submit" class="center-align" name="PRINT" value="PRINT">PRINT</button> -->
            <div class="input-field col s6 center-align">
              <input type="submit" class="btn teal darken-4" name="PRINT" value="PRINT">
            </div>
           </form>
      <br>
     </div>
</div>
</div>


<!-- <?php include'../footer.php'?> -->