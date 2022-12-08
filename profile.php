<?php 
include './pages/header.php';
 
if(!isset($_SESSION['logUser'])) {
    header("Location: ".$baseName.'index.php');
    exit();
}else{
    $logUser = $_SESSION['logUser'];
}
?>

<div class="row justify-content-start align-items-start g-2">
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
    <div class="col-7">Column</div>
</div>

<?php include './pages/footer.php'; ?>