<?php
session_start();
include("database_conn.php");
    //check connections
    // if($conn){
    //     echo "Connected";
    // }
    // else{
    //     echo "Not Connected";
    // }

if (isset($_POST['email']) && isset($_POST['password'])) {
    // Sanitize input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    // Check if email is empty
    if (empty($email)) {
        echo "Email cannot be empty";
    }
    // Check if password is empty
    else if (empty($password)) {
        echo "Password cannot be empty";
    } else {
        // Hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // SQL query to insert user data into database
        $sql = "INSERT INTO user (email, password) VALUES ('$email', '$hash')";
        try{
            mysqli_query($conn, $sql);
            header("Location: login.php");
            echo"<div class='alert alert-success'>Registered successful!</div>";

            exit();
           }
           catch(Exception $e){
               echo "<div class='alert alert-warning'>Already registered!</div>";
           }
    }
}
// Close connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
    "></script>  
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <!-- form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5 ">
                    <div class="card-header text-center text-white">
                        <i class="bi bi-person-circle custom-size"></i>
                        <h3 class="text-center text-uppercase">Admin REGISTER</h3>
                    </div>
                    <div class="card-body text-white">
                        <form action="index.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                            </div>
                          
                            <div class="mb-3 w-100">
                                <div class="container">
                                    <div class="row justify-content-end">
                                        <input type="submit" class="btn w-25 me-3 text-uppercase text-white" value="Register"></input>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of form -->
</body>
</html>