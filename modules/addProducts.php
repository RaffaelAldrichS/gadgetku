<?php

require "functions.php";
if (isset($_POST["submit"])) {
    if (addProduct($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!')
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!')
            </script>
        ";
    }
}

?>
<div class="gadgetku-container">
    <div class="container my-3">
        <div class="review-container py-4 col-lg-8 mx-auto">
            <h2>Add Products</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_smartphone" class="form-label">Smarphone Name</label>
                    <input type="text" class="form-control" id="nama_smartphone" placeholder="" name="nama_smartphone" />
                </div>
                <div class="mb-3">
                    <label for="id_brand" class="form-label">Brand / Merk</label>
                    <select name="id_brand" id="id_brand" class="form-select">
                        <option value="1">iPhone</option>
                        <option value="2">Asus</option>
                        <option value="3">Samsung</option>
                        <option value="4">Xiaomi</option>
                        <option value="5">Infinix</option>
                        <option value="6">Vivo</option>
                        <option value="7">Oppo</option>
                        <option value="8">Realme</option>
                        <option value="9">Poco</option>
                        <option value="10">Itel</option>
                        <option value="11">Tecno</option>
                    </select>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="ram" class="form-label">Ram</label>
                        <input type="number" class="form-control" id="ram" placeholder="" name="ram" />
                    </div>
                    <div class="col">
                        <label for="storage" class="form-label">Storage</label>
                        <input type="number" class="form-control" id="storage" placeholder="" name="storage" />
                    </div>
                    <div class="col">
                        <label for="ukuran_layar" class="form-label">Dimension</label>
                        <input type="text" class="form-control" id="ukuran_layar" placeholder="" name="ukuran_layar" />
                    </div>
                </div>
                <div class="mb-3">
                    <label for="resolusi_kamera" class="form-label">Camera</label>
                    <input type="text" class="form-control" id="resolusi_kamera" placeholder="" name="resolusi_kamera" />
                </div>
                <div class="mb-3">
                    <label for="baterai" class="form-label">Battery</label>
                    <input type="number" class="form-control" id="baterai" placeholder="" name="baterai" />
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Price (Rp)</label>
                    <input type="number" class="form-control" id="harga" placeholder="" name="harga" />
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" />
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Description</label>
                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" placeholder="Leave a comment..."></textarea>
                </div>
                <div class="mb-3">
                    <div class="col-12">
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Add</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product Confirmation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to add this product?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="submit">Yes, Add Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>