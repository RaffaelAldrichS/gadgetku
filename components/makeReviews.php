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