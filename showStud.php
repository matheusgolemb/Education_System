<?php
include './data/config.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['selCourse']) && !isset($_POST['stID'])){ //if the course is selected and the student is not selected
        $selCourse = $_POST['selCourse'];
        $studs = readFileMat('./data/students/students.json');
        $marksCs = readFileMat('./data/courses/'.$selCourse.'.json');
        $chStuds = []; //var to store the selected student
        unset($_SESSION['selStud']); //unseting variable to refresh table with new info
        foreach($studs as $idx=>$stud){
            foreach($marksCs as $mark){
                if($stud['stID']==$mark['stID']){ //Loop through all students and check if the stID is the same as inside the marks file.
                    $stud['mark'] = $mark['mark']; //create new key (mark) and store value
                    $stud['course'] = $selCourse; //create new key (course) and store value
                    array_push($chStuds, $stud);
                    break;
                }
            }
        }
        $_SESSION['chStuds'] = $chStuds; //variable with students of selected course to populate options of students select
        header("Location: " . $baseName . 'teacherHome.php');
        exit();
    }else{
        // $selStud = [];
        $selID = $_POST['stID'];
        $chStuds = $_SESSION['chStuds'];
        foreach($chStuds as $stud){
            if($stud['stID']==$selID){ //if it is the student selected in the form
                // array_push($selStud, $stud);
                $selStud = $stud;
                $_SESSION['selStud'] = $selStud; //array with selected student
                break;
            }
        }
        header("Location: " . $baseName . 'teacherHome.php');
        exit();
    }
}

?>