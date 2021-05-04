<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survei</title>
</head>
<body>
<body>
  <a href="chart.php">Tampilkan Grafik Jumlah Pengujung</a><br>
  <table border="1"><br>

    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jenis</th>
            <th>Perlu</th>
            <th>Waktu</th>
        </tr>
    </thead>

    <tbody>
        <?php
            require 'koneksi.php';
            $no = 0;
            $view = $koneksi->query("SELECT * FROM pengunjung");
            while ($row = $view->fetch_array()) {
         ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jk']; ?></td>
                <td><?php echo $row['jenis']; ?></td>
                <td><?php echo $row['perlu']; ?></td>
                <td><?php echo $row['tgl']; ?></td>
            </tr>

        <?php } ?>

    </tbody>
  </table>
</body>
</body>
</html>


