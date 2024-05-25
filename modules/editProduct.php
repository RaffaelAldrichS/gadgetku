<?php
require 'functions.php';
if (isset($_GET['id'])) {
    $product = query("SELECT * FROM smartphone WHERE id_smartphone = {$_GET['id']}")[0];
}

if (isset($_POST["submit"])) {
    if (updateProduct($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diupdate!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diupdate!');
            </script>
        ";
    }
}
?>

<div class="container my-3">
    <div class="col-lg-8 mx-auto">
        <h2>Edit Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_smartphone" value="<?= $product['id_smartphone']; ?>">
            <input type="hidden" name="gambarLama" value="<?= $product['gambar']; ?>">
            <div class="mb-3">
                <label for="nama_smartphone" class="form-label">Smartphone Name</label>
                <input type="text" class="form-control" id="nama_smartphone" name="nama_smartphone" value="<?= $product['nama_smartphone']; ?>" />
            </div>
            <div class="mb-3">
                <label for="id_brand" class="form-label">Brand / Merk</label>
                <select name="id_brand" id="id_brand" class="form-select">
                    <option value="1" <?= $product['id_brand'] == 1 ? 'selected' : ''; ?>>iPhone</option>
                    <option value="2" <?= $product['id_brand'] == 2 ? 'selected' : ''; ?>>Asus</option>
                    <option value="3" <?= $product['id_brand'] == 3 ? 'selected' : ''; ?>>Samsung</option>
                    <option value="4" <?= $product['id_brand'] == 4 ? 'selected' : ''; ?>>Xiaomi</option>
                    <option value="5" <?= $product['id_brand'] == 5 ? 'selected' : ''; ?>>Infinix</option>
                    <option value="6" <?= $product['id_brand'] == 6 ? 'selected' : ''; ?>>Vivo</option>
                    <option value="7" <?= $product['id_brand'] == 7 ? 'selected' : ''; ?>>Oppo</option>
                    <option value="8" <?= $product['id_brand'] == 8 ? 'selected' : ''; ?>>Realme</option>
                    <option value="9" <?= $product['id_brand'] == 9 ? 'selected' : ''; ?>>Poco</option>
                    <option value="10" <?= $product['id_brand'] == 10 ? 'selected' : ''; ?>>Itel</option>
                    <option value="11" <?= $product['id_brand'] == 11 ? 'selected' : ''; ?>>Tecno</option>
                </select>
            </div>
            <div class="row g-3 mb-3">
                <div class="col">
                    <label for="ram" class="form-label">Ram</label>
                    <input type="number" class="form-control" id="ram" name="ram" value="<?= $product['ram']; ?>" />
                </div>
                <div class="col">
                    <label for="storage" class="form-label">Storage</label>
                    <input type="number" class="form-control" id="storage" name="storage" value="<?= $product['storage']; ?>" />
                </div>
                <div class="col">
                    <label for="ukuran_layar" class="form-label">Dimension</label>
                    <input type="text" class="form-control" id="ukuran_layar" name="ukuran_layar" value="<?= $product['ukuran_layar']; ?>" />
                </div>
            </div>
            <div class="mb-3">
                <label for="resolusi_kamera" class="form-label">Camera</label>
                <input type="text" class="form-control" id="resolusi_kamera" name="resolusi_kamera" value="<?= $product['resolusi_kamera']; ?>" />
            </div>
            <div class="mb-3">
                <label for="baterai" class="form-label">Battery</label>
                <input type="number" class="form-control" id="baterai" name="baterai" value="<?= $product['baterai']; ?>" />
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Price (Rp)</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $product['harga']; ?>" />
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="gambar" name="gambar" />
                <img src="img/products/<?= $product['gambar']; ?>" width="150">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Description</label>
                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"><?= $product['deskripsi']; ?></textarea>
            </div>
            <div class="mb-3">
                <div class="col-12">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Update</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Product Confirmation</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to update this product?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Yes, Update Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>