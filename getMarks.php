<?php
include './data/config.php';
if($_SERVER['REQUEST_METHOD']='POST'){
    if(isset($_SESSION['chStuds'])){
        $chStuds = $_SESSION['chStuds'];
        if(isset($_POST['newMark'])){
            $newMark = intval($_POST['newMark']);
            $selStud = [];
            foreach($chStuds as $idx=>$stud){
                if($stud['stID']==$_POST['stID']){
                    $chStuds[$idx]['mark'] = $newMark;
                    $stud['mark'] = $newMark;
                    $marksFile = readFileMat('./data/courses/' . $stud['course'] . '.json');
                    foreach($marksFile as $idx=>$mark){
                        if($mark['stID']==$_POST['stID']){
                            $marksFile[$idx]['mark'] = $newMark;
                            break;
                        }
                    }
                    $file = fopen('./data/courses/'.$stud['course'].'.json', 'w');
                    fwrite($file, json_encode($marksFile));
                    fclose($file);
                    $_SESSION['chStuds'] = $chStuds;
                    array_push($selStud, $stud);
                    $_SESSION['selStud'] = $selStud;
                    header("Location: " . $baseName . 'teacherHome.php');
                    exit();
                }
            }
        }
    }
}

?>