<?php 
include './pages/header.php';
 
if(!isset($_SESSION['logUser'])) {
    header("Location: ".$baseName.'index.php');
    exit();
}else{
    $logUser = $_SESSION['logUser'];
    $allCourses = array_diff(scandir('./data/courses', SCANDIR_SORT_DESCENDING), array('.', '..')); //Get array with all files
    $studMarks = [];
    foreach($allCourses as $course){ //loop trough all files and check in which course student is registed
        $cs = readFileMat("./data/courses/$course");
        // print_r($cs);
        foreach($cs as $c){
            if($c['stID'] == $logUser['stID']){
                $strCourse = explode('.', $course)[0];
                $c['course'] = $strCourse;
                array_push($studMarks, $c);
            }
        }
    }
    // print_r($studMarks);
}
?>

<div class="row justify-content-around align-items-start g-2">
    <div class="col-5">
        <div class="card text-start">
          <div class="card-body">
            <?php
                echo "<h4 class='card-title'>".$_SESSION['logUser']['fname']." ".$_SESSION['logUser']['lname']."</h4>";
                echo "<p class='card-text'>".$_SESSION['logUser']['stID']."</p>";
                echo "<p class='card-text'>".$_SESSION['logUser']['email']."</p>";
            ?>
          </div>
        </div>
    </div>
    <div class="col-5">
        <div class="table-responsive text-center">
            <table class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Course</th>
                        <th scope="col">Mark</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php
                        foreach($studMarks as $mark){
                        echo "<tr class='table-light'>";
                            echo "<td>".strtoupper($mark['course'])."</td>";
                            echo "<td>".$mark['mark']."</td>";
                        echo "</tr>";
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
            </table>
        </div>        
    </div>
</div>

<?php include './pages/footer.php'; ?>