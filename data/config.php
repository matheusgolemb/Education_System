<?php
    $baseName = "http://localhost/php_course/Class_07/EducationSystem/";
    session_start();

    function readFileMat($fileName){ //return back an associate array
        $file = fopen($fileName,'r');
        return json_decode(fread($file,filesize($fileName)),true);
    }
    function checkLogin($userArray, $role, $email, $pass){ //check pass and email. If correct, redirect to $role page. If incorrect redirect to index
        $baseName = "http://localhost/php_course/Class_07/EducationSystem/";
        foreach($userArray as $user){
            if($user['email']==$email && $user['pass']==$pass){
                $_SESSION['logUser'] = $user;
                switch ($role) {
                    case 'tech':
                        header("Location: ".$baseName.'teacherHome.php');
                        exit();
                        break;
                    case 'st':
                        header("Location: ".$baseName.'profile.php');
                        exit();
                        break;
                    case 'admin':
                        header("Location: ".$baseName.'adminHome.php');
                        exit();
                        break;
                }
            }
        }
        header("Location: ".$baseName.'index.php?msg=1');
        exit();
    }
?>