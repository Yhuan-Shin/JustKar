<?php
session_start();

// Include your database connection file here
require_once "database_conn.php";

// Check if the login form is submitted
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
        // SQL query to retrieve user data from the database
        $sql = "SELECT id, email, password FROM user WHERE email = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if email exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $email, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to welcome page
                            header("location: admin_side.html");
                        } else {
                            // Password is not valid, display an error message
                            echo "<div class='alert alert-danger'>Invalid password.</div>";
                        }
                    }
                } else {
                    // Email doesn't exist, display an error message
                    echo "<div class='alert alert-danger'>User not found.</div>";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
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
                        <h3 class="text-center text-uppercase">Admin LOGIN</h3>
                    </div>
                    <div class="card-body text-white">
                        <form action="login_form.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                            </div>
                            <div class="mb-3">
                               <input type="checkbox" name="remember" id="remember">
                               <label for="remember" class="form-label">Remember me</label>
                               <a href="#" class="float-end text-white text-decoration-none">Forget Password</a>
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