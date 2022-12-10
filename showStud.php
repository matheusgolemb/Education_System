<?php
include './data/config.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $selCourse = $_POST['selCourse'];
    $studs = readFileMat('./data/students/students.json');
    $marksCs = readFileMat('./data/courses/'.$selCourse.'.json');
    $chStuds = [];
    
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
}

?>