<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100">
    <!-- header -->
    <?php include_once(__DIR__ .
        '/../layouts/partials/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <?php include_once(__DIR__ .
                '/../layouts/partials/sidebar.php'); ?>
            <!-- end sidebar -->
            <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
                <!-- main content -->
            </main>
        </div>
    </div>

    <!-- footer -->
    <?php include_once(__DIR__ .
        '/../layouts/partials/footer.php'); ?>

    <?php include_once(__DIR__ .
        '/../layouts/script.php'); ?>
</body>

</html>