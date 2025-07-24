    <!DOCTYPE html>
    <?php
        session_start();
        if (isset($_SESSION['user_id']))
        {
            header('Location: /demoshop/frontend/index.php');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            include_once(__DIR__ . '/../../dbcontext.php');
            $u = $_POST['username'];
            $p = $_POST['password'];
            $sql = "SELECT id, username, password FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $u);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_array(MYSQLI_NUM);
                if (password_verify($p, $row[2])) {
                    header('Location: /demoshop/frontend/index.php');
                    exit();
                } else{
                    $error = 'Invalid username or password';
                }
            } else {
                $error = 'Invalid username or password';
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
                            
                            <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Login</button>
                            <div>
                                Don't have an account? <a href="register.php">Register here</a>
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