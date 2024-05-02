<head>
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
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<div class="gadgetku-container">
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
                <div class="review-container py-4 col-lg-8 mx-auto">
                    <h2>Make Review</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product name</label>
                            <input type="text" class="form-control" id="product_name" placeholder="" name="product_name" />
                        </div>
                        <!-- Puchase Date -->
                        <div class="mb-3">
                            <label for="purchase_date" class="form-label">Purchase date</label>
                            <input type="date" class="form-control" id="purchase_date" placeholder="" name="purchase_date" />
                        </div>
                        <!-- Additional Value -->
                        <div class="additional_value mb-3">
                            <label class="form-label d-block">Additional value</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="complete_and_good_product" value="Complete and good product" name="additional_value[]" />
                                <label class="form-check-label" for="complete_and_good_product">Complete and good product</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friendly_seller_and_shipper" value="Friendly seller and shipper" name="additional_value[]" />
                                <label class="form-check-label" for="friendly_seller_and_shipper">Friendly seller and shipper</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="fast_delivery" value="Fast delivery" name="additional_value[]" />
                                <label class="form-check-label" for="fast_delivery">Fast delivery</label>
                            </div>
                        </div>
                        <!-- Product Photo -->
                        <div class="mb-3">
                            <label for="product_photo" class="form-label">Product Photo</label>
                            <input class="form-control" type="file" id="product_photo" name="product_photo" />
                        </div>
                        <!-- Your message -->
                        <div class="mb-3">
                            <label for="review" class="form-label">Your message</label>
                            <textarea class="form-control" id="review" rows="3" name="review" placeholder="Leave a comment..."></textarea>
                        </div>
                        <!-- User Rating -->
                        <div class="user-rating my-4">
                            <label class="form-label d-block">Rating</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating-1" value="1" />
                                <label class="form-check-label" for="rating-1">1⭐</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating-2" value="2" />
                                <label class="form-check-label" for="rating-2">2⭐</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating-3" value="3" />
                                <label class="form-check-label" for="rating-3">3⭐</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating-4" value="4" />
                                <label class="form-check-label" for="rating-4">4⭐</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating-5" value="5" checked />
                                <label class="form-check-label" for="rating-5">5⭐</label>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn bg-hijau px-4 me-md-2 rounded-3 text-putih">Submit</button>
                    </form>
                </div>
            </div>
            <!-- Konten untuk Show Review -->
            <div class="tab-pane fade" id="show-review" role="tabpanel" aria-labelledby="show-review-tab">
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
            </div>
        </div>
    </div>
</div>