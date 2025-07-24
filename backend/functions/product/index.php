<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <?php include_once(__DIR__ .
    '/../../layouts/partials/header.php'); ?>
</head>

<body class="d-flex flex-column h-100">
    <!-- header -->
    <?php include_once(__DIR__ .
        '/../../layouts/partials/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <?php include_once(__DIR__ .
                '/../../layouts/partials/sidebar.php'); ?>
            <!-- end sidebar -->
            <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
                <div>
                    <a href="create.php" class="btn btn-primary btn-sm">Create Product</a>
                </div>
                <table class="table">
                    <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    include_once(__DIR__ . '/../../../dbcontext.php');
                    $sql = 'SELECT id, name, price, category, image_url FROM products';
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $data[] = $row;
                        }
                        $result->free_result();
                    }
                    $conn->close();

                    foreach ($data as $item) :
                    ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo $item['category']; ?></td>
                        <td><img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['name']; ?>" width="100"></td>
                        <td>
                            <a href="edit.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <a href="view.php?id=<?php echo $item['id']; ?>" class="btn btn-info btn-sm">View</a>
                        </td>
                    <!--img src ='demoshop/assets/upload/image_url'-->
                    </tr>
                        
                    <?php endforeach; ?>
                </tbody>
                </table>
            </main>
        </div>
    </div>

    <!-- footer -->
    <?php include_once(__DIR__ .
        '/../../layouts/partials/footer.php'); ?>

    <!-- <?php include_once(__DIR__ .
        '/../../layouts/script.php'); ?> -->
</body>

</html>