
<?php 
      session_start();
    if(!$_SESSION["name"]){
       header("Location:Login.php");
    }
include "header.php";
?>
<?php 
$microfinance_id = $_SESSION['microfinance_id'];
include 'dbconnect.php';

// $query=$conn->query('select * from department');
// $rowCount=$query->num_rows;

// $query=mysqli_query($connection,"SELECT * FROM `customer`, `microfinance` WHERE customer.microfinance_id = microfinance.microfinance_id AND customer.microfinance_id='$microfinance_id'");
//   if (mysqli_num_rows($query)!=0) {
//   while($row=mysqli_fetch_array($query)) {
//     $_SESSION["customer_id"]=$row["customer_id"];
//     $_SESSION["phone_number"]=$row["phone_number"];
//     $_SESSION["NIN"]=$row["NIN"];
    
//     }
    
// }

$query1=$connection->query("SELECT * FROM `customer`, `microfinance` WHERE customer.microfinance_id = microfinance.microfinance_id AND customer.microfinance_id='$microfinance_id'");
$rowCount1=$query1->num_rows;

// $query2= $connection->query("SELECT * FROM `loan`, `customer`, `microfinance` WHERE loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id=customer.customer_id AND customer.microfinance_id=microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id'");
// $rowCount2=$query2->num_rows;

// $query3= $connection->query("SELECT * FROM `loan`, `customer`, `microfinance` WHERE loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id=customer.customer_id AND customer.microfinance_id=microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id'");
// $rowCount3=$query3->num_rows;

?>
<div class="container">
<div class="parallax-container">
      <div class="parallax"><img src="images/M2.jpeg"></div>
    </div>
    <div class="section white">
    <div class="row">
    <div class="col s6">
      <div class="card indigo darken-2">
        <div class="card-content white-text">
          <span class="card-title">Customer</span>
          <p>For new customers who are deserve to receive the Loans from your organization and qualify in your terms and condition. please click the link below Register Customer. </p>
        </div>
        <div class="card-action">
        <button data-target="modal1" class="btn modal-trigger yellow darken-2">Register Customer</button>
        <button data-target="modal2" class="btn modal-trigger yellow darken-2">Apply for Loan</button> 
        </div>
      </div>
    </div>
    <div class="col s6">
      <div class="card indigo darken-2">
        <div class="card-content white-text">
          <span class="card-title">Loan Payment</span>
          <p>This is very simple form which you supposed to fill when the customer pay the loan so by filling the form you can know the status of the customer loan</p>
        </div>
        <div class="card-action">
          <button data-target="modal3" class="btn modal-trigger yellow darken-2">Payment Form</button>
          <a href="find.php" class="btn yellow darken-2">Check for status</a> 
        </div>
      </div>
    </div>
  </div>






<div id="modal1" class="modal">
<div class="row center-align">
   <div class="col offset-s3 s6 offset-s3">
    <div class="card-panel hoverable">
      <div class="section">
        <h5 class="center">Registration Form</h5>
      </div>
      <form method="POST" action="register.php">
      <div class="row">
        <div class="input-field">
              <i class="material-icons prefix">account_circle</i>
              <input id="first_name" type="text" class="validate" name="fname" pattern="[A-Za-z]{1,15}" title="only Valid Input is allowed(letters only)" required>
            <label for="first_name">First Name</label>
             </div>
        </div>
        <div class="row">
        <div class="input-field">
              <i class="material-icons prefix">account_circle</i>
              <input id="middle_name" type="text" class="validate" name="mname" pattern="[A-Za-z]{1,15}" title="only Valid Input is allowed(letters only)" required>
            <label for="middle_name">Middle Name</label>
             </div>
        </div>
          <div class="row">
          <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input id="last_name" type="text" class="validate" name="lname" pattern="[A-Za-z]{1,15}" title="only Valid Input is allowed(letters only)" required>
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <i class="material-icons prefix">local_phone</i>
            <input id="phone_number" type="text" class="validate" name="phone_number" pattern="[0-9]{10}" title="use numbers Only" maxlength="10">
            <label for="phone_number">Phone Number</label>
          </div>
        </div>
        <div class="row">    
          <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input id="address" type="text" class="validate" name="address" required>
            <label for="address">Address</label>
             <span class="error" aria-live="polite"></span>
          </div>
        </div>
        <div class="row">    
          <div class="input-field">
            <i class="material-icons prefix">confirmation_number</i>
            <input id="nida" type="text" class="validate" name="nida" required>
            <label for="nida">NIDA</label>
             <span class="error" aria-live="polite"></span>
          </div>
        </div>
        <div class="row">    
          <div class="input-field">
            <i class="material-icons prefix">date_range</i>
            <input id="date" type="date" name="DOB" required>
            <label for="date">Date of Birth</label>
             <span class="error" aria-live="polite"></span>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
           <select name="gender" required pattern="Male|Female">
          <option value="" disabled selected>Choose Your Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          </select>
          <label>Gender </label>
          </div>
        </div>
        <!-- <div class="row">    
          <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input id="amount" type="text" class="validate" name="amount" required>
            <label for="amount">Amount</label>
             <span class="error" aria-live="polite"></span>
          </div>
        </div>
        <div class="row">
        <div class="input-field">
            <input id="date" type="date" class="validate" name="date" required>
            <label for="date">Date of Loan</label>
          </div>
        </div> -->
        <div class="row">
          <div class="input-field">
              <button class="btn yellow darken-2" type="submit" name="submit">Register</button>
          </div>
      </div>
