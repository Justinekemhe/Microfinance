<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Microfinance</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <source src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="cyan lighten-5">
  
  
  <div class="container section">
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <!-- <ul id="slide-out" class="sidenav sidenav-fixed">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
    </ul> -->
     <ul id="slide-out" class="sidenav indigo darken-4">
      <li><div class="user-view">
      <div class="background">
        <img src="sample.jpg">
      </div>
      <a href="index.php"><img class="circle" src="sample.jpg"></a>
      <a href="index.php"><span class="black-text email"><?php echo $_SESSION['name'];?></span></a>
    </div></li>
    <li><a href="list.php" class="white-text">List of Applicants</a></li>
    <li><a href="changepass.php" class="white-text">Change Password</a></li>
    <li><a href="logout.php" class="white-text">Logout</a></li>
    <li><div class="divider">Help</div></li>
    <li><a class="waves-effect white-text" href="profile.php" >About Us</a></li>
  </ul>
    

  </div>
<!-- <div class="navbar-fixed">
  <nav class="nav-wraper teal darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="microhome.php" class="brand-logo">MLMS</a>
      <ul class="right hide-on-med-and-down">
      <li><a href="list.php">List of Loan Applicants</a></li>
      <li><a href="#">Change Password</a></li>
      <li><a href="#">Help</a></li>
      Dropdown Trigger
      <li><a href="#">Logout</a></ul>

      <ul id="nav-mobile" class="sidenav">
      <li><a href="#">List of Loan Applicants</a></li>
      <li><a href="#">Change Password</a></li>
      <li><a href="#">Logout</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>  -->