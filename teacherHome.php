<?php 
include './pages/header.php';
 
if(!isset($_SESSION['logUser'])) {
    header("Location: ".$baseName.'index.php');
    exit();
}else{
    $logUser = $_SESSION['logUser'];
}
?>
<div class="container-fluid">
    <div class="row justify-content-start align-items-start g-2">
        <div class="row">
            <?php
            echo "<h3 class='text-success'>Welcome teacher ".$logUser['first_name']."</h3>";
            ?>
            <hr/>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <form method="POST" action="<?php echo $baseName.   'regStCourse.php';?>">
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
                <div class="row justify-content-center align-items-center g-2 mb-3">
                    <fieldset class="border p-3">
                        <legend  class="float-none w-auto px-2">Search student</legend>

                        <div class="input-group mb-3">
                            <input type="text"
                                class="form-control srcStud" name="srcStud" id="inputGroupSelect01" aria-describedby="helpId" placeholder="Search students">
                            <label class="input-group-text fas fa-search d-flex justify-content-center align-items-center" for="inputGroupSelect01"></label>
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-lg" name="srcStud" id="selStud">
                                <option selected disabled value="">Select Student</option>
                                <?php
                                    foreach($studs as $stud){
                                        echo "<option value='".$stud['stID']."'>Student ID: ".$stud['stID']." - ".$stud['fname']." ".$stud['lname']."</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn p-2 px-4 btn-outline-success">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include './pages/footer.php'; ?>