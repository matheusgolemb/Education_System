<?php
    include './data/config.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];
        $_SESSION['role'] = $role;
        switch ($role) {
        case 'tech':
            checkLogin(readFileMat('./data/teachers/teachers.json'), $role, $email, $pass);
            break;
        case 'st':
            checkLogin(readFileMat('./data/students/students.json'), $role, $email, $pass);
            break;
        case 'admin':
            checkLogin(readFileMat('./data/admins/admins.json'), $role, $email, $pass);
            break;
        }
    }
?>