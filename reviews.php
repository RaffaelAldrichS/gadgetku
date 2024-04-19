<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetKu - Review Page</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JavaScript for Tab Switching -->
    <script>
        $(document).ready(function() {
            $('.nav-tabs').on('shown.bs.tab', function(event) {
                const activeTab = $(event.target).attr('href');
                localStorage.setItem('activeTab', activeTab);
            });

            const activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
</head>

<body>
    <div class="gadgetku-container">
        <!-- Navbar Component -->
        <?php include './components/navbar.php' ?>

        <!-- Tab Content -->
        <div class="container my-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="make-review-tab" data-toggle="tab" href="#make-review" role="tab" aria-controls="make-review" aria-selected="true">Make Review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="show-review-tab" data-toggle="tab" href="#show-review" role="tab" aria-controls="show-review" aria-selected="false">Show Review</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Konten untuk Make Review -->
                <div class="tab-pane fade show active my-3" id="make-review" role="tabpanel" aria-labelledby="make-review-tab">
                    <?php include './components/makeReviews.php' ?>
                </div>
                <!-- Konten untuk Show Review -->
                <div class="tab-pane fade" id="show-review" role="tabpanel" aria-labelledby="show-review-tab">
                    <?php include './components/showReviews.php' ?>
                </div>
            </div>
        </div>

        <!-- Footer Component -->
        <?php include './components/footer.php' ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>