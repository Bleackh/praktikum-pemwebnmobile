<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Modul 2</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" id="username" placeholder="Masukkan Username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="pass" name="password" id="password" placeholder="Masukkan Password"></td>
            </tr>
            <tr>
                <td><button name="btnSubmit" type="submit">Submit</button></td>
            </tr>
        </table>
    <?php
	    if($_SERVER["REQUEST_METHOD"]=="POST"){
            $username = $_REQUEST["username"];
            $usernameErr = strlen($_REQUEST["username"]);
            $password = $_REQUEST["password"];
            $passwordErr = strlen($_REQUEST["password"]);
            $masuk = true;
            if ($usernameErr > 7){
                echo "Username Tidak Diperkenankan Lebih dari 7 Karakter<br>";
                $masuk = false;
            }if ($usernameErr == 0){
                echo "Username Tidak Boleh Kosong<br>";
                $masuk = false;
            }if ($passwordErr == 0){
                echo "Password Tidak Boleh Kosong<br>";
                $masuk = false;
            }if (!preg_match("/[A-Z]/", $password) ) {
                echo "Password Harus Memakai Huruf Kapital<br>";
                $masuk = false;
            }if (!preg_match("/[a-z]/", $password)) {
                echo "Password Harus Memakai Huruf Kecil<br>";
                $masuk = false;
            }if (!preg_match("/[^a-zA-Z\d]/", $password)) {
                echo "Password Harus Memakai Karakter Khusus<br>";
                $masuk = false;
            }if (!preg_match("/[0-9]/", $password)) {
                echo "Password Harus Memakai Angka<br>";
                $masuk = false;
            }if($passwordErr < 10){
                echo "Password Tidak Boleh Kurang dari 10 Karater<br>";
                $masuk = false;
            }if($masuk == false ){
                echo "Anda Tidak Berhasil Login";
            }if($masuk == true ){
                echo "Anda Telah Berhasil Login";
            }
        }
    ?>
    </form>
</body>
</html>