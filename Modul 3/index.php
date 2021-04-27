<?php
$connect = mysqli_connect("localhost", "root", "", "db_pegawai");
if (!$connect) {
    die("Gagal Terhubung" . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Modul 3</title>
</head>
<body>
    <h1>Data Pegawai</h1>
        <table border="1">
            <tr>
                <td>ID Pegawai</td>
                <td>Nama Pegawai</td>
                <td>Usia</td>
                <td>Alamat</td>
                <td colspan="2" align="center">Aksi</td>
            </tr>
    <?php
    ini_set("display_errors", 0);
    if ($_POST['btn'] == 'Input') {
        $id_pegawai = $_POST['id_pegawai'];
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];
        $alamat = $_POST['alamat'];
        $sql = "INSERT INTO data_pegawai (id_pegawai, nama, usia, alamat) VALUES ('$id_pegawai','$nama','$usia','$alamat')";  
        mysqli_query($connect, $sql);
    }
    if ($_POST['btn'] == 'Update') {
        $sql = "UPDATE data_pegawai SET nama = '$_POST[nama]', usia = '$_POST[usia]', alamat = '$_POST[alamat]' WHERE id_pegawai = '$_POST[id_pegawai]'";
        mysqli_query($connect, $sql);
    }
    if ($_GET['btn'] == 'Delete') {
        $sql = "DELETE FROM data_pegawai WHERE id_pegawai = '$_GET[id_pegawai]' ";
        mysqli_query($connect, $sql);
    }
    $sql = "SELECT * from data_pegawai";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            "<tr>
                <td>".$row["id_pegawai"]."</td>
                <td>".$row["nama"]."</td>
                <td>".$row["usia"]."</td>
                <td>".$row["alamat"]."</td>
                <td><a href=\"update_data.php?id_pegawai=".$row["id_pegawai"]."&btn=Update\">
							Update</a></td>
                <td><a href=\"index.php?id_pegawai=".$row['id_pegawai']."&btn=Delete\">
                            Delete</a> </td>
            </tr>";
            }
    }
    ?>
    </table>
    <br><a href="input_data.php">Input Data</a>
</body>
</html>