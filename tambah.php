<?php
include "koneksi.php";

if(isset($_POST['simpan'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nim, nama, jurusan, alamat) VALUES ('$nim', '$nama', '$jurusan', '$alamat')";
    mysqli_query($koneksi, $sql);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        .card h2 { text-align: center; }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background: #0056b3; }
        a { display: block; text-align: center; margin-top: 15px; text-decoration: none; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Tambah Data Mahasiswa</h2>
        <form method="POST">
            <label>NIM</label>
            <input type="text" name="nim" required>

            <label>Nama Mahasiswa</label>
            <input type="text" name="nama" required>

            <label>Jurusan</label>
            <input type="text" name="jurusan" required>

            <label>Alamat</label>
            <textarea name="alamat" required></textarea>

            <button type="submit" name="simpan">Simpan Data</button>
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>