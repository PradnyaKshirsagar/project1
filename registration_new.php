<?php

require_once("lib/function.php");
$db = new login_function();

$email_error = "";
$email = "";
$password_error = "";
$flag = 0;
$var_full_name = "";
$var_email = "";
$var_password = "";
$var_mo_no = "";
$var_address = "";
$succ_flag=0;

if (isset($_POST['submit_btn'])) {
      $var_full_name = $_POST['full_name'];
	  $var_mo_no = $_POST['mo_no'];
	  $var_address=$_POST['address'];
      $var_email = $_POST['email'];
      $var_password = $_POST['password'];
      
      if($db->add_new_registration($var_full_name,$var_mo_no,$var_address,$var_email,$var_password))
	  {
		  
$whatsapp_message = "*DREAM TECHNOLOGY* 
\n\n

Dear $var_full_name, Thank You For Joining With Us

 \n\n _Note : This Is Automatic System Generated WhatsApp Message. Do Not Reply_";

$url =	"http://wapi.tagdigitalsolutions.com/wapp/api/send?apikey=cc45bb77c10d47408bf00bd484ec54ef&mobile=$var_mo_no&msg=".urlencode($whatsapp_message);


echo file_get_contents($url);
		  
?>
<script>
	alert("Registered successfully");
</script>
<?php		  
	  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width initial-scale=1.0">
      <title>EV Charging</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <link href="css/line-awesome.min.css" rel="stylesheet" />
      <link href="css/themify-icons.css" rel="stylesheet" />
      <link href="css/animate.min.css" rel="stylesheet" />
      <link href="css/toastr.min.css" rel="stylesheet" />
      <link href="css/bootstrap-select.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
      <link href="css/main.min.css" rel="stylesheet" />
      <style>
      .col-md-6 {
            margin: auto;
            margin-top: 50px;
      }

      @media only screen and (max-width: 500px) {
            .col-md-6 {
                  margin: 30px;
            }
      }
      </style>

      <script>
      function validateForm() {
            var x = document.forms["myForm"]["email"].value;
            var y = document.forms["myForm"]["password"].value;
            if (x == "") {
                  alert("Enter Username");
                  return false;
            }
            if (y == "") {
                  alert("Enter Password");
                  return false;
            }
      }
      </script>
</head>

<html>

<body class="fixed-navbar">

      <div class="row">
            <div class="col-md-6">
                  <div class="ibox">
                        <form class="form-pink" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="myForm"
                              onsubmit="return validateForm()" autocomplete="off">
                              <?php
                              if($password_error == 1)
							  {
                              ?>
                              <div class="alert alert-danger">
                                    <span class="alert-link">Please!</span> Enter Correct Password.
                              </div>
                              <?php
                              }
                              ?>

                              <div class="ibox-head">
									<div class="ibox-title">REGISTRATION</div>
                              </div>
                              <div class="ibox-body">
                                    <!-- <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-user"></i></span>
                                                <label for="floatingInput"></label>
                                                <input class="form-control form-control-air" type="text"
                                                      name="full_name" placeholder="Enter name"
                                                      value="<?php echo $var_full_name; ?>">
                                                <p style="color:red;">
                                                      <?php echo $var_full_name; ?>
                                                </p>

                                          </div>
                                    </div>
                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-user"></i></span>
                                                <label for="floatingInput"></label>
                                                <input class="form-control form-control-air" type="number" name="mo_no"
                                                      placeholder="mobile number" value="<?php echo $var_mo_no; ?>">
                                                <p style="color:red;">
                                                      <?php echo $var_mo_no; ?>
                                                </p>

                                          </div>
                                    </div>
                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-user"></i></span>
                                                <label for="floatingInput"></label>
                                                <input class="form-control form-control-air" type="text" name="address"
                                                      placeholder="address" value="<?php echo $var_address; ?>">
                                                <p style="color:red;">
                                                      <?php echo $var_address; ?>
                                                </p>

                                          </div>
                                    </div> -->

                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-user"></i></span>
                                                <input class="form-control form-control-air" type="text"
                                                      name="full_name" placeholder="Enter Full Name"
                                                      value="<?php echo $var_full_name; ?>">
                                               
                                          </div>
                                    </div>
                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-user"></i></span>
                                                <input class="form-control form-control-air" type="number" name="mo_no"
                                                      placeholder="Enter Mobile Number"
                                                      value="<?php echo $var_mo_no; ?>">
                                                
                                          </div>
                                    </div>
                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-user"></i></span>
                                                <input class="form-control form-control-air" type="text" name="address"
                                                      placeholder="Enter Address" value="<?php echo $var_address; ?>">
                                               
                                          </div>
                                    </div>
                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-user"></i></span>
                                                <input class="form-control form-control-air" type="email" name="email" placeholder="Enter Email ID" value="<?php echo $email; ?>">
                                                
                                          </div>
                                    </div>
                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-lock"></i></span>
                                                <input class="form-control form-control-air" type="password"
                                                      name="password" placeholder="Enter Password">
                                                
                                          </div>
                                    </div>


                              </div>

                              <div class="ibox-footer"><button class="btn btn-pink btn-air mr-2" type="submit"
                                          name="submit_btn">
                                          Submit</button>

                                    <a href="user_login.php" class="input-span"
                                          style="float:right;text-decoration:underline;">Already Registered ?</a>
                              </div>
                        </form>
                  </div>
            </div>
      </div>


      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/metisMenu.min.js"></script>
      <script src="js/jquery.slimscroll.min.js"></script>
      <script src="js/idle-timer.min.js"></script>
      <script src="js/toastr.min.js"></script>
      <script src="js/jquery.validate.min.js"></script>
      <script src="js/bootstrap-select.min.js"></script>
      <!-- PAGE LEVEL PLUGINS-->
      <!-- CORE SCRIPTS-->
      <script src="js/app.min.js"></script>
      <!-- PAGE LEVEL SCRIPTS-->
</body>

</html>
