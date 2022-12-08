<!-- fazer codigo pra cadastrar student no curso
bagulho do json com grade 0

   => when a student been added to a course, you need to create a folder with the name of that course if it does not exists and then create a json file if it does not exists too.
   => in the json file only add the student id and an empty mark like this: ['stID'=>studentID,"mark"=>0]

-->
<?php
include './data/config.php';
if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['srcStud']!=='' && $_POST['selCourse']!==''){
   $stID = $_POST['srcStud'];
   $selCourse = $_POST['selCourse'];
   $newStud = ['stID'=>$stID,"mark"=>0];
   print_r($newStud);
   print_r('./data/courses/' . $selCourse . '.json');
   if(!is_dir('./data/courses') || !file_exists('./data/courses/'.$selCourse.'.json')){
      mkdir('./data/courses');
      $file = fopen('./data/courses/'.$selCourse.'.json', 'w');
      $crsArray = [];
   }else{
      $file = fopen('./data/courses/' . $selCourse . '.json', 'r');
      $crsArray = json_decode(fread($file, filesize('./data/courses/' . $selCourse . '.json')), true);
      fclose($file);
   }
   array_push($crsArray, $newStud);
   $file = fopen('./data/courses/' . $selCourse . '.json', 'w');
   fwrite($file, json_encode($crsArray));
   fclose($file);
   header("Location: " . $baseName . 'adminHome.php?msg=OK');
   exit();
}else{
   echo "<h2>ERROR</h2>";
}

?>