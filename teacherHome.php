<style>
    table{
        text-align: center;
    }
    .tdInput{
        display: flex;
        justify-content: center;
    }
    fieldset{
        border-radius: 10px;
    }
    legend{
        font-size: 20px !important;
    }
</style>
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
    if(isset($_SESSION['selStud'])){
        $selStud = $_SESSION['selStud'];
    }
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
                <fieldset class="form-group border p-3">
                    <div class="mb-3">
                        <legend class="w-auto px-2">1. Choose course</legend>
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
                </fieldset>
            </form>
            <form method="POST" action="<?php echo $baseName.'showStud.php';?>">
            <fieldset class="form-group border p-3">
                <legend class="w-auto px-2">2. Select student</legend>
                <div class="mb-3">
                    <select class="form-select form-select-lg" name="stID">
                        <option selected disabled value="">Select Course</option>
                        <?php 
                            //chStuds is a variable with the students of the selected course
                            foreach($chStuds as $stud){
                                echo "<option value='".$stud['stID']."'>" . $stud['fname'] . " " . $stud['lname'] . "</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn p-2 px-4 btn-outline-success">See information</button>
                </div>
            </fieldset>
            </form>
        </div>

        <div class="col-8">
            <h3 class="text-center text-info"><?php if(isset($chStuds)){
                echo strtoupper($chStuds[0]['course'])." Course";}else{
                echo "Select course to see students marks";
                }
                ?></h3>
            <form action="<?php echo $baseName.'getMarks.php'?>" method="post">
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
                                if(isset($_SESSION['selStud'])) echo "table-row-group";
                                else echo "none";
                                ?>;">
                                <?php
                                if(isset($_SESSION['selStud'])){
                                        echo "<tr class='table-light'>";
                                            echo "<td>
                                            <input type='text' name='stID' readonly class='form-control-plaintext text-center' value='".$selStud['stID']."'>
                                            </td>";
                                            echo "<td>".$selStud['fname']." ".$selStud['lname']."</td>";
                                            echo "<td>".$selStud['email']."</td>";
                                            if(isset($_GET['stID']) && $_GET['stID']==$selStud['stID']){
                                                echo "<td class='tdInput'><input min='0' max='100' name='newMark' class='form-control' style='width:10vh;' type='number' value=".$selStud['mark']."></td>";
                                            }else{
                                                echo "<td>".$selStud['mark']."</td>";
                                            }
                                            echo "<td>
                                                <a class='btn btn-outline-primary'
                                                href='".$_SERVER['PHP_SELF']."?stID=".$selStud['stID']."' 
                                                role='button'>Edit</a>
                                                <button type='submit' class='btn btn-outline-primary'>Save</button>
                                                </td>";
                                        echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>

                            </tfoot>
                            
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include './pages/footer.php'; ?>