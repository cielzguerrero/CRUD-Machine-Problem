<?php

include '../connection/connection.php';

// addstudentgrade

if(isset($_POST['addgrade'])){
    $teacher = $_POST['currentteacher'];
    $studentname = $_POST['studentname'];
    $subject = $_POST['subject'];
    $firstgrading = $_POST['1stgrading'];
    $secondgrading = $_POST['2ndgrading'];
    $thirdgrading = $_POST['3rdgrading'];
    $fourthgrading = $_POST['4thgrading'];

    $query = "SELECT semester FROM subjects WHERE subjectname = :subject";
    $statement = $conn->prepare($query);
    $data = [':subject' => $subject];
    $statement->execute($data);
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $result = $statement->fetch();

    $currentsemester = $result->semester;
    try{
        $query = "INSERT INTO grades (studentname, subject, handledby, semester, studentg1stqr, studentg2ndqr, studentg3rdqr, studentg4thqr) VALUES (:studentname, :subject, :handledby, :semester, :1stquarter, :2ndquarter, :3rdquarter, :4thquarter)";
        $statement = $conn->prepare($query);
        $data = [
            ':studentname' => $studentname,
            ':subject' => $subject,
            ':handledby' => $teacher,
            ':semester' => $currentsemester,
            ':1stquarter' => $firstgrading,
            ':2ndquarter' => $secondgrading,
            ':3rdquarter' => $thirdgrading,
            ':4thquarter' => $fourthgrading

        ];
        $result = $statement->execute($data);
        if ($result) {
                    $_SESSION['register-success'] = "Adding Grade Successful!";
                    header("Location: studentgrades.php");
                } else {
                    $_SESSION['register-failed'] = "Something Went Wrong! Adding Grade Failed.";
                    header("Location: studentgrades.php");
                }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

if (isset($_POST['updategrade'])) {
    $uid = $_POST['uid'];
    $studentname = $_POST['studentname'];
    $firstgrading = $_POST['1stgrading'];
    $secondgrading = $_POST['2ndgrading'];
    $thirdgrading = $_POST['3rdgrading'];
    $fourthgrading = $_POST['4thgrading'];
    try{
        $query ="UPDATE grades SET studentname =:studentname, studentg1stqr = :1stquarter, studentg2ndqr = :2ndquarter, studentg3rdqr = :3rdquarter, studentg4thqr = :4thquarter WHERE id = :id";
        $statement = $conn->prepare($query);
        $data = [
            ':studentname' => $studentname,
            ':1stquarter' => $firstgrading,
            ':2ndquarter' => $secondgrading,
            ':3rdquarter' => $thirdgrading,
            ':4thquarter' => $fourthgrading,
            ':id' => $uid

        ];
        $result = $statement->execute($data);

        if ($result) {
            $_SESSION['register-success'] = "Updating Grade Successful!";
            header("Location: studentgrades.php");
        } else {
            $_SESSION['register-failed'] = "Something Went Wrong! Updating Grade Failed.";
            header("Location: studentgrades.php");
        }
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}
//student end

if (isset($_POST['deletegrade'])) {
    $itemid = $_POST['id'];
    $query = "DELETE FROM grades WHERE id = :del_id";
    $statement = $conn->prepare($query);
    $data = [
        ':del_id' =>$itemid
    ];
    $result = $statement->execute($data);
    if ($result) {
        $_SESSION['register-success'] = "Adding Category Successful!";
        header("Location: studentgrades.php");
    } else {
        $_SESSION['register-failed'] = "Something Went Wrong! Adding Category Failed.";
        header("Location: studentgrades.php");
    }
}
//teacher end