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
            <div class="col-xl-3 col-md-4 mb-4 d-flex justify-content-center">
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
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="btn btn-success px-4 me-2 rounded-4 text-white" href="index.php?target=formSimulasi" role="button">Buy</a>
                            <a class="btn btn-light px-4 rounded-4 text-dark" href="index.php?target=productDetail" role="button">Details</a>
                            <!-- Dropdown for edit and delete -->
                            <div class="dropdown ms-2">
                                <button class="btn btn-light" type="button" id="dropdownMenuButton<?= $product['id_smartphone']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $product['id_smartphone']; ?>">
                                    <li><a class="dropdown-item" href="index.php?target=editProduct&id=<?= $product['id_smartphone']; ?>">Edit</a></li>
                                    <li><button type="button" class="dropdown-item delete-product" data-id="<?= $product['id_smartphone']; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $product['id_smartphone']; ?>">Delete</button></li>
                                </ul>
                            </div>
                            <div class="modal fade" id="deleteModal<?= $product['id_smartphone']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $product['id_smartphone']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel<?= $product['id_smartphone']; ?>">Delete Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this product?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="index.php?target=deleteProduct&id=<?= $product['id_smartphone']; ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>