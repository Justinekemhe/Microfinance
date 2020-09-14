
<?php 
session_start();
if(!$_SESSION["name"]){
header("Location:Login.php");
    }?>
<?php include'header.php'?>

<?php include'dbconnect.php'?>

<?php
if (isset($_POST['submit'])) {
  $oldpassword=md5($_POST['oldpassword']);
  $newpassword= md5($_POST['newpassword']);
  $repeatpassword=md5($_POST['repeatpassword']);
  
  $microfinance_id=$_SESSION["microfinance_id"];
  $query="SELECT * FROM microfinance where microfinance_id='$microfinance_id'";

  $result= mysqli_query($connection,$query);
  if (!$result) {
  die("the connection not well edited <br>".mysqli_connect_error());
}
else{
  // while ($row=mysqli_fetch_assoc($result)) {
  //   $dbpassword = $row['password'];
  // }
  $row = mysqli_fetch_array($result);
  $dbpassword = $row['password'];
  if ($dbpassword == $oldpassword AND $newpassword  == $repeatpassword) {
    $query1="UPDATE microfinance set password ='$newpassword' WHERE microfinance_id='$microfinance_id'";
    $result1=mysqli_query($connection,$query1);
    echo "<script>alert('password changed')</script>";
  }
  else{
     echo "<script>alert('password not changed')</script>";
  }
}
}
?>

      <div class="row">
        <!-- <div class="col s12 l3"></div> -->
        <div class="col s12 l12">
          <div class="card-panel hoverable">
            <div class="section">
              <h5 class="center">Change Your Password</h5>
            </div>
            <form method="POST" action="changepassadmin.php">
              <div class="input-field">
                <input type="password" id="oldpassword" name="oldpassword">
                <label for="oldpassword" class="active">Old Password</label>
              </div>
              <div class="input-field">
                <input type="password" id="newpassword" name="newpassword">
                <label for="newpassword" class="active">New Password</label>
              </div>
                <div class="input-field">
                <input type="password" id="repeatpassword" name="repeatpassword">
                <label for="repeatpassword" class="active">Repeat Password</label>
              </div>
              <div class="section">
              </div>
              <div class="input-field">
                <button class="btn yellow darken-4" type="submit" name="submit">Change Your Password</button>
              </div>
            </form>
          </div>
        </div>
        <!-- <div class="col s12 l6"></div> -->
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