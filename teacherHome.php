<?php 
include './pages/header.php';
 
if(!isset($_SESSION['logUser'])) {
    header("Location: ".$baseName.'index.php');
    exit();
}else{
    $logUser = $_SESSION['logUser'];
}
if(isset($_SESSION['chStuds'])){
    $chStuds = $_SESSION['chStuds'];
    // print_r($chStuds);
}
?>
<div class="container-fluid ">
    <div class="row justify-content-start align-items-start g-2">
        <div class="row">
            <?php
            echo "<h3 class='text-success'>Welcome teacher ".$logUser['first_name']."</h3>";
            ?>
            <hr/>
        </div>
    </div>
    <div class="row justify-content-around align-items-start g-2 mb-5">
        <div class="col-3">
            <form method="POST" action="<?php echo $baseName.'showStud.php';?>">
                <div class="mb-3">
                    <label for="" class="form-label">Choose course</label>
                    <select class="form-select form-select-lg" name="selCourse">
                        <option selected disabled value="">Select Course</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="js1">JavaScript</option>
                        <option value="js2">JavaScript Advanced</option>
                        <option value="php">PHP</option>
                        <option value="cms">CMS</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn p-2 px-4 btn-outline-success">Select</button>
                </div>
            </form>
        </div>

        <div class="col-8">
            <h3 class="text-center text-info"><?php echo strtoupper($chStuds[0]['course']);?> Course</h3>
            <form action="<?php echo $baseName.'showStud.php'?>" method="post">
                <div class="table-responsive">
                    <table class="table table-striped
                    table-hover	
                    table-borderless
                    table-primary
                    align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Student ID</th>
                                <th>FullName</th>
                                <th>Email</th>
                                <th>Mark</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider" style="display: <?php 
                                if(isset($_SESSION['chStuds'])) echo "table-row-group";
                                else echo "none";
                                ?>;">

                                <?php
                                if(isset($_SESSION['chStuds'])){
                                    foreach($chStuds as $stud){
                                        echo "<tr class='table-light'>";
                                            echo "<td scope='row'>".$stud['stID']."</td>";
                                            echo "<td>".$stud['fname']." ".$stud['lname']."</td>";
                                            echo "<td>".$stud['email']."</td>";
                                            echo "<td>".$stud['mark']."</td>";
                                            echo "<td>
                                                <a class='btn btn-outline-primary' href='#' role='button'>Edit</a>
                                                <a class='btn btn-outline-primary' href='#' role='button'>Save</a>
                                                </td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <!-- <button type="submit" class="btn btn-primary">Edit</button> -->
                            </tfoot>
                    </table>
                </div>
                

            </form>
        </div>
    </div>
</div>


<?php include './pages/footer.php'; ?>