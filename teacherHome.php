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
        <?php
            echo "<h3>Welcome teacher ".$logUser['first_name']."</h3>";
        ?>
    </div>
    <div class="col-7">Column</div>
</div>


<?php include './pages/footer.php'; ?>