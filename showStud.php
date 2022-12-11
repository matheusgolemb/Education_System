<?php
include './data/config.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['selCourse']) && !isset($_POST['stID'])){
        $selCourse = $_POST['selCourse'];
        $studs = readFileMat('./data/students/students.json');
        $marksCs = readFileMat('./data/courses/'.$selCourse.'.json');
        $chStuds = [];
        unset($_SESSION['selStud']);
        foreach($studs as $idx=>$stud){
            foreach($marksCs as $mark){
                if($stud['stID']==$mark['stID']){
                    $stud['mark'] = $mark['mark'];
                    $stud['course'] = $selCourse;
                    array_push($chStuds, $stud);
                    break;
                }
            }
        }
        $_SESSION['chStuds'] = $chStuds;
        header("Location: " . $baseName . 'teacherHome.php');
        exit();
    }else{
        $selStud = [];
        $selID = $_POST['stID'];
        $chStuds = $_SESSION['chStuds'];
        foreach($chStuds as $stud){
            if($stud['stID']==$selID){
                // print_r($stud);
                array_push($selStud, $stud);
                $_SESSION['selStud'] = $selStud;
                break;
            }
        }
        header("Location: " . $baseName . 'teacherHome.php');
        exit();
    }
}

?>