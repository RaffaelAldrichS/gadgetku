<?php
// Mengambil nilai dari formulir jika ada yang dikirim
if (isset($_POST["submit"])) {
    // Menyimpan nilai dari formulir ke variabel
    $product_name = $_POST["product_name"];
    $purchase_date = $_POST["purchase_date"];
    $additional_value = isset($_POST["additional_value"]) ? implode(', ', array_map('htmlspecialchars', $_POST["additional_value"])) : '';
    $review = $_POST["review"];
    $rating = $_POST["rating"];
    $receive = true;
}
?>

<div class="review-container py-4 col-lg-12 mx-auto">
    <div class="card my-3">
        <div class="card-header">
            User 01 ~
        </div>
        <div class="card-body">
            <p class="card-text my-1">2024-04-17</p>
            <h5 class="card-title">Iphone 15 - 5⭐</h5>
            <h6 class="fw-medium">Fast delivery</h6>
            <p class="card-text">Daya tahan baterainya juga luar biasa. Saya bisa menggunakan smartphone ini sepanjang hari tanpa perlu khawatir kehabisan daya, bahkan dengan penggunaan intensif.</p>

        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            User 02 ~
        </div>
        <div class="card-body">
            <p class="card-text my-1">2022-04-17</p>
            <h5 class="card-title">Redmi Note 14 - 5⭐</h5>
            <h6 class="fw-medium">Complete and good product</h6>
            <p class="card-text">Fitur keamanan tambahan seperti pemindai sidik jari dan pengenalan wajah menambahkan lapisan keamanan yang sangat dihargai bagi saya. Saya merasa yakin bahwa data pribadi saya aman di dalam smartphone ini.</p>

        </div>
    </div>
    <?php if (isset($receive)) : ?>
        <div class="card my-3">
            <div class="card-header">
                User 03 ~
            </div>
            <div class="card-body">
                <p class="card-text my-1"><?= $purchase_date ?></p>
                <h5 class="card-title"><?= $product_name ?> - <?= $rating ?>⭐</h5>
                <h6 class="fw-medium"><?= $additional_value ?></h6>
                <p class="card-text"><?= $review ?></p>

            </div>
        </div>
    <?php endif; ?>
</div>