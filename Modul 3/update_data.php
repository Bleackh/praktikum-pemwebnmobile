<?php
$connect = mysqli_connect("localhost", "root", "", "db_pegawai");
if (!$connect) {
    die("Gagal Terhubung" . mysqli_connect_error());
}
$sql = "SELECT * FROM data_pegawai WHERE id_pegawai= '$_GET[id_pegawai]'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>

<h3>Update Data Pegawai</h3>
<form method="post" action="index.php">
    <table>
        <tr>
            <td>ID Pegawai</td>
            <td>:</td>
            <td><input type="text" name="id_pegawai" value="<?php echo $row["id_pegawai"]; ?>"></td>
        </tr>
        <tr>
            <td>Nama Pegawai</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $row["nama"]; ?>"></td>
        </tr>
        <tr>
            <td>Usia</td>
            <td>:</td>
            <td><input type="text" name="usia" value="<?php echo $row["usia"]; ?>"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" value="<?php echo $row["alamat"]; ?>"></td>
        </tr>
    </table>
    <br><input type="submit" name="btn" value="Update">
    <br><button onclick="index.php">Kembali</button>
</form>
<p>Keterangan :<br>
Primary Key : ID Pegawai</p>