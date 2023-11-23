<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Pengaduan Masyarakat</title>
    <link rel="shortcut icon" href="https://cepatpilih.com/image/logo.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

</head>

<body style="background: url(img/bg1.png); background-size: cover;">

    <div class="container">
        <div class="card" style="padding: 50px; width: 45%; margin: 0 auto; margin-top: 2%; 
    -webkit-box-shadow: 25px -24px 0px -15px rgba(0,0,0,0), 0px 0px 14px 4px rgba(0,0,0,0.08); 
box-shadow: 25px -24px 0px -15px rgba(0,0,0,0), 0px 0px 14px 4px rgba(0,0,0,0.08);
border-radius: 8px">

            <h2 style="text-align: center; border-bottom: 5px solid #ef69bf; padding-bottom: 7px; margin-left: 70px;
margin-right: 80px; font-weight: bold; color:#ef69bf; margin-top: -10px" class="text">Register</h2>

            <h6 style="text-align: center; margin-top:42px; letter-spacing: 1px;
font-size: 14px" class="text">Selamat Datang di Pelayanan Mayarakat <br />
                mohon untuk mengisi data dibawah </h6>
            <form method="POST">
                <div style="margin-top:42px" class="input_field">
                    <label for="nik">NIK</label>
                    <input id="nik" type="text" name="nik" required>
                </div>
                <div class="input_field">
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" name="nama" required>
                </div>
                <div class="input_field">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" required>
                </div>
                <div class="input_field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>
                <div class="input_field">
                    <label for="telp">No.Telp</label>
                    <input id="telp" type="text" name="telp" required>
                </div>
                <input style="margin-top: 20px; width: 100%; background: linear-gradient(135deg, #ef69bf, #fab2ea);
		        font-weight: bold;" type="submit" name="simpan" value="Daftar" class="btn">
            </form>
        </div>


        <?php
        include './conn/koneksi.php';

        if (@$_POST['simpan']) {

            $nik = @$_POST['nik'];
            $nama = @$_POST['nama'];
            $telp = @$_POST['telp'];
            $username = @$_POST['username'];
            $passwordold = @$_POST['password'];

            $password = md5($passwordold);

            mysqli_query($koneksi, "INSERT INTO masyarakat(nik,nama,username,password,telp) VALUES ('$nik','$nama','$username', '$password','$telp')");

        ?>

            <script type="text/javascript">
                alert("SIMPAN berhasil");
                window.location.href = "index.php"
            </script>

        <?php  }
        ?>

    </div>
</body>

</html>