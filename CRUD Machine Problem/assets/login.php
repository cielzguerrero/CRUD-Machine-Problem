<?php

include './connection/connection.php';

// student login

if (isset($_POST['login'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $status = "teacher";
    try {

        $query = "SELECT * FROM teachers WHERE email=:email AND status=:status";
        $statement = $conn->prepare($query);
        $data = [
            ':email' => $email,
            ':status' => $status
        ];

        $statement->execute($data);
        $result = $statement->fetch();

        if ($statement->rowCount() > 0) {

            if (password_verify($password, $result['password'])) {

                $_SESSION['id'] = $result['id'];
                header("Location: ./teacherside/dashboard.php");
            } else {

                $_SESSION['login-failed'] = "Incorrect Password.";
                header("Location: index.php");
            }
        } else {

            $query = "SELECT * FROM students WHERE email=:email";
            $statement = $conn->prepare($query);
            $data = [':email' => $email];

            $statement->execute($data);
            $result = $statement->fetch();
            if ($statement->rowCount() > 0) {
                if (password_verify($password, $result['password']))
                {
                    $_SESSION['id'] = $result['id'];
                    header("Location: ./studentside/dashboard.php");
                }
                else{
                    $_SESSION['login-failed'] = "Incorrect Password.";
                header("Location: index.php");
                }
            }else
            {
                $_SESSION['login-failed'] = "Incorrect Email.";
                header("Location: index.php");
            }
            // $_SESSION['login-failed'] = "Incorrect Email.";
            // header("Location: index.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// register 

if (isset($_POST['studentregister'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $section = $_POST['section'];
    $fullname = $_POST['fullname'];
    $confirm_password = $_POST['confirm_password'];
    $status = "student";

    if ($password == $confirm_password) {

        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "SELECT * FROM students WHERE email=:email";
        $statement = $conn->prepare($query);
        $data = [':email' => $email];

        $statement->execute($data);
        $result = $statement->fetch();

        if ($statement->rowCount() == 0) {

            $query = "SELECT * FROM students WHERE username=:username";
            $statement = $conn->prepare($query);
            $data = [':username' => $username];

            $statement->execute($data);
            $result = $statement->fetch();

            if ($statement->rowCount() == 0) {

                $query = "INSERT INTO students (email, username, password, fullname, status, section) VALUES (:email, :username, :password, :full_name, :status, :section)";
                $statement = $conn->prepare($query);
                $data = [
                    ':email' => $email,
                    ':username' => $username,
                    ':password' => $password,
                    ':full_name' => $fullname,
                    ':status' => $status,
                    ':section' => $section

                ];

                $result = $statement->execute($data);

                if ($result) {
                    $_SESSION['register-success'] = "Registration Successful!";
                    header("Location: studentregister.php");
                } else {
                    $_SESSION['register-failed'] = "Something Went Wrong! Registration Failed.";
                    header("Location: studentregister.php");
                }
            } else {
                $_SESSION['username-already-taken'] = "Username Already Taken.";
                header("Location: studentregister.php");
            }
        } else {
            $_SESSION['email-already-used'] = "Email Already Used.";
            header("Location: studentregister.php");
        }
    } else {
        $_SESSION['password-not-match'] = "Password Not Match.";
        header("Location: studentregister.php");
    }
}
//student end

if (isset($_POST['teacherregister'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    $fullname = $_POST['fullname'];
    $confirm_password = $_POST['confirm_password'];
    $status = "teacher";

    if ($password == $confirm_password) {

        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "SELECT * FROM teachers WHERE email=:email";
        $statement = $conn->prepare($query);
        $data = [':email' => $email];

        $statement->execute($data);
        $result = $statement->fetch();

        if ($statement->rowCount() == 0) {

            $query = "SELECT * FROM teachers WHERE username=:username";
            $statement = $conn->prepare($query);
            $data = [':username' => $username];

            $statement->execute($data);
            $result = $statement->fetch();

            if ($statement->rowCount() == 0) {

                $query = "INSERT INTO teachers (email, fullname, username, password, department, status) VALUES (:email, :fullname, :username, :password, :department, :status)";
                $statement = $conn->prepare($query);
                $data = [
                    ':email' => $email,
                    ':fullname' => $fullname,
                    ':username' => $username,
                    ':password' => $password,
                    ':department' => $department,
                    ':status' => $status

                ];

                $result = $statement->execute($data);

                if ($result) {
                    $_SESSION['register-success'] = "Registration Successful!";
                    header("Location: teacherregister.php");
                } else {
                    $_SESSION['register-failed'] = "Something Went Wrong! Registration Failed.";
                    header("Location: teacherregister.php");
                }
            } else {
                $_SESSION['username-already-taken'] = "Username Already Taken.";
                header("Location: teacherregister.php");
            }
        } else {
            $_SESSION['email-already-used'] = "Email Already Used.";
            header("Location: teacherregister.php");
        }
    } else {
        $_SESSION['password-not-match'] = "Password Not Match.";
        header("Location: teacherregister.php");
    }
}
//teacher end