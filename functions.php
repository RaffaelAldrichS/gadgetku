<?php

$conn = mysqli_connect("localhost", "root", "", "gadgetku_project");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function addProduct($data)
{
    global $conn;
    $nama_smartphone = htmlspecialchars($data["nama_smartphone"]);
    $id_brand = htmlspecialchars($data["id_brand"]);
    $ram = htmlspecialchars($data["ram"]);
    $storage = htmlspecialchars($data["storage"]);
    $ukuran_layar = htmlspecialchars($data["ukuran_layar"]);
    $resolusi_kamera = htmlspecialchars($data["resolusi_kamera"]);
    $baterai = htmlspecialchars($data["baterai"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $query = "INSERT INTO smartphone VALUES(
        '', '$nama_smartphone', '$id_brand', '$ram', '$storage', '$ukuran_layar', '$resolusi_kamera', '$baterai', '$harga', '$gambar', '$deskripsi'
    )";
    mysqli_query($conn, $query);
    $result = mysqli_affected_rows($conn);
    // Menambahkan data produk ke file dataProduct.txt
    if ($result > 0) {
        $productData = "nama_smartphone: $nama_smartphone, id_brand: $id_brand,ram $ram, storage: $storage, ukuran_layar: $ukuran_layar, resolusi_kamera $resolusi_kamera,baterai: $baterai,harga: $harga, gambar: $gambar, deskripsi: $deskripsi" . PHP_EOL;
        file_put_contents('dataProduct.txt', $productData, FILE_APPEND);
    }
    return $result;
}
function upload()
{
    $fileName = $_FILES['gambar']['name'];
    $fileSize = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tempName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
            alert('Gambar tidak boleh kosong!')
        </script>
        ";
    }

    $imageExtension = ['jpeg', 'jpg', 'png'];
    $userExtension = explode('.', $fileName);
    $userExtension = strtolower(end($userExtension));
    if (!in_array($userExtension, $imageExtension)) {
        echo "
            <script>
                alert('File yang Anda upload bukan gambar!')
            </script>
        ";
        return false;
    }

    $uniqName = uniqid();
    $uniqName .= ".";
    $uniqName .= $userExtension;
    move_uploaded_file($tempName, 'img/products/' . $uniqName);
    return $uniqName;
}

function updateProduct($data)
{
    global $conn;
    $id = htmlspecialchars($data["id_smartphone"]);
    $nama_smartphone = htmlspecialchars($data["nama_smartphone"]);
    $id_brand = htmlspecialchars($data["id_brand"]);
    $ram = htmlspecialchars($data["ram"]);
    $storage = htmlspecialchars($data["storage"]);
    $ukuran_layar = htmlspecialchars($data["ukuran_layar"]);
    $resolusi_kamera = htmlspecialchars($data["resolusi_kamera"]);
    $baterai = htmlspecialchars($data["baterai"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }

    $query = "UPDATE smartphone SET 
                nama_smartphone = '$nama_smartphone', 
                id_brand = '$id_brand', 
                ram = '$ram', 
                storage = '$storage', 
                ukuran_layar = '$ukuran_layar', 
                resolusi_kamera = '$resolusi_kamera', 
                baterai = '$baterai', 
                harga = '$harga', 
                gambar = '$gambar', 
                deskripsi = '$deskripsi'
              WHERE id_smartphone = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    $dataUser =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM smartphone WHERE id_smartphone =$id"));
    unlink('img/products/' . $dataUser['gambar']);
    $delete = "DELETE FROM smartphone WHERE id_smartphone =$id";
    mysqli_query($conn, $delete);
    return mysqli_affected_rows($conn);
}
