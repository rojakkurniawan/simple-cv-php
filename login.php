<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    $query = "SELECT * FROM account WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: update.php"); 
        exit();
    } else {
        $error_message = "Username atau password salah!";
    }

    $stmt->close(); // Tutup statement
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="assets/style_login.css">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand navbar-text" href="index.php">ADMIN DASHBOARD.</a>
        </div>
    </nav>
    <div class="container">
        <div class="card form-login">
            <h2 class="card-title mt-3">Login</h2>
            <h6 class="card-subtitle text-muted mb-4">Sign in to your account</h6>
            <?php if (isset($error_message)) { echo "<p style='color:red;'>$error_message</p>"; } ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label label-info"><i data-feather="mail" class="icon-info"></i>Email address</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type your username here" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><i data-feather="key" class="icon-info"></i>Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Type your password here" required>
                </div>
                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-light btn-login">Login</button>
                </div>
                <div class="d-grid mt-3 text-center">
                    <div class="strip"></div>
                </div>
                <div>
                    <p>Don't have an account?  <a href="register.html" class="createLink" >Create an account</a></p>
                </div>
            </form>
        </div>
    </div>
    <footer class="container p-4 rounded">
        <div class="d-lg-flex justify-content-between">
            <div>
                <p>Made With Love ❤️</p>
            </div>
            <div>
                <ul class="d-flex gap-3 list-unstyled" style="margin-left: 10px;">
                    <li><a href="https://www.instagram.com/rojak41_/" target="_blank"><i data-feather="instagram" class="icon-info" style="margin-bottom: 3px;"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script>
        feather.replace()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>
