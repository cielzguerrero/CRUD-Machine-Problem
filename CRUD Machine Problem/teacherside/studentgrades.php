<?php
include '../assets/actions.php';
include '../assets/auth.php';
$currentdepartment = $result->department;
$currentteacher = $result->fullname;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
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
                            <strong><?= $result->username ?>
                            </strong>
                        </span>
                        <br>
                        <span class="user-role"><?= $result->department ?> Teacher</span>
                    </div>
                </div>
                <hr>
                <!-- sidebar-header  -->
                <div class="sidebar-menu">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="dashboard.php">
                                <i class="fa-sharp fa-solid fa-table-columns"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="studentgrades.php">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                <span class="active">Student Grades</span>
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
                <!-- Add Modal Start -->
                <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Add Grade </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <input type="hidden" name="currentteacher" id="currentteacher" value="<?=$result->fullname;?>">
                                    

                                    <div class="form-group">

                                        <label> Select Student </label>
                                        <select class="form-control" name="studentname" id="studentname" required>
                                            <?php
                                            $query = "SELECT * FROM students";
                                            $statement = $conn->prepare($query);
                                            $statement->execute();
                                            $statement->setFetchMode(PDO::FETCH_OBJ);
                                            $result = $statement->fetchAll();
                                            if ($result) {
                                                foreach ($result as $row) {
                                            ?>
                                                    <option><?= $row->fullname ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <label> Select Subject </label>
                                        <select class="form-control" name="subject" id="subject" required>
                                            <?php
                                            $query = "SELECT * FROM subjects WHERE department = :department";
                                            $statement = $conn->prepare($query);
                                            $data = [':department' => $currentdepartment];
                                            $statement->execute($data);
                                            $statement->setFetchMode(PDO::FETCH_OBJ);
                                            $result = $statement->fetchAll();
                                            if ($result) {
                                                foreach ($result as $row) {
                                            ?>
                                                    <option><?= $row->subjectname ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> 1st Grading </label>
                                        <input type="text" name="1stgrading" id="1stgrading" class="form-control" placeholder="Enter Grade" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label> 2nd Grading </label>
                                        <input type="text" name="2ndgrading" id="2ndgrading" class="form-control" placeholder="Enter Grade" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label> 3rd Grading </label>
                                        <input type="text" name="3rdgrading" id="3rdgrading" class="form-control" placeholder="Enter Grade" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label> 4th Grading </label>
                                        <input type="text" name="4thgrading" id="4thgrading" class="form-control" placeholder="Enter Grade" value="0">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="addgrade" class="btn btn-primary">Add Grade</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Add Modal End -->
                <!-- Update Modal -->
                <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Edit Grade </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <input type="hidden" name="uid" id="uid">

                                    <div class="form-group">

                                    <div class="form-group">
                                        <label> Current Student</label>
                                        <input type="text" name="studentname" id="ustudentname" class="form-control" placeholder="Enter Grade" value="0">
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label> 1st Grading </label>
                                        <input type="text" name="1stgrading" id="u1stgrading" class="form-control" placeholder="Enter Grade" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label> 2nd Grading </label>
                                        <input type="text" name="2ndgrading" id="u2ndgrading" class="form-control" placeholder="Enter Grade" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label> 3rd Grading </label>
                                        <input type="text" name="3rdgrading" id="u3rdgrading" class="form-control" placeholder="Enter Grade" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label> 4th Grading </label>
                                        <input type="text" name="4thgrading" id="u4thgrading" class="form-control" placeholder="Enter Grade" value="0">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="updategrade" class="btn btn-primary">Edit Grade</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Update Modal End -->
                <div class="dashboard-content">
                    <div class="card">
                        <div class="card-body ">
                            <table id="daTable" class="table table-bordered">
                                <thead>
                                    <tr>

                                        <th style="display:none">ID</th>
                                        <th class="p-4">Subject</th>
                                        <th class="p-4">Handled By</th>
                                        <th class="p-4">Student Name</th>
                                        <th class="p-4">Semester</th>
                                        <th class="p-4">Student Grade 1st Qr</th>
                                        <th class="p-4">Student Grade 2nd Qr</th>
                                        <th class="p-4">Student Grade 3rd Qr</th>
                                        <th class="p-4">Student Grade 4th Qr</th>
                                        <th class="p-4">Actions | <button class="btn btn-primary addbtn m-1">Add</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM grades WHERE handledby = '$currentteacher'";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();
                                    $statement->setFetchMode(PDO::FETCH_OBJ);
                                    $result = $statement->fetchAll();
                                    if ($result) {
                                        foreach ($result as $row) {
                                    ?>
                                            <tr>
                                                <td style="display: none;"><?= $row->id ?></td>
                                                <td><?= $row->subject ?></td>
                                                <td><?= $row->handledby ?></td>
                                                <td><?= $row->studentname ?></td>
                                                <td><?= $row->semester ?></td>
                                                <td><?= $row->studentg1stqr ?></td>
                                                <td><?= $row->studentg2ndqr ?></td>
                                                <td><?= $row->studentg3rdqr ?></td>
                                                <td><?= $row->studentg4thqr ?></td>
                                                <td class="d-flex justify-content-around">
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id" value="<?= $row->id ?>">
                                                        <button type="button" class="btn btn-success editbtn m-1"><i class="fa fa-edit"></i></button><button type="submit" class="btn btn-danger btn-xs m-1" name="deletegrade"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.addbtn').on('click', function() {
            $('#addmodal').modal('show');
        });
    });
</script>
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

    $(document).ready(function() {
        $("#selectsemester").change(function() {
            $('#currentsemester').html($(this).val());
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $('.addbtn').on('click', function() {
            $('#addmodal').modal('show');
        });
    });

    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#uid').val(data[0]);
            $('#ustudentname').val(data[3]);
            $('#u1stgrading').val(data[5]);
            $('#u2ndgrading').val(data[6]);
            $('#u3rdgrading').val(data[7]);
            $('#u4thgrading').val(data[8]);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#daTable').DataTable();
    });
</script>

</html>