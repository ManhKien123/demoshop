<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Demo shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/demoshop/frontend/index.php">Home</a> </li>
                <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/demoshop/frontend/pages/about.php">About</a> </li>
                <li class="nav-item"> <a class="nav-link active" aria-current="page" href="/demoshop/frontend/pages/viewCart.php">View Cart</a> </li>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a class="nav-link" href="/demoshop/frontend/pages/logout.php">Logout</a>
                <?php else: ?>
                    <li class="nav-item"> <a class="nav-link" href="/demoshop/frontend/pages/login.php">Login</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="/demoshop/frontend/pages/register.php">Register</a> </li>
                <?php endif ?>
            </ul>
            <form class="d-flex" role="search"> <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> <button class="btn btn-outline-success" type="submit">Search</button> </form>
        </div>
    </div>
</nav>