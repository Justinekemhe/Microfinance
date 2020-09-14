    <?php
    session_start()
  //   if(!$_SESSION["name"]){
  //     header("Location:Login.php");
  //  }
    /*THIS CODE REMOVE Document Expired, This document is no longer available*/
  //  ini_set('session.cache_limiter','public');
  //  session_cache_limiter(false);
    ?>
<?php include 'header.php'?>
<div class="container">
<div class="card-panel hoverable">
    <div class="section">
    <?php

    include'dbconnect.php';

    //DATE FUNCTIONS FOR CURRENT DATE AND TIME
    date_default_timezone_set("Africa/Nairobi");
    $tarehe=date("Y-m-d");  
    $siku=date('l');

// $phone_number=$_SESSION["NIN"];

 if (isset($_POST["search"])){  
  $search=$_POST['itemsearched'];
  $_SESSION['searched_item']=$search;

    //SELCT DATA FROM MULTIPLE TABLE

  $query="SELECT * FROM `customer`, `loan`, `microfinance` WHERE microfinance.microfinance_id=customer.microfinance_id AND customer.customer_id=loan.customer_id AND customer.customer_id= '$search'";

   

         $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
        
        echo "<div>";
        echo "<table>";
        echo "<tr><th colspan='11' class='center-align'>RESULT</th></tr>";
        echo "<tr><th colspan='11' class='center-align'>DATE : $tarehe </th></tr>";
        echo "<tr><th colspan='11' class='center-align'>DAY : $siku  </th></tr>";
        echo "<tr><th>Customer Name</th><th>Phone Number</th><th>Microfinance Name</th><th>Status</th></tr>";
       while ($row=mysqli_fetch_assoc($result)) {
             $customer_name=$row['first_name'].'&nbsp&nbsp'.$row['last_name'];
             $phone_number=$row['phone_number'];
             $microfinance_name=$row['name'];
             $status=$row['status'];

          echo "<tr>";
             echo "<td>".$customer_name."</td>";
             echo "<td>".$phone_number."</td>";
             echo "<td>".$microfinance_name."</td>";
             echo "<td>".$status."</td>";
          echo "</tr>";
           
        } 
        echo "</table>";
        echo "</div>";
?>
          <?php
          }#END NUM ROWS 
          else{
            echo "<script>alert('STATUS')</script>";

       // IF SEARCH FAIL ALLOCATE TO THE SAME PAGE OR REFRESH PAGE
            ?>
            <script type="text/javascript">
              window.location='return.php'
            </script>
            <?php
          }
     }#search button
  ?>
  
    </div>
  </div>
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