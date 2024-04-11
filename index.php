<?php
    include_once 'admin/functions.php';
    $routes = include_once 'admin/routes.php';
    run($_SERVER['REQUEST_URI'], $routes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustKar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
    ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    
</head>
<body>
   
            <!-- Navbar -->
            
        <nav class="navbar navbar-expand-lg navbar-dark bg-black ">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand px-3"><img src="images/logo.jpg" alt="" width="140px" height="110px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navmenu">
                    <ul class="navbar-nav">
                        <li class="nav-item px-3">
                            <a href="index.html" aria-current="page" class="nav-link " style="font-size: 24px;
                            font-weight: 500;">Home</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#" class="nav-link" style="font-size: 24px; font-weight: 500;">Customize</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="About.html" class="nav-link" style="font-size: 24px; font-weight: 500;">About</a>
                        </li>
                      
                    </ul>
                </div>
            </div>
           
        </nav>
        <!-- End of Navbar -->
    
        <!-- Content -->
        <div class="container mt-3 fade-in">
            <div class="row text-white">
                <div class="col-md-10">
                    <h1 class="text-uppercase" id="title">We are here to fix you tires</h1>
                </div>
                <div class="col-md-8">
                    <h4 class="mt-5 text-uppercase" id="body"><span style="font-weight: bold;">ADDRESS: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</h4>
                </div>
                <div class="col-md-8">
                    <h5 class="mt-5" id="footer"><span style="font-weight:bold;">OPEN AT:</span><br>
                        7:00 AM - 7:00 PM (Monday - Friday)
                        8:00 AM - 6:00 PM (Saturday- Sunday)</h5>
                </div>
            </div>
        </div>
        <!-- End of Content -->
        <div class="container mt-3 fade-in">
            <div class="row justify-content-center py-3  container-cust">
                <div class="col-auto">
                    <a href=""><img src="images/facebook.png" alt="" width="45px" height="45px"></a>
                </div>
                <div class="col-auto">
                    <a href=""><img src="images/instagram.png" alt="" width="50px" height="50px"></a>
                </div>
                <div class="col-auto">
                    <h4 class="text-white mt-2">JustKar Tyre Supply</h4>
                </div>
            </div>
            
        </div>
 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
"></script>    
</body>
</html>