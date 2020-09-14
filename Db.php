<?php
  session_start();
  if(!$_SESSION["name"]){
    header("Location:Login.php");
 }
 include 'dbconnect.php';
//   $select=mysqli_query($connection,"SELECT * FROM `customer`");
//   while($row=mysqli_fetch_array($select))
//   {
//    echo "<option value=".$row['customer_id'].">".$row['first_name']."</option>";
//   }
 ?>
 <html>
<head>
<source src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body> 
<div class="row center-align">
      <div class="section">
        <h5 class="center">PAYMENT FORM</h5>
      </div>
      <form method="POST" action="payform.php">
        <div class="row">
          <div class="input-field">
                <select name="customer" class="form-control">
                    <option value="">--- Select customer ---</option>
                    <?php
                        $microfinance_id = $_SESSION['microfinance_id'];
                        $sql =mysqli_query($connection,"SELECT * FROM `loan`, `customer`, `microfinance` WHERE loan.microfinance_id=microfinance.microfinance_id AND loan.customer_id=customer.customer_id AND customer.microfinance_id=microfinance.microfinance_id AND microfinance.microfinance_id='$microfinance_id'"); 
                        while($row=mysqli_fetch_array($sql)){
                            echo "<option value='".$row['customer_id']."'>".$row['first_name']."</option>";
                        }
                    ?>
                </select>

                <select name="amount" class="form-control" style="width:350px">
                </select>

</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

<script>
// Material Select Initialization
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });

  $(document).ready(function(){
    $('.sidenav').sidenav();
   });

   $(document).ready(function(){
   $(".dropdown-trigger").dropdown();

  });

  $(document).ready(function(){
    $('.parallax').parallax();
  });
   

 $(document).ready(function() {
    $('select').material_select();
  });
  
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
</script>
</body>
</html>


