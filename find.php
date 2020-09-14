<?php
session_start();
$microfinance_id=$_SESSION['microfinance_id'];
include "dbconnect.php";
date_default_timezone_set("Africa/Nairobi");
    $tarehe=date("Y-m-d");  
    $siku=date('l');

$sql = "SELECT * FROM `customer`, `microfinance` WHERE customer.microfinance_id = microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id'";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($connection, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM `customer`, `loan`, `microfinance` WHERE microfinance.microfinance_id=customer.microfinance_id AND customer.customer_id=loan.customer_id AND customer.NIN= '$name'";
}
$result = $connection->query($sql);
?>
<?php include 'header.php'?>
<div class="container">
<label class="black-text">Search</label>
<form action="" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn yellow darken-2">
</form>
<table class="striped">
        <?php echo "<tr><th colspan='11' class='center-align'>DATE : $tarehe </th></tr>";?>
        <?php echo "<tr><th colspan='11' class='center-align'>DAY : $siku  </th></tr>";?>
<tr>
<th>NIDA NUMBER</th>
<th>First name</th>
<th>Lastname</th>
<th>Address</th>
<th>Microfinance Name</th>
<th>Status</th>
</tr>
<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['NIN']; ?></td>
    <td><?php echo $row['first_name']; ?></td>
    <td><?php echo $row['last_name']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['status']; ?></td>
    </tr>
    <?php
}
?>
</table>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var elems = document.querySelectorAll('.modal');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery


  $(document).ready(function(){
    $('select').formSelect();
      });
  $(document).ready(function(){
    $('.modal').modal();
  });
   

   $(document).ready(function(){
    $('.sidenav').sidenav();
   })

   $(document).ready(function(){
   $(".dropdown-trigger").dropdown();

  })
    $('.slider').slider({
    full_width: false,
    interval:5000,
    transition:800,
  })

  $(document).ready(function() {
    $('select').material_select();
  });

  //this is a js function to load regions\ of a particular country

  </script>
  </body>
</html>