<style>
    fieldset{
        border-radius: 10px;
    }
</style>

<?php 
include './pages/header.php';
 
if(!isset($_SESSION['logUser'])) {
    header("Location: ".$baseName.'index.php');
    exit();
}else{
    $logUser = $_SESSION['logUser'];
    $studs=readFileMat('./data/students/students.json');
    // print_r($studs);
}
?>
<div class="container-fluid">
    <div class="row justify-content-start align-items-start g-2">
        <div class="row">
            <?php
            echo "<h3 class='text-success'>Welcome ".$logUser['fname']."</h3>";
            ?>
        </div>
        <hr/>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert" 
            style="display:" <?php if (isset($_GET['msg']))
                echo "block";
            else echo "none";
            ?>>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <strong>Message</strong> Student registered!
            </div>

            <form method="POST" action="<?php echo $baseName.'regStCourse.php';?>">
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
<script>
    $(".srcStud").keyup(function(){
    let srcVal = $(this).val().toLowerCase();
    $("#selStud option").filter(function(){
        // console.log($(this).text());
        let name = $($(this)).text();
        $(this).toggle(name.toLowerCase().indexOf(srcVal) > -1)
    })
    })
</script>
<script>
    var alertList = document.querySelectorAll('.alert');
    alertList.forEach(function (alert) {
    new bootstrap.Alert(alert)
    })
</script>