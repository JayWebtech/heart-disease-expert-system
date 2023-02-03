<?php 
session_start();
include '../include/server.php';
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
}

$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$run = mysqli_query($dbcon,$sql);
$row = mysqli_fetch_assoc($run);
$name = $row['name'];
$gsm = $row['address'];
$state = $row['state'];
$lga = $row['lga'];
$age = $row['age'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
  	<title>Medical Diagnosis</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-icons/bootstrap-icons.css">
	<link href="../css/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../dist/css/iziToast.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sweetalert.js"></script>  
    <script src="../dist/js/iziToast.min.js" type="text/javascript"></script>
    <style type="text/css">
        
    </style>
</head>
<body>
         <script>
          //  iziToast.success({
          //     title: 'Success',
          //     message: 'Meal added to cart!',
          //     position: 'topLeft',
          //      animateInside: true,
          // });
        </script> 
   

	<section id="dash">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                   <h4 class="greeting">Hi <?php echo $name; ?></h4>
                   <p>Discover new technology to get your treated!</p>
                   <div class="box">
                       <div class="row">
                           <div class="col-4">
                               <img src="../img/beat.gif">
                           </div>
                           <div class="col-8">
                              <h6>Get diagnose and also Book Appointment with a Doctor so easy and fast</h6>
                              <a href="diagnose.php"><button class="btn btn-primary">Start Diagnosis</button> </a>
                           </div>
                       </div>
                   </div>

                   <div class="tips">
                       <h4>Tips to protect your heart</h4>
                       <ol>
                           <li>Don't smoke or use tobacco</li>
                           <li>Aim at least 30 to 60 minutes of activity daily</li>
                           <li>Eat a heart-healthy diet</li>
                           <li>Maintain a healthy weight</li>
                           <li>Get good quality sleep</li>
                           <li>Manage stress</li>
                           <li>Get regular health screenings</li>
                           <li>Check Cholesterol levels</li>
                           <li>Regular blood pressure check up</li>
                       </ol>
                   </div>
                   <div>
                       <!-- <img src="../img/beatm.gif"> -->
                   </div>
                </div>
            </div> 
        </div>
    </section>


  <div class="nav shadow-lg">
  <div onclick="home()" class="nav-item active">
      <i class="material-icons home-icon">
          home
      </i>
      <span class="nav-text">Home</span>
  </div>
  <div onclick="diagnose()" class="nav-item">
      <i class="material-icons favorite-icon">
          favorite
      </i>
      <span class="nav-text">Diagnosis</span>
  </div>
  <div onclick="history()" class="nav-item">
      <i class="material-icons toll-icon">
          toll
      </i>
      <span class="nav-text">History</span>
  </div>
  <div onclick="profile()" class="nav-item">
      <i class="material-icons person-icon">
          person
      </i>
      <span class="nav-text">Profile</span>
  </div>
</div>


<script type="text/javascript">
   const navItems = document.getElementsByClassName('nav-item');

for (let i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener('click', () => {
        for(let j = 0; j < navItems.length; j++) 
            navItems[j].classList.remove('active');
        
        navItems[i].classList.add('active');
    });
}

function home() {
    window.open('account.php','_self');
}
function diagnose() {
    window.open('diagnose.php','_self');
}
function history() {
    window.open('history.php','_self');
}
function profile() {
    window.open('profile.php','_self');
}


     
</script>
</body>
</html>