</form>
   </div>
   </div>
   </div>
  </div>
          


  <div id="modal2" class="modal">
<div class="row center-align">
   <div class="col offset-s3 s6 offset-s3">
    <div class="card-panel hoverable">
      <div class="section">
        <h5 class="center">LOAN FORM</h5>
      </div>
      <form method="POST" action="loanreg.php">
        <div class="row">    
          <div class="input-field">
            <i class="material-icons prefix">format_list_numbered</i>
            <input id="amount" type="text" class="validate" name="amount" required>
            <label for="amount">Amount</label>
             <span class="error" aria-live="polite"></span>
          </div>
        </div>
        <div class="row">
        <div class="input-field">
        <i class="material-icons prefix">date_range</i>
            <input id="date" type="date" name="date" required>
            <label for="date">Date of Loan</label>
        </div>
        </div>
        <div class="row">
          <div class="input-field">
            <select name="customer" id="customer" required>
              <option value="">select customer</option>
              <?php
              if ($rowCount1>0) {
                while ($row=$query1->fetch_assoc()) {
                  echo '<option onclick="getcustomer"  value='.$row['customer_id'].'>'.$row['first_name']."&nbsp&nbsp". $row['last_name'].'</option>';
                }
                
              }
              else{
                echo '<option value="">You not have any Customer</option>';


              }



              ?>
              </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
              <button class="btn yellow darken-2" type="submit" name="submit">Submit</button>
          </div>
      </div>
</form>
   </div>
   </div>
   </div>
  </div>



<div id="modal3" class="modal">
<div class="row center-align">
   <div class="col offset-s3 s6 offset-s3">
    <div class="card-panel hoverable">
      <div class="section">
        <h5 class="center">PAYMENT FORM</h5>
      </div>
      <form method="POST" action="payform.php">
        <div class="row">
          <div class="input-field">
            <select name="customer" required>
            <option value="">--- Select customer ---</option>
                    <?php
                     $microfinance_id = $_SESSION['microfinance_id'];
                     $sql =mysqli_query($connection,"SELECT * FROM `loan`, `customer`, `microfinance` WHERE loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id=customer.customer_id AND customer.microfinance_id=microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id'"); 
                     while($row=mysqli_fetch_array($sql)){
                     echo "<option value='".$row['customer_id']."'>".$row['first_name']."&nbsp&nbsp". $row['last_name']."</option>";
                        }
                    ?>
              </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field">
            <select name="amount" required>
              
            </select>
          </div>
        </div>
        <div class="row">
        <div class="input-field">
        <i class="material-icons prefix">date_range</i>
            <input id="date" type="date" name="date" required>
            <label for="date">Date of Loan</label>
        </div>
        </div>
        <div class="row">
          <div class="input-field">
              <button class="btn yellow darken-2" type="submit" name="submit">Submit</button>
          </div>
      </div>
</form>
   </div>
   </div>
   </div>
  </div>

    </div>
    <div class="parallax-container">
      <div class="parallax"><img src="images/M3.png"></div>
    </div>
    </div>




    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
$( "select[name='customer']" ).change(function () {
    var customerID = $(this).val();


    if(customerID) {


        $.ajax({
            url: "ajax.php",
            dataType: 'Json',
            data: {'customer_id':customerID},
            success: function(data) {
                $('select[name="amount"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="amount"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $('select[name="amount"]').empty();
    }
});
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
    $('.tap-target').tapTarget();
  });

    $(document).ready(function(){
    $('.parallax').parallax();
  });
   
   $(document).ready(function(){
    $('.datepicker').datepicker();
  });

   $(document).ready(function(){
    $('.sidenav').sidenav();
   })

  //  $(document).ready(function(){
  //  $(".dropdown-trigger").dropdown();

  // })
    $('.slider').slider({
    full_width: false,
    interval:5000,
    transition:800,
  })


  $(document).ready(function() {
    $('select').material_select();
  });

  </script>
  </body>
</html>