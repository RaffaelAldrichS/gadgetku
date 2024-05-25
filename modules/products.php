<?php

require "functions.php";
$brandSmartphone = query("SELECT * FROM brand WHERE id_brand BETWEEN 1 AND 11 ORDER BY id_brand ASC;");

?>
<!-- Carousel -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/carousel1.jpeg" class="d-block w-100 h-40" alt="carousel1">
        </div>
        <div class="carousel-item">
            <img src="./img/carousel2.jpeg" class="d-block w-100 h-40" alt="carousel2">
        </div>
        <div class="carousel-item">
            <img src="./img/carousel3.jpg" class="d-block w-100 h-40" alt="carousel3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Category -->
<div class="container py-5">
    <!-- Smartphone -->
    <div class="my-4">
        <div class="d-flex justify-content-between align-items-end mb-3">
            <h4 class="fw-semibold">Smartphone</h4>
            <!-- <a href="#">See All</a> -->
        </div>
        <div class="row">
            <?php foreach ($brandSmartphone as $brand) : ?>
                <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                    <a href="index.php?target=brandProducts&id=<?php echo $brand['id_brand'] ?>" class="text-decoration-none text-dark">
                        <div class="merk-container rounded-4 shadow-sm py-4 text-center">
                            <img src="./img/xiaomimerk.png" alt="merk<?php echo $brand['nama_brand'] ?>" width="130px">
                        </div>
                        <h6 class="text-center fw-semibold mt-3"><?php echo $brand['nama_brand'] ?></h6>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Laptops -->
    <div class="my-4">
        <div class="d-flex justify-content-between align-items-end mb-3">
            <h4 class="fw-semibold">Laptop</h4>
            <a href="#">See All</a>
        </div>
        <div class="row">
            <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                <div class="merk-container rounded-4 shadow-sm py-4 text-center">
                    <img src="./img/msimerk.png" alt="merkmac" width="130px">
                </div>
                <h6 class="text-center fw-semibold mt-3">MacBook</h6>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                <div class="merk-container rounded-4 shadow-sm py-4 text-center">
                    <img src="./img/msimerk.png" alt="merkasus" width="130px">
                </div>
                <h6 class="text-center fw-semibold mt-3">Asus</h6>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                <div class="merk-container rounded-4 shadow-sm py-4 text-center">
                    <img src="./img/msimerk.png" alt="merkhp" width="130px">
                </div>
                <h6 class="text-center fw-semibold mt-3">HP</h6>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                <div class="merk-container rounded-4 shadow-sm py-4 text-center">
                    <img src="./img/msimerk.png" alt="merkacer" width="130px">
                </div>
                <h6 class="text-center fw-semibold mt-3">Acer</h6>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                <div class="merk-container rounded-4 shadow-sm py-4 text-center">
                    <img src="./img/msimerk.png" alt="merkmsi" width="130px">
                </div>
                <h6 class="text-center fw-semibold mt-3">MSI</h6>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                <div class="merk-container rounded-4 shadow-sm py-4 text-center">
                    <img src="./img/msimerk.png" alt="merkaxio" width="130px">
                </div>
                <h6 class="text-center fw-semibold mt-3">Axio</h6>
            </div>
        </div>
    </div>
</div>