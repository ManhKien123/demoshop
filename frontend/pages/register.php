    <!DOCTYPE html>
    <?php
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            include_once(__DIR__ . '/../../dbcontext.php');
            $u = $_POST['username'];
            $p = $_POST['password'];
            $confirm = $_POST['confirm_password'];
            $email = $_POST['email'];

            if($p != $confirm){
                $error = 'Passwords do not match';
            } else {
                $hash_p = password_hash($p, PASSWORD_DEFAULT);

                $sql = "SELECT id, username FROM users WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $u);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $error = "Username already exists";
                } else {
                    $sql = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $role = 'user';
                    $stmt->bind_param("ssss", $u, $hash_p, $email, $role);
                    if ($stmt->execute()) {
                        header('Location: login.php');
                        exit();
                    } else {
                        $error = 'An error occurred. Please try again.';
                    }
                }
            }

            $conn->close();
        }
    ?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Demo Shop</title>
        <?php include_once(__DIR__ . '/../layouts/styles.php'); ?>
    </head>

    <body>
        <?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>
        <!-- Header -->
        <?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>

        <main style="margin-top: 120px;">
                <div class="container">
                    <div class="row">
                        <div class = "col-md-4 offset-md-4">
                            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
                            <?php if (isset($error)): ?>
                                <div class="error-message" role="alert">
                                    <?= $error ?>
                                </div>
                            <?php endif; ?>
                                
                            <form method="post">
                            <div class="form-group">
                                <label for="floatingInput">Username</label> 
                                <input type="text" 
                                class="form-control" 
                                name="username" 
                                id="floatingInput" 
                                placeholder="Username">
                            </div>
                            <div class="form-group mt-2"> 
                                <label for="floatingPassword">Password</label> 
                                <input type="password" 
                                class="form-control" 
                                name="password" 
                                id="floatingPassword" 
                                placeholder="Password">
                            </div>
                            <div class="form-group mt-2"> 
                                <label for="floatingConfirmPassword">Confirm Password</label> 
                                <input type="password" 
                                class="form-control" 
                                name="confirm_password" 
                                id="floatingConfirmPassword" 
                                placeholder="Confirm Password">
                            </div>
                            <div class="form-group mt-2"> 
                                <label for="floatingEmail">Email</label> 
                                <input type="email" 
                                class="form-control" 
                                name="email" 
                                id="floatingEmail" 
                                placeholder="Email">
                            </div>

                            <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
                            <div>
                                Already have an account? <a href="login.php">Login here</a>
                            </div>
                            <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>
    </body>

    </html>