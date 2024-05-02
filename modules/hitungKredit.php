<?php

// Fungsi untuk menghitung angsuran bulanan
function hitungAngsuranBulanan($jumlahPinjaman, $tingkatBungaTahunan, $uangMuka, $jangkaWaktu)
{
    $tingkatBungaBulanan = $tingkatBungaTahunan / 12 / 100;
    $jumlahPinjamanSetelahUangMuka = $jumlahPinjaman - ($jumlahPinjaman * $uangMuka / 100);
    $numerator = $jumlahPinjamanSetelahUangMuka * $tingkatBungaBulanan;
    $penyebut = 1 - pow(1 + $tingkatBungaBulanan, -$jangkaWaktu);
    $angsuranBulanan = $numerator / $penyebut;
    return $angsuranBulanan;
}

// Fungsi untuk membuat tabel angsuran
function buatJadwalPembayaran($jumlahPinjaman, $tingkatBungaTahunan, $uangMuka, $jangkaWaktu)
{
    // Mengonversi jangka waktu dari tahun ke bulan
    $jangkaWaktuBulan = $jangkaWaktu * 12;

    // Menghitung jumlah pinjaman aktual setelah dikurangi uang muka
    $jumlahPinjamanAktual = $jumlahPinjaman - ($jumlahPinjaman * $uangMuka / 100);

    // Menghitung angsuran pokok tetap setiap bulan
    $angsuranPokokBulanan = $jumlahPinjamanAktual / $jangkaWaktuBulan;

    // Menghitung bunga tetap setiap bulan berdasarkan jumlah pinjaman awal
    $bungaBulanan = ($jumlahPinjamanAktual * $tingkatBungaTahunan / 100) / 12;

    // Menghitung total pembayaran bulanan (angsuran pokok + bunga)
    $angsuran = $angsuranPokokBulanan + $bungaBulanan;

    $jadwalPembayaran = [];
    $sisaSaldo = $jumlahPinjamanAktual;
    $totalPokok = 0;
    $totalBunga = 0;
    $totalPembayaran = 0;

    for ($i = 1; $i <= $jangkaWaktuBulan; $i++) {
        // Memasukkan data pembayaran ke dalam array
        $jadwalPembayaran[] = [
            'Bulan' => $i,
            'Pokok' => $angsuranPokokBulanan,
            'Bunga' => $bungaBulanan,
            'TotalPembayaran' => $angsuran,
            'Saldo' => $sisaSaldo -= $angsuranPokokBulanan, // Mengurangi sisa pinjaman dengan pembayaran pokok
        ];

        // Menghitung total pembayaran
        $totalPokok += $angsuranPokokBulanan;
        $totalBunga += $bungaBulanan;
        $totalPembayaran += $angsuran;
    }

    return [
        'jadwalPembayaran' => $jadwalPembayaran,
        'totalPokok' => $totalPokok,
        'totalBunga' => $totalBunga,
        'totalPembayaran' => $totalPembayaran,
        'sisaSaldo' => $sisaSaldo // Sisa pinjaman berdasarkan total angsuran pokok yang sudah dibayarkan
    ];
}


// Mengambil nilai dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hargaProduk = $_POST['hargaBarang'];
    $tingkatBunga = $_POST['bungaPinjaman'];
    $uangMuka = $_POST['uangMuka'];
    $jangkaWaktu = $_POST['jangkaWaktu'];

    // Perhitungan
    $pinjamanFlat = $hargaProduk * ($tingkatBunga / 100);
    $totalPinjaman = $hargaProduk + $pinjamanFlat;
    $uangMukaJumlah = $hargaProduk * ($uangMuka / 100);
    $sisaPinjaman = $totalPinjaman - $uangMukaJumlah;

    // Tabel Angsuran
    $hasil = buatJadwalPembayaran($hargaProduk, $tingkatBunga, $uangMuka, $jangkaWaktu);
    $jadwalPembayaran = $hasil['jadwalPembayaran'];
    $totalPokok = $hasil['totalPokok'];
    $totalBunga = $hasil['totalBunga'];
    $totalPembayaran = $hasil['totalPembayaran'];
    $sisaSaldo = $hasil['sisaSaldo'];
}

?>
<div class="gadgetku-container">
    <div class="container my-5">
        <div class="kredit-inputan col-lg-6 mx-auto my-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" colspan="2">
                            <h3 class="text-center">Kredit</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-end">Harga Barang :</td>
                        <td class="text-start">Rp <?php echo number_format($hargaProduk, 2); ?></td>
                    </tr>
                    <tr>
                        <td class="text-end">Uang Muka :</td>
                        <td class="text-start">Rp <?php echo number_format($uangMukaJumlah, 2); ?> <br> (<?php echo $uangMuka; ?>%)</td>
                    </tr>
                    <tr>
                        <td class="text-end">Jangka Waktu :</td>
                        <td class="text-start"><?php echo $jangkaWaktu; ?> Tahun <br>(<?php echo $jangkaWaktu * 12; ?> bulan)</td>
                    </tr>
                    <tr>
                        <td class="text-end">Bunga Pinjaman :</td>
                        <td class="text-start"><?php echo $tingkatBunga; ?> %</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tabel-angsuranm my-5">
            <h2 class="text-center mb-3">Simulasi Angsuran</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Bulan</th>
                        <th scope="col">Angsuran Pokok</th>
                        <th scope="col">Bunga</th>
                        <th scope="col">Total Angsuran</th>
                        <th scope="col">Sisa Pinjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Menambahkan bulan 0 dengan sisa pinjaman saja -->
                    <tr>
                        <td>0</td>
                        <td>Rp 0,00</td>
                        <td>Rp 0,00</td>
                        <td>Rp 0,00</td>
                        <td>Rp <?php echo number_format($hargaProduk - $uangMukaJumlah, 2); ?></td>
                    </tr>

                    <!-- Loop untuk tabel angsuran -->
                    <?php foreach ($jadwalPembayaran as $pembayaran) : ?>
                        <tr>
                            <td><?php echo $pembayaran['Bulan']; ?></td>
                            <td>Rp <?php echo number_format($pembayaran['Pokok'], 2); ?></td>
                            <td>Rp <?php echo number_format($pembayaran['Bunga'], 2); ?></td>
                            <td>Rp <?php echo number_format($pembayaran['TotalPembayaran'], 2); ?></td>
                            <td>Rp <?php echo number_format($pembayaran['Saldo'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <!-- Menambahkan total -->
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>Rp <?php echo number_format($totalPokok, 2); ?></strong></td>
                        <td><strong>Rp <?php echo number_format($totalBunga, 2); ?></strong></td>
                        <td><strong>Rp <?php echo number_format($totalPembayaran, 2); ?></strong></td>
                        <td><strong>Rp <?php echo number_format($sisaSaldo, 2); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>