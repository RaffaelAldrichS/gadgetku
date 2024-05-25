<?php
require 'functions.php';
if (isset($_GET['id'])) {
    $namaBrand = query("SELECT nama_brand FROM brand WHERE id_brand = {$_GET['id']}")[0]["nama_brand"];
    $products = query("SELECT * from smartphone WHERE id_brand = {$_GET['id']}");
}
?>

<div class="container py-2">
    <h2 class="fw-semibold text-center my-5"><?= $namaBrand; ?></h2>
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <div class=" col-xl-3 col-md-4 mb-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card rounded-5 h-100 pb-3">
                        <!-- Product image-->
                        <img src="./img/infinix note 40.png" loading="lazy" width="100%">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $product['nama_smartphone']; ?></h5>
                                <!-- Product price-->
                                Rp <?= number_format($product['harga'], 0, ',', '.'); ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="lc-block d-grid gap-1 d-md-flex justify-content-center">
                            <a class="btn bg-hijau px-4 me-md-2 rounded-4 text-putih" href="index.php?target=formSimulasi" role="button">Buy</a>
                            <a class="btn bg-putih px-4 rounded-4 text-hitam" href="index.php?target=productDetail" role="button">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>