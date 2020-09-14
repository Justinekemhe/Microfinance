<?php 
     session_start();
    if(!$_SESSION["name"]){
       header("Location:Login.php");
    }

$microfinance_id = $_SESSION['microfinance_id'];
include"dbconnect.php";

// $query="SELECT * FROM `customer`, `microfinance` WHERE customer.microfinance_id = microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id";
//   $result = mysqli_query($connection, $query);

//   if (mysqli_num_rows($result)!=0) {
//   while($row=mysqli_fetch_array($result)) {
//     $_SESSION["NIN"]=$row["NIN"];
//     }
    
// }


$query2=$connection->query("SELECT * FROM `customer`, `microfinance` WHERE customer.microfinance_id = microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id'");
$rowCount2=$query2->num_rows;


?>
<?php include 'header.php'?>
<div class="container">
<div class="card-panel hoverable">
    <div class="section">
      <table>
          <tr bgcolor="#004d40">
         <td colspan="8" class="indigo darken-4 white-text center-align">SEARCH FOR STATUS OF APPLICANTS LOAN</td>

         </tr>
    </table>
        <form role='search' action="searched.php" method="POST">
           <div class="row">
            <div class="input-field col s6">
               <select name="itemsearched" id="customer" required>
              <option value="">Customer</option>
              <?php
              if ($rowCount2>0) {
                while ($row1=$query2->fetch_assoc()) {
                  $_SESSION['NIN']=$row1["NIN"];

                  echo '<option onclick="getcustomer"  value='.$row1['customer_id'].'>'.$row1['first_name']."&nbsp&nbsp". $row1['last_name']."&nbsp&nbsp". $_SESSION['NIN'].'</option>';
                }
                
              }
              else{
                echo '<option value="">You not have any Customer</option>';


              }



              ?>
              </select>
            <!--  <input type="text" class="black-text" placeholder="Enter item to search" name="itemsearched" required> -->
           </div>
           <div class="input-field col s6">
              <button type="submit" class="btn yellow darken-2" name="search">SEARCH</button>
            </div>
           </div>
             
        </form>


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