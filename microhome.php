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

$query1=$connection->query("SELECT * FROM `customer`, `microfinance` WHERE customer.microfinance_id = microfinance.microfinance_id AND customer.microfinance_id='$microfinance_id'");
$rowCount1=$query1->num_rows;

$query2= $connection->query("SELECT * FROM `loan`, `customer`, `microfinance` WHERE loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id=customer.customer_id AND customer.microfinance_id=microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id'");
$rowCount2=$query2->num_rows;

$query3= $connection->query("SELECT * FROM `loan`, `customer`, `microfinance` WHERE loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id=customer.customer_id AND customer.microfinance_id=microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id'");
$rowCount3=$query3->num_rows;

?>
<div class="section">
<h6 class="center-align blue-text">Welcome <?php echo $_SESSION['name'];?></h6>
<div class="section">
<div class="container">
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
          <a href="search.php" class="btn yellow darken-2">Check for status</a> 
        </div>
      </div>
    </div>
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
            <i class="material-icons prefix">account_circle</i>
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
            <i class="material-icons prefix">account_circle</i>
            <input id="nida" type="text" class="validate" name="nida" required>
            <label for="nida">NIDA</label>
             <span class="error" aria-live="polite"></span>
          </div>
        </div>
        <div class="row">    
          <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input id="date" type="text" class="datepicker" name="DOB" required>
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
            <i class="material-icons prefix">account_circle</i>
	          <input id="amount" type="text" class="validate" name="amount" required>
	          <label for="amount">Amount</label>
             <span class="error" aria-live="polite"></span>
	        </div>
        </div>
        <div class="row">
        <div class="input-field">
            <input id="date" type="text" class="datepicker" name="date" required>
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
            <select name="customer" id="customer" required>
              <option value="">Customer</option>
              <?php
              if ($rowCount2>0) {
                while ($row1=$query2->fetch_assoc()) {
                  echo '<option onclick="getcustomer"  value='.$row1['customer_id'].'>'.$row1['first_name'].'</option>';
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
            <select name="amount" id="amount" required>
              <option value="">Amount</option>
              <?php
              if ($rowCount3>0) {
                while ($row3=$query3->fetch_assoc()) {
                  echo '<option onclick="getamount"  value='.$row3['loan_id'].'>'.$row3['amount'].'</option>';
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
            <input id="date" type="text" class="datepicker" name="date" required>
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


<div class="container">
<footer class="page-footer indigo darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Group Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of Six students(Two ETE, Two ICSE and  Two From EMos)  working on this project like it's our full time job. Team work and Time management making us to finish the Project early.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Team and Role Played</h5>
          <ul>
            <li><a class="white-text" href="profile.php">Click to see Full Profile</a></li>
          </ul>
          
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="white-text text-lighten-3" href="#">Group N0. 03</a>
      </div>
    </div>
  </footer>

</div>














<!-- <footer class="page-footer orange">
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="#">Group N0. 03</a>
      </div>
    </div>
  </footer> -->


  <!--  Scripts -->
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
    $('.tap-target').tapTarget();
  });
   
   $(document).ready(function(){
    $('.datepicker').datepicker();
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