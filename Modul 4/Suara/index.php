<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suara</title>
</head>
<body>
    <h3>Pemilhan Umum</h3>
    <form method="post">
        <table>
            <tr>
                <td>ID Pemilih</td>
                <td>:</td>
                <td><input type="number" name="id_pemilih"></td>
            </tr>
            <tr>
                <td>Calon</td>
                <td>:</td>
                <td><select name="pilihan">
                    <option value="1">1. Faldhi</option>
                    <option value="2">2. Ababil</option>
                    <option value="3">3. Dimas</option>
                    <option value="4">4. Asdar</option>
                    <option value="5">5. Iyas</option>
                </select></td>
            </tr>
            <tr>
                <td><button name="masukan" type="submit">Masukan Suara</button></td>
            </tr>
        </table>
        <form>
            <?php
            require "koneksi.php";
            if (isset($_POST["masukan"])) {
                $pilihan = $_POST["pilihan"];
                $id_pemilih = $_POST["id_pemilih"];
                $sql = mysqli_query($koneksi, "SELECT * FROM suara WHERE id_pemilih='$id_pemilih'");
                $hasil = mysqli_num_rows($sql);
                echo $hasil;
                if ($hasil <= 0) {
                    $data = mysqli_query($koneksi, "INSERT INTO suara (id_suara, id_pemilih, pilihan, waktu) VALUES ('', '$id_pemilih', '$pilihan', CURRENT_TIME())");
                    if ($data) {
            ?>
                        <script language="javascript">
                            alert("Data Berhasil Ditambah");
                        </script>
                    <?php
                    }
                } else if ($hasil >= 0) {
                    ?>
                    <script language="javascript">
                        alert("Maaf ID sudah digunakan ");
                    </script>
            <?php
                }
            }
            ?>
            <?php
            $pemilu = $koneksi->query("SELECT calon.nama_calon as nama, count(*) as jumlah from suara inner join calon on suara.pilihan = calon.id_calon GROUP by pilihan");
            ?>
            <br><table border="1">
                <tr>
                    <td>No.</td>
                    <td>Nama Calon</td>
                    <td>Jumlah Suara</td>
                </tr>
                <?php
                $no = 0; 
                while ($row = $pemilu->fetch_array()) {
                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                    </tr>
                <?php } ?>
            </table>
</body>
</html>