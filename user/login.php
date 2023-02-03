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
                    <h3>Log into <br><span>Account</span></h3>
                    <p>Input details correctly to login </p>
                    <form id="formadd" name="form1" method="post" enctype="multipart/form-data">
                    <div class="form">
                       
                       <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control">
                       <br>
                       <input type="password" name="pword" id="pword" placeholder="Enter your password" class="form-control">
                       <br>
                      
                                                 <button class="btn btn-primary btn-block btn-lg" id="save"><span class="bi bi-lock" id="lock" style="color: #000 !important"></span> <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width: 20px; height: 20px;display: none;color: #000 !important;"></span> Login</button>  
                                                 <p>Do not have an account? <a href="index.php" style="color: aqua;">Create account</a></p>
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
                
                if (email !== "" || pword !== "") {
                    $.ajax({
                        method: "POST",
                        url: "login_script.php",
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