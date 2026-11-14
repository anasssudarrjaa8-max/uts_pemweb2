
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include "koneksi.php";
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial;
            margin: 30px;
            background: #f5f5f5;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #eeeeee;
        }

        .tambah {
            display: inline-block;
            padding: 10px 15px;
            background: #198754;
            color: white;
            text-decoration: none;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<h2>Data Mahasiswa</h2>

<a href="tambah.php" class="tambah">+ Tambah Mahasiswa</a>

<table>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Alamat</th>
    </tr>

    <?php
    $no = 1;

    while ($data = mysqli_fetch_assoc($query)) {
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($data['nim']); ?></td>
        <td><?= htmlspecialchars($data['nama']); ?></td>
        <td><?= htmlspecialchars($data['jurusan']); ?></td>
        <td><?= htmlspecialchars($data['alamat']); ?></td>
    </tr>

    <?php } ?>

</table>

</body>
</html>
