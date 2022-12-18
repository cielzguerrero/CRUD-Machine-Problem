<?php
include '../assets/actions.php';
include '../assets/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap/AOS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
       <!-- Datatable -->
    <link rel = "stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src = "https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src = "https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="dashboard.css">
    <script src="../assets/index.js"></script>
    <!DOCTYPE html>
    <title>CRUD Machine Problem</title>
</head>
<body>
    <div class="wrapper">
        <nav class="sidebar-wrapper" id="sb-wrapper">
            <div class="sidebar-contents m-4">
                <div class="sitebrand text-sm-left font-weight-bold">
                    <h1>School Grade System</h1>
                </div>
                <hr>
                <div class="sidebar-header d-flex justify-content-between">
                    <div class="user-pic">
                        <i class="fa-solid fa-user" style="font-size: 2.5rem;"></i>
                    </div>
                    <div class="user-info ">
                        <span class="user-name">
                            <strong><?= $result->username ?></strong>
                        </span>
                        <br>
                        <span class="user-role">Teacher</span>
                    </div>
                </div>
                <hr>
                <!-- sidebar-header  -->
                <div class="sidebar-menu">
                    <ul class="list-group">
                        <li class="list-group-item active">
                            <a href="#">
                                <i class="fa-sharp fa-solid fa-table-columns"></i>
                                <span class="active">Dashboard</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="studentgrades.php">
                            <i class="fa-sharp fa-solid fa-list"></i>
                                <span>Student Grades</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="../assets/logout.php">
                                <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
            </div>
        </nav>
        <main class="page-content" id="p-content">
            <div class="container-fluid">
                <div class="page-header row">
                    <div class="col-md-6">
                        <button class="fullscreen" onclick="myFunction()"><i class="fa-solid fa-bars"></i></button>
                    </div>
                    <div class="col-md-6">
                        <button class="fullscreen float-sm-right" onclick="openFullscreen();"><i class="fa-solid fa-expand"></i></button>
                    </div>
                </div>
                <hr>
                <div class="dashboard-content">
                    <div class="row ">
                        <div class="col align-middle">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <div>
                                        <h1>
                                            <?php
                                            $total = "SELECT * FROM students";
                                            $statement = $conn->prepare($total);
                                            $statement->execute();
                                            $statement->setFetchMode(PDO::FETCH_OBJ);
                                            echo $count = $statement->rowCount();
                                            ?>
                                        </h1>
                                        <p class="card-text">Total Students</p>
                                    </div>
                                    <div>
                                        <i class="fa-sharp fa-solid fa-users" style="font-size:5rem;"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-around">
                                    <div>
                                        <small class="align-middle mr-3">More Info</small><a href="studentgrades.php" style="color:black;text-decoration:none;"><i class="fa-sharp fa-solid fa-arrow-right"></i></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col align-middle">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <div>
                                        <h1>
                                            <?php
                                            $lostitem = "Lost";

                                            $total = "SELECT * FROM teachers";
                                            $statement = $conn->prepare($total);
                                            $statement->execute();
                                            $statement->setFetchMode(PDO::FETCH_OBJ);
                                            echo $count = $statement->rowCount();
                                            ?>
                                        </h1>
                                        <p class="card-text">Total Teachers</p>
                                    </div>
                                    <div>
                                        <i class="fa-sharp fa-solid fa-person-circle-question" style="font-size:5rem;"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-around">
                                    <div>
                                        <small class="align-middle mr-3">Hello, <?= $result->fullname ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script>
    function myFunction() {
        var x = document.getElementById("sb-wrapper");
        var y = document.getElementById("p-content");
        if (x.style.opacity === "0") {
            x.style.opacity = "1";
            x.style.display = "block";
            x.style.width = "300px";
            y.style.paddingLeft = "300px";

        } else {
            x.style.opacity = "0";
            x.style.display = "none";
            x.style.width = "0px";
            y.style.paddingLeft = "0px";
        }
    }
    var elem = document.documentElement;

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Safari */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE11 */
            elem.msRequestFullscreen();
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="jquery-3.6.0.min.js"></script>
</html>