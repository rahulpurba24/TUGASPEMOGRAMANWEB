<?php
include 'koneksi.php';

$judul = '';
$isiberita = '';
$penulis = '';

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = '';
}

if ($op == 'delete') {
    $idberita = $_GET['id'];
    $qdel = "DELETE FROM tblberita WHERE idBerita = '$idberita'";
    $result = mysqli_query($connection, $qdel);
    if ($result) {
        echo 'Data berhasil dihapus';
    } else {
        echo 'Data gagal dihapus: ' . mysqli_error($connection);
    }
    header("Location: FormBerita.php");
    exit;
}

if ($op == 'edit') {
    $idberita = $_GET['id'];
    $sqlup = "SELECT * FROM tblberita WHERE idBerita = '$idberita'";
    $qup = mysqli_query($connection, $sqlup);
    if ($qup) {
        $r1 = mysqli_fetch_array($qup);
        $judul = $r1['judulBerita'];
        $isiberita = $r1['isiberita'];
        $penulis = $r1['penulis'];
    } else {
        echo 'Data gagal diambil: ' . mysqli_error($connection);
    }
}

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $kategori = intval($_POST['kategori']);
    $penulis = $_POST['penulis'];
    $isiberita = $_POST['content'];
    $tgldipublish = date('Y-m-d H:i:s');

    if ($op == 'edit') {
        $sql = "UPDATE tblberita SET judulBerita = '$judul', idKategori = '$kategori', penulis = '$penulis', isiberita = '$isiberita', tgldipublish = '$tgldipublish' WHERE idBerita = '$idberita'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo 'Data Berita Berhasil diupdate';
        } else {
            echo 'Data Berita Gagal diupdate: ' . mysqli_error($connection);
        }
        header("Location: FormBerita.php");
        exit;
    } else {
        $sql = "INSERT INTO tblberita(idKategori, judulBerita, isiberita, penulis, tgldipublish) VALUES('$kategori', '$judul', '$isiberita', '$penulis', '$tgldipublish')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo 'Data Berita Berhasil dimasukkan';
        } else {
            echo 'Data Berita Gagal dimasukkan: ' . mysqli_error($connection);
        }
        header("Location: FormBerita.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan12</title>
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <h2>Form Berita</h2>
    <form action="" method="post" autocomplete="off">
        <table width="100%" border="0" cellspacing="8" cellpadding="0">
            <tr>
                <td width="18%"><label for="judul">Judul</label></td>
                <td width="2%">:</td>
                <td width="80%"><input type="text" name="judul" size="30" value="<?= $judul ?>"></td>
            </tr>
            <tr>
                <td width="18%"><label for="Kategori">Kategori</label></td>
                <td width="2%">:</td>
                <td>
                    <select name="kategori">
                        <option value="">- Pilih Kategori -</option>
                        <?php
                        require_once "koneksi.php";

                        $sql = "SELECT idKategori, nama_kategori FROM tblkategori";
                        $result = mysqli_query($connection, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['idKategori'] . "'>" . $row['nama_kategori'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No categories available</option>";
                        }
                        ?>
                    </select>
                    <button><a href="FormKategori.php" style="text-decoration: none; color:black;">Tambah Kategori Baru</a></button>
                </td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td>:</td>
                <td><input type="text" name="penulis" size="30" value="<?= $penulis ?>"></td>
            </tr>
            <tr>
                <td>Content</td>
                <td>:</td>
                <td><textarea name="content" rows="8" cols="45"><?= $isiberita ?></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" name="submit" value="Add" class="tombol">
                    <button type="reset"><a href="FormBerita.php">reset</a></button>
                </td>
            </tr>
        </table>
    </form>
    <h2>Data Berita</h2>
    <table width="100%" border="1" cellpadding="4" style="text-align: center;">
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Isi Berita</th>
            <th>Tanggal Publish</th>
            <th>Action</th>
        </tr>
        <?php
        // Query untuk menampilkan data berita
        $sql = "SELECT tblberita.*, tblKategori.nama_kategori FROM tblberita INNER JOIN tblKategori ON tblberita.idKategori = tblKategori.idKategori";
        $result = mysqli_query($connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $idberita = $row['idBerita'];
                $judul = $row['judulBerita'];
                $namakategori = $row['nama_kategori'];
                $penulis = $row['penulis'];
                $isiberita = $row['isiberita'];
                $tgldipublish = $row['tgldipublish'];
        ?>
                <tr>
                    <td><?= $judul ?></td>
                    <td><?= $namakategori ?></td>
                    <td><?= $penulis ?></td>
                    <td><?= $isiberita ?></td>
                    <td><?= $tgldipublish ?></td>
                    <td>
                        <button><a href="FormBerita.php?op=edit&id=<?= $idberita ?>">Edit</a></button>
                        <button style="margin-left: 10px;"><a href="FormBerita.php?op=delete&id=<?= $idberita ?>" onclick="return confirm('Apakah anda mau menghapus data ini?')">Delete</a></button>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='6'>No news available</td></tr>";
        }
        ?>
    </table>
</body>

</html>
