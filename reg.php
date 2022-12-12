<?php
    include './data/config.php';
    include './data/studentClass.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $stID = intval($_POST['stid']);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $student = new student($stID,$fname,$lname,$email,$pass);
        if(!file_exists('./data/students/students.json')){
            $file = fopen('./data/students/students.json','w');
            $stArray = [];
        }else{
            $file = fopen('./data/students/students.json','r');
            $stArray = json_decode(fread($file,filesize('./data/students/students.json')),true);
        }
        fclose($file);
        array_push($stArray,$student->convert_info());
        writeInFile('./data/students/students.json', $stArray);
        header("Location: ".$baseName.'regForm.php?msg=Registeration OK');
        exit();
    }
?>