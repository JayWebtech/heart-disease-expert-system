<?php 
session_start();
include '../include/server.php';
if (isset($_SESSION['email'])) {
    header('Location: account.php');
}
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
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sweetalert.js"></script>  
    <script src="../dist/js/iziToast.min.js" type="text/javascript"></script>
    <style type="text/css">
        body{
          background-color: #153097;
          background-image: url('../img/footer-map.png');
        }
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
   

	<section id="login">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div style="margin-top: 45px;">
                        <a href="../index.php" style="color: #fff;text-decoration:none;"><span class="bi bi-arrow-left"></span> Go Back</a>
                    </div>
                    <h3>Create <br><span>Account</span></h3>
                    <p>Input your details to create account </p>
                    <form id="formadd" name="form1" method="post" enctype="multipart/form-data">
                    <div class="form">
                       <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control">
                       <br>
                       <input type="tel" name="gsm" id="gsm" placeholder="Enter your phone number" class="form-control">
                       <br>
                       <input type="text" name="address" id="address" placeholder="Enter your address" class="form-control">
                       <br>
                       <input type="number" name="age" id="number" placeholder="Enter your age" class="form-control">
                       <br>
                       <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control">
                       <br>
                       <input type="password" name="pword" id="pword" placeholder="Enter your password" class="form-control">
                       <br>
                       <select onchange="toggleLGA(this);" name="state" id="state" class="form-control">
                                                    <option value="" selected="selected">- Select State -</option>
                                                    <option value="Abia">Abia</option>
                                                    <option value="Adamawa">Adamawa</option>
                                                    <option value="AkwaIbom">AkwaIbom</option>
                                                    <option value="Anambra">Anambra</option>
                                                    <option value="Bauchi">Bauchi</option>
                                                    <option value="Bayelsa">Bayelsa</option>
                                                    <option value="Benue">Benue</option>
                                                    <option value="Borno">Borno</option>
                                                    <option value="Cross River">Cross River</option>
                                                    <option value="Delta">Delta</option>
                                                    <option value="Ebonyi">Ebonyi</option>
                                                    <option value="Edo">Edo</option>
                                                    <option value="Ekiti">Ekiti</option>
                                                    <option value="Enugu">Enugu</option>
                                                    <option value="FCT">FCT</option>
                                                    <option value="Gombe">Gombe</option>
                                                    <option value="Imo">Imo</option>
                                                    <option value="Jigawa">Jigawa</option>
                                                    <option value="Kaduna">Kaduna</option>
                                                    <option value="Kano">Kano</option>
                                                    <option value="Katsina">Katsina</option>
                                                    <option value="Kebbi">Kebbi</option>
                                                    <option value="Kogi">Kogi</option>
                                                    <option value="Kwara">Kwara</option>
                                                    <option value="Lagos">Lagos</option>
                                                    <option value="Nasarawa">Nasarawa</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Ogun">Ogun</option>
                                                    <option value="Ondo">Ondo</option>
                                                    <option value="Osun">Osun</option>
                                                    <option value="Oyo">Oyo</option>
                                                    <option value="Plateau">Plateau</option>
                                                    <option value="Rivers">Rivers</option>
                                                    <option value="Sokoto">Sokoto</option>
                                                    <option value="Taraba">Taraba</option>
                                                    <option value="Yobe">Yobe</option>
                                                    <option value="Zamfara">Zamafara</option>
                                                </select>
                                                <br>
                                                <select name="lga" id="lga" class="form-control select-lga" required>
                                                    <option>- Select Local Government -</option>
                                                 </select> 
                                                 <br>
                                                 <button class="btn btn-primary btn-block btn-lg" id="save"><span class="bi bi-lock" id="lock" style="color: #000 !important"></span> <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width: 20px; height: 20px;display: none;color: #000 !important;"></span> Create account</button>  
                                                 <p>Already have account? <a href="login.php" style="color: aqua;">Login Here</a></p>
                    </div>
                </form>
                </div>
            </div> 
        </div>
    </section>
    <br>
<script src="../js/lga.min.js"></script>	
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

//SIGN UP

 $(document).on('submit','#formadd', function(e){
                e.preventDefault();
                $("#save").attr("disabled", "disabled");
                $("#spinner").show();
                var email = $('#email').val();
                var pword = $("#pword").val();
                var name = $('#name').val();
                var gsm = $("#gsm").val();
                var age = $('#age').val();
                var state = $("#state").val();
                var lga = $('#lga').val();
                var address = $("#address").val();
              
                
                if (email !== "" || pword !== "" || name !== "" || gsm !== "" || age !== "" || state !== ""|| lga !== "" || address !== "") {
                    $.ajax({
                        method: "POST",
                        url: "account_script.php",
                        data: $(this).serialize(),
                        success: function(data){
                          
                              if (data=="success") {
                                    window.open('account.php','_self');
                              }else{
                                    $("#save").removeAttr("disabled");
                                    $("#spinner").hide();
                                    iziToast.error({
                                    title: '',
                                    message: data,
                                    position: 'topCenter',
                                    animateInside: true,
                                });
                              }
                            }
                        });
                }else{

                                $("#save").removeAttr("disabled");
                                $("#spinner").hide();
                                iziToast.error({
                                    title: '',
                                    message: "All fields are required!",
                                    position: 'topCenter',
                                    animateInside: true,
                                });

                }
               
            });


//END OF SIGN UP

  });
     
</script>
</body>
</html>