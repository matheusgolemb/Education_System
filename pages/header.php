<?php include './data/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Education System</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');
*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
}
</style>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark mb-2" style="background-color: firebrick">
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item" style="display: <?php 
                        if(isset($_SESSION['logUser']) && $_SESSION['role']!=='st') echo "block";
                        else echo "none";
                         ?> ;">
                        <a class="nav-link" href="<?php echo $baseName.'regForm.php';?>" aria-current="page">Register Student</a>
                    </li>
                    <li class="nav-item" style="display: <?php 
                        if(isset($_SESSION['logUser'])) echo "none";
                        else echo "block";
                         ?> ;">
                        <a class="nav-link" href="<?php echo $baseName.'index.php';?>" aria-current="page"  href="<?php echo $baseName.'logout.php';?>">Login</a>
                    </li>
                    <li class="nav-item" style="display: <?php 
                        if(isset($_SESSION['logUser'])) echo "block";
                        else echo "none";
                         ?> ;">
                        <a class="nav-link"  href="<?php echo $_SESSION['logUser']['logHome'];?>">HomePage</a>
                    </li>
                    <li class="nav-item" style="display: <?php 
                        if(isset($_SESSION['logUser'])) echo "block";
                        else echo "none";
                         ?> ;">
                        <a class="nav-link"  href="<?php echo $baseName.'logout.php';?>">Logout</a>
                    </li>
    
                </ul>
            </div>
        </nav>
    </header>
    <main class="container-fluid">
        
    