<?php
include './data/config.php';
if($_SERVER['REQUEST_METHOD']=='POST'
   && isset($_POST['srcStud']) 
   && isset($_POST['selCourse'])){
   $stID = $_POST['srcStud'];
   $selCourse = $_POST['selCourse'];
   $newStud = ['stID'=>$stID,"mark"=>0];
   if(!is_dir('./data/courses')){ //check if directory exists
      mkdir('./data/courses');
   }elseif(!file_exists('./data/courses/'.$selCourse.'.json')){ //if file dont exists
      $crsArray = [$newStud]; //setting like this so later I push just one time. And inside [] to be array of JSON objects
      $file = fopen('./data/courses/' . $selCourse . '.json', 'w');
      fwrite($file, json_encode($crsArray));
      fclose($file);
      header("Location: " . $baseName . 'adminHome.php?msg=1');
      exit();
   }else{
      $crsArray = readFileMat('./data/courses/' . $selCourse . '.json');
      if(!valExists($crsArray, $stID)){ //Checking if value is repeated in array
         array_push($crsArray, $newStud);
         $file = fopen('./data/courses/' . $selCourse . '.json', 'w');
         fwrite($file, json_encode($crsArray));
         fclose($file);
         print_r($crsArray);
         header("Location: " . $baseName . 'adminHome.php?msg=1');
         exit();
      }else{
         header("Location: " . $baseName . 'adminHome.php?msg=0');
         exit();
      }
   }
}else{
      header("Location: " . $baseName . 'adminHome.php?msg=0');
      exit();
}

?>