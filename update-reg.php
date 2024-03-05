<?php

require_once("lib/function.php");
$db = new login_function();

if (!isset($_SESSION['current_login_admin'])) {
      header("Location:index.php");
}
if (isset($_GET['update_id'])) {
      $update_id = $_GET['update_id'];
      $_SESSION['update_id'] = $update_id;
      $success_msg = 1;
}

$update_id = $_SESSION['update_id'];

$email_error = "";
$email = "";
$password_error = "";
$flag = 0;
$var_full_name = "";
$var_email = "";
$var_password = "";
$var_mo_no = "";
$var_address = "";

if (isset($_POST['submit_btn'])) {
      $var_full_name = $_POST['full_name'];
	  $var_mo_no = $_POST['mo_no'];
	  $var_address = $_POST['address'];
      $var_email = $_POST['email'];
      $var_password = $_POST['password'];
     
      
      // echo $var_full_name,$var_email, $var_password,$var_date;
      $db->add_new_registration($var_full_name,$var_mo_no,$var_address,$var_email,$var_password);



      if ($flag == 0) {

            $db->update_user_record($var_full_name,$var_mo_no, $var_address,$var_email, $var_password,  $update_id);
            $success_msg = 1;
      }


}

$std_data = array();
$std_data = $db->get_register_update_data($update_id);

if (!empty($std_data)) {
      $var_full_name = $std_data[1];
	  $var_mo_no = $std_data[2];
	   $var_address = $std_data[3];
      $var_email = $std_data[4];
      $var_password = $std_data[5];
      
     
      $res_date = $std_data[6];
      $res_time = $std_data[7];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width initial-scale=1.0">
      <title>registration page</title>
      <!-- GLOBAL MAINLY STYLES-->
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <link href="css/line-awesome.min.css" rel="stylesheet" />
      <link href="css/themify-icons.css" rel="stylesheet" />
      <link href="css/animate.min.css" rel="stylesheet" />
      <link href="css/toastr.min.css" rel="stylesheet" />
      <link href="css/bootstrap-select.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

      <!-- PLUGINS STYLES-->
      <!-- THEME STYLES-->
      <link href="css/main.min.css" rel="stylesheet" />
      <!-- PAGE LEVEL STYLES-->
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
      <!-- <div class="col-md-6" style="width:100%; margin:auto;">
            //<img src="logo.png" width="100%" height="100%" style="margin-top:100px;">
      </div> -->
      <?php include('header.php'); ?>
      <?php include('side-bar.php'); ?>
	  <br/>
	  <br/>
	  
      <div class="row">
            <div class="col-md-6">
                  <div class="ibox">
				  
                        <form class="form-pink" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="myForm"
                              onsubmit="return validateForm()" autocomplete="off">

                              <!-- <?php
                              if ($password_error == 1) {
                                    ?>
                              <div class="alert alert-danger">
                                    <span class="alert-link">Please!</span> Enter Correct Password.
                              </div>
                              <?php
                              }
                              ?> -->
							  <br/>
							  <br/>


      <center>                       <div class="ibox-head">
			<div class="ibox-title"><i class="fas fa-user-tie" style="margin-right:10px;"></i>Update</div>
		</div>
                              <div class="ibox-body">


                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-user"></i></span>
                                                <input class="form-control form-control-air" type="text"
                                                      name="full_name" placeholder="Enter Full Name"
                                                      value="<?php echo $var_full_name; ?>">
                                                <!-- <p style="color:red;">
                                                      
                                                </p> -->
                                          </div>
                                    </div>
                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-user"></i></span>
                                                <input class="form-control form-control-air" type="text" name="mo_no"
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
                                                <input class="form-control form-control-air" type="text" name="email"
                                                      placeholder="Enter Email ID" value="<?php echo $var_email ; ?>">

                                          </div>
                                    </div>
                                    <div class="form-group mb-4">
                                          <div class="input-group-icon input-group-icon-left">
                                                <span class="input-icon input-icon-left"><i
                                                            class="fas fa-lock"></i></span>
                                                <input class="form-control form-control-air" type="password"
                                                      name="password" placeholder="Enter Password" value="<?php echo $var_password ; ?>">

                                          </div>
                                    </div>


                              </div>
							  </center>

                              <div class="ibox-footer">
                                    <button class="btn btn-pink btn-air mr-2" type="submit" name="submit_btn">Update
                                    </button>
                                    <center><a href="user_report.php" style="color:red;font-weight:bold;">Back
                                                To List</a></center>
                                    <!-- 
                                    <a href="index.php" class="input-span"
                                          style="float:right;text-decoration:underline;">Already Registered ?</a> -->
                              </div>
							  </div>
							  </div>
                        </form>
					
                  </div>
				  <center/>
            </div>
      </div>
      <?php include('footer.php'); ?>


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
