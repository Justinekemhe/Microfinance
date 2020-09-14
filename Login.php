<?php include "header2.php";
?>
<?php session_start();
unset($_SESSION['name']);
?>

<?php
$error=array();

//include database connection
include 'dbconnect.php';
if(isset($_POST["submit"]))
{
  $name=stripcslashes($_POST["name"]);
  $password=stripcslashes($_POST["password"]);
  if (empty($name)) {
    array_push($error, "please enter your username");
}

  if (empty($password)) {
    array_push($error, "password required");
  }

  //check for error counted
  if (count($error)== 0) {
    $password = md5($password);
 

  $query="SELECT * FROM microfinance WHERE name='$name' AND password='$password'";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result)!=0) {




  while($row=mysqli_fetch_array($result)) {

    $db_username=$row["name"];
      
    $_SESSION["microfinance_id"]=$row["microfinance_id"];
    $_SESSION["name"]=$row["name"];
    $_SESSION["name"]=$db_username;
    $_SESSION["role"]=$row["role"];

    if($_SESSION["role"]=='admin'){
      header("Location:index.php");
    }
    
}
}
    else array_push($error, "your not registerd");
}

}
?>
<div class="container">
<div class="section no-pad-bot" id="index-banner">
<div class="row">
        <div class="col s12 l6">
    <div class="slider">
    <ul class="slides"> 
      <li>
        <img src="images/M1.jpg">
        <div class="caption left-align"> 
        </div>
      </li>
       <li>
        <img src="images/M2.jpeg">
        <div class="caption left-align">
          <h3 class="blue-text"></h3>
          <h5 class="black-text text-yellow darken-2"></h5> 
        </div>
      </li>
      <li>
        <img src="images/M3.png">
        <div class="caption left-align">
          <h3 class="blue-text"></h3>
          <h5 class="black-text text-lighten-4"></h5> 
        </div>
      </li>
  </ul>
  </div>

        </div>
        <div class="col s12 l6">
            <div class="section">
              <h5 class="center">Login Here</h5>
            </div>
            <form method="POST" action="Login.php">
            <?php if (count($error)>0) {
                foreach ($error as $value) {
                  echo '<p class="red-text" >'.$value.'</p>';
                }
              }  ?>
            <div class="input-field">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate" name="name">
              <label for="icon_prefix" class="black-text">Username</label>
             </div>
              <br>
              <div class="input-field">
                <i class="material-icons prefix">https</i>
                <input type="password" id="password" name="password">
                <label for="password" class="black-text">Password</label>
              </div>
              <br>
              <div class="input-field">
                <button class="btn-large center-align waves-effect waves-light yellow darken-2" type="submit" name="submit">Login</button>
              </div>
            </form>
          </div>
       

      </div>
      </div>
     </div> 

     <!-- <footer class="page-footer orange">
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="#">Group N0. 03</a>
      </div>
    </div>
  </footer> -->


  <!--  Scripts-->
  <<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
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
