<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GadgetKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="gadgetku-container">
        <?php include './components/navbar.php' ?>

        <section id="content">
            <?php
            if (isset($_GET['target'])) {
                $target = $_GET['target'];
                if ($target == 'homepage') {
                    require('modules/homepage.php');
                } else if ($target == 'products') {
                    require('modules/products.php');
                } else if ($target == 'support') {
                    require('modules/support.php');
                } else if ($target == 'productDetail') {
                    require('modules/productDetail.php');
                } else if ($target == 'reviews') {
                    require('modules/reviews.php');
                } else if ($target == 'hitungKredit') {
                    require('modules/hitungKredit.php');
                } else if ($target == 'formSimulasi') {
                    require('modules/formSimulasi.php');
                } else if ($target == 'addProducts') {
                    require('modules/addProducts.php');
                } else if ($target == 'brandProducts') {
                    require('modules/brandProducts.php');
                }
            } else {
                require('modules/homepage.php');
            }
            ?>
        </section>

        <?php include './components/footer.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>