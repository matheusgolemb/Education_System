<?php
include './data/config.php';
if($_SERVER['REQUEST_METHOD']='POST'){
    if(isset($_SESSION['chStuds'])){
        $chStuds = $_SESSION['chStuds'];
        if(isset($_POST['newMark'])){
            $newMark = intval($_POST['newMark']); //get value of new mark sent in form (input of mark)
            foreach($chStuds as $idx=>$stud){ //loop through all students
                if($stud['stID']==$_POST['stID']){ //if the stID is the same as the input of the table (the first td has an input inside)
                    $stud['mark'] = $newMark; //creating new key with new mark
                    $marksFile = readFileMat('./data/courses/' . $stud['course'] . '.json'); //reading the marks file to store new mark
                    foreach($marksFile as $idx=>$mark){ //loop through all marks to find the student with the eddited mark and update the value
                        if($mark['stID']==$_POST['stID']){
                            $mark['mark'] = $newMark;
                            break;
                        }
                    }
                    writeInFile('./data/courses/' . $stud['course'] . '.json', $marksFile); //writing the new mark on file
                    $_SESSION['chStuds'] = $chStuds; //updating variable with new mark
                    $_SESSION['selStud'] = $stud; //variable with single student to be displayed on the table
                    header("Location: " . $baseName . 'teacherHome.php');
                    exit();
                }
            }
        }
    }
}

?>