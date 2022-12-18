<?php
include './assets/login.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
	  integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
	<link rel="stylesheet"
	  href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet"
	  href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <title>Document</title>
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col vh-100" style="background-image:url('pictures/bailey.jpg'); background-repeat: no-repeat;
  background-size: cover;">
                </div>
                <div class="col vh-100 hero d-flex align-items-center justify-content-center" >
                <form action="" method="POST" style="width:768px">
                <h1>Teacher Registration</h1>
                <?php if (isset($_SESSION['register-success'])) : ?>
                            <h4 id="alert" class="alert alert-success"><?= $_SESSION['register-success']; ?></h4>
                        <?php
                            unset($_SESSION['register-success']);
                        endif;
                        ?>
                        <?php if (isset($_SESSION['register-failed'])) : ?>
                            <h4 id="alert" class="alert alert-warning"><?= $_SESSION['register-failed']; ?></h4>
                        <?php
                            unset($_SESSION['register-failed']);
                        endif;
                        ?>
                        <?php if (isset($_SESSION['password-match'])) : ?>
                            <h4 id="alert" class="alert alert-warning"><?= $_SESSION['password-match']; ?></h4>
                        <?php
                            unset($_SESSION['password-match']);
                        endif;
                        ?>
                        <?php if (isset($_SESSION['email-exist'])) : ?>
                            <h4 id="alert" class="alert alert-warning"><?= $_SESSION['email-exist']; ?></h4>
                        <?php
                            unset($_SESSION['email-exist']);
                        endif;
                        ?>
                    <div class="mb-3">
                        <label for="inputEmail" class="col-form-label">Email Address</label>
                        <input type="email" id="inputEmail" name="email" placeholder="Input email address" class="form-control" autocomplete="off" required> 
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="col-form-label">Username</label>
                        <input type="text" id="inputName" name="username" placeholder="Input username" class="form-control" autocomplete="off" required> 
                        <div id="usernameHelp" class="form-text">This username is used for identification.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="col-form-label">Full Name</label>
                        <input type="text" id="inputName" name="fullname" placeholder="Input fullname." class="form-control" autocomplete="off" required> 
                    </div>
                    <div class="mb-3">
                        <label for="inputDepartment" class="col-form-label">Department</label>
                        <select class="form-control" name="department">
                            <option>English</option>
                            <option>Math</option>
                            <option>Arts</option>
                            <option>Science</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" id="InputPassword" name="password" placeholder="Input Password" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputCPassword" class="form-label">Confirm Password</label>
                        <input type="password" id="InputCPassword" name="confirm_password" placeholder="Please confirm your password" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="teacherregister">Sign Up</button>
                    <div class="text-center p-1">
                        Already have account? Login <a href="teacherlogin.php">here</a>!
                        </div> 
                        <button class="btn btn-secondary"><a href="index.php" style="color:white;text-decoration: none;">Student</a></button>
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="jquery-3.6.0.min.js"></script>
</html>