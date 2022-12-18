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
                        <?php if (isset($_SESSION['login-failed'])) : ?>
                            <h4 id="alert" class="alert alert-warning"><?= $_SESSION['login-failed']; ?></h4>
                        <?php
                            unset($_SESSION['login-failed']);
                        endif;
                        ?>
                <h1>Student Login</h1>
                    <div class="mb-3">
                        <label for="inputEmail" class="col-form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                    <div class="text-center p-1">
                        Don't have account? Register <a href="studentregister.php">here</a>!
                        </div> 
                        <button class="btn btn-secondary"><a href="teacherlogin.php" style="color:white;text-decoration: none;">Teacher</a></button>
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