    <!DOCTYPE html>
    <?php
    session_start();
    ?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Demo Shop</title>
        <?php include_once(__DIR__ . '/layouts/styles.php'); ?>
    </head>

    <body>
        <?php include_once(__DIR__ . '/layouts/scripts.php'); ?>
        <!-- Header -->
        <?php include_once(__DIR__ . '/layouts/partials/header.php'); ?>

        <!-- Main content -->
        <main>
            <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1" class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/demoshop/assets/uploads/slider/slider1.jpg" alt="Slide 1">
                        <div class="container">
                            <div class="carousel-caption text-start">
                                <!-- <h1>Example headline.</h1>
                                <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/demoshop/assets/uploads/slider/slider2.jpg" alt="Slide 2">
                        <div class="container">
                            <div class="carousel-caption">
                                <!-- <h1>Another example headline.</h1>
                                <p>Some representative placeholder content for the second slide of the carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button> <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="container marketing"> <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="marketing-icon">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                        </div>
                        <h2 class="fw-normal">Purchase Subscription</h2>
                        <p>Lorem ipsum</p>
                        <p><a class="btn btn-secondary" href="#">View details »</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="marketing-icon">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                        </div>
                        <h2 class="fw-normal">Add Products</h2>
                        <p>Add product details here.</p>
                        <p><a class="btn btn-secondary" href="#">View details »</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="marketing-icon">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                        </div>
                        <h2 class="fw-normal">Manage order</h2>
                        <p>Manage what you buy</p>
                        <p><a class="btn btn-secondary" href="#">View details »</a></p>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row --> <!-- START THE FEATURETTES -->
                <hr class="featurette-divider">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-body-secondary">It’ll blow your mind.</span></h2>
                        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
                    </div>
                    <div class="col-md-5"> <svg aria-label="Placeholder: 500x500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" height="500" preserveAspectRatio="xMidYMid slice" role="img" width="500" xmlns="http://www.w3.org/2000/svg">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                        </svg> </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-body-secondary">Checkmate.</span></h2>
                        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
                    </div>
                    <div class="col-md-5"> <svg aria-label="Placeholder: 500x500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" height="500" preserveAspectRatio="xMidYMid slice" role="img" width="500" xmlns="http://www.w3.org/2000/svg">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                        </svg> </div>
                </div>
                <hr class="featurette-divider">

                <hr class="featurette-divider">
                <!-- Display producrs -->
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                        
                        <div class="col">
                            <?php
                            include_once(__DIR__ . '/../dbcontext.php');
                            $sql = 'SELECT id, name, price, image_url FROM products ';
                            $result = $conn->query($sql);
                            $data = [];
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array(MYSQLI_NUM)) { {
                                        $data[] = $row;
                                    }
                                }
                                $result->free_result();
                            }
                            $conn->close();
                            ?>
                            <?php foreach ($data as $item) : ?>
                                <div class="col">
                                <div class="card shadow-sm"> 
                                    <img src="/DemoShop/assets/<?= $item[3] ?>" alt="">
                                    <div class="card-body">
                                        <p class="card-text"><?php $item[1]; ?></p>
                                        <p class="card-text">Price: <?= $item[2] ?>$</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Add</a>
                                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div> <!-- /END THE FEATURETTES -->

        </main>

        <!-- Footer -->
        <?php include_once(__DIR__ . '/layouts/partials/footer.php'); ?>
    </body>

    </html>