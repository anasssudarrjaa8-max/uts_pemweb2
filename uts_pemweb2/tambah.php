
<?php
require_once "config.php";

$pesan = "";

if (isset($_POST['simpan'])) {

    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $jurusan = trim($_POST['jurusan'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');

    if ($nim === '' || $nama === '' || $jurusan === '' || $alamat === '') {
        $pesan = "Semua data harus diisi!";
    } else {

        $sql = "INSERT INTO mahasiswa (nim, nama, jurusan, alamat)
                VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($koneksi, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param(
                $stmt,
                "ssss",
                $nim,
                $nama,
                $jurusan,
                $alamat
            );

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                header("Location: index.php");
                exit;
            } else {
                $pesan = "Gagal menyimpan data: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            $pesan = "Query gagal disiapkan: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 15px;
            box-sizing: border-box;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
            max-width: 100%;
            box-sizing: border-box;
        }

        .card h2 {
            text-align: center;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
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

        button:hover {
            background: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
        }

        .pesan {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="card">

    <h2>Tambah Data Mahasiswa</h2>

    <?php if ($pesan !== '') { ?>
        <p class="pesan">
            <?= htmlspecialchars($pesan); ?>
        </p>
    <?php } ?>

    <form method="POST">

        <label>NIM</label>
        <input type="text" name="nim" required
               value="<?= htmlspecialchars($_POST['nim'] ?? ''); ?>">

        <label>Nama Mahasiswa</label>
        <input type="text" name="nama" required
               value="<?= htmlspecialchars($_POST['nama'] ?? ''); ?>">

        <label>Jurusan</label>
        <input type="text" name="jurusan" required
               value="<?= htmlspecialchars($_POST['jurusan'] ?? ''); ?>">

        <label>Alamat</label>
        <textarea name="alamat" required><?= htmlspecialchars($_POST['alamat'] ?? ''); ?></textarea>

        <button type="submit" name="simpan">Simpan Data</button>

    </form>

    <a href="index.php">Kembali</a>

</div>

</body>
</html>
