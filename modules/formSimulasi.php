<div class="gadgetku-container">
    <div class="container my-5 col-8 bg-light rounded-4 p-4">
        <h1 class="text-center mb-4">Simulasi Kredit</h1>
        <form action="index.php?target=hitungKredit" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="hargaBarang" class="form-label">Harga Barang (Rupiah)</label>
                <input type="number" class="form-control" id="hargaBarang" name="hargaBarang" required />
            </div>
            <div class="mb-3">
                <label for="bungaPinjaman" class="form-label">Bunga Pinjaman Flat(5% - 10%) /Tahun</label>
                <select class="form-select" name="bungaPinjaman" id="bungaPinjaman">
                    <option value="5">5%</option>
                    <option value="6">6%</option>
                    <option value="7" selected>7%</option>
                    <option value="8">8%</option>
                    <option value="9">9%</option>
                    <option value="10">10%</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="uangMuka" class="form-label">Uang Muka (30% - 100%)</label>
                <input type="number" class="form-control" id="uangMuka" name="uangMuka" min="30" max="100" required />
            </div>
            <div class="mb-3">
                <label for="jangkaWaktu" class="form-label">Jangka Waktu (Tenor)<span> (1 - 5 Tahun)</span></label>
                <select class="form-select" name="jangkaWaktu" id="jangkaWaktu">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3" selected>3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <input type="submit" class="btn bg-hijau px-4 me-md-2 rounded-3 text-putih" value="Hitung">
        </form>
    </div>
</div>