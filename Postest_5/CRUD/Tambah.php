<?php
    session_start();
    require 'Koneksi.php';

    if(isset($_POST['tambah'])){
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $banyak_abk = $_POST['banyak_abk'];
        $tahun = $_POST['tahun'];

        $sql = "INSERT INTO data_kapal VALUES ('','$nama', '$jenis', '$banyak_abk', '$tahun')";

        $result = mysqli_query($conn, $sql);

        if($result){
            echo
                "<script>
                    alert('Data Berhasil Di Tambahkan . . .');
                    document.location.href = 'CRUD.php';
                </script>";
        }else{
            echo"
                <script>
                    alert('Data Gagal Di Tambahkan . . .');
                    document.location.href = 'Tambah.php';
                </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBP</title>
    <link rel="stylesheet" type="text/CSS" href="Data.css">
    <link rel="stylesheet" type="text/CSS" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <!-- Bagian Header -->
    <div class="Medsos">
        <ul>
            <li><a href="https://www.instagram.com/d.pram71/"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="https://github.com/Pramox71"><i class="fa-brands fa-github"></i></i></a></li>
            <li><a href="https://www.linkedin.com/in/dhimas-pramudya-tridharma-120a51249/"><i class="fa-brands fa-linkedin"></i></a></li>
        </ul>
        <label>
            <input type="checkbox" class="checkbox" id="tombol">
            <span class="check"></span>
        </label>
    </div> 
    <header>
        <div class="container">
            <h1><a href="index.php">PBp</a><br>
                <p class="Mini-text">PELABUHAN BALIKPAPAN</p>
            </h1>
            <ul>
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../about.php">ABOUT</a></li>
                <li><a href="../service.php">SERVICE</a></li>
                <li><?php
                if (isset($_SESSION['username'])) {
                    echo("<a href='Login/Logout.php'>LOGOUT</a>");
                    
                } else {
                    echo("<a href='Login/Login.php'>LOGIN</a>");}
                    ?></li>
                <li class="active">
                <?php
                if ($_SESSION['priv'] == 'admin') {
                    echo("<a href='../CRUD/CRUD.PHP'>DATA</a>");
                }else if($_SESSION['priv'] == 'member'){
                    echo("<a href='#'>USER</a>");
                }
                    ?>
                </li>
            </ul>
        </div>
    </header>
    <!--Label WEB-->
    <section class="label">
        <div class="container">
            <p>Home / Data kapal</p>
        </div>
    </section>
    <div class="kotak_tambah">
        <p class="tulisan_tambah">Tambah Data</p>
    
        <form action="" method="POST">
            <label>Nama Kapal</label>
            <input type="text" name="nama" class="form_tambah" placeholder="Masukkan Nama Kapal">
    
            <label>Jenis Kapal</label>
            <input type="text" name="jenis" class="form_tambah" placeholder="Jenis Kapal">

            <label>Jumlah ABK</label>
            <input type="number" name="banyak_abk" class="form_tambah" placeholder="Banyak ABK">

            <label>Tahun Masuk</label>
            <input type="number" name="tahun" class="form_tambah" placeholder="Tahun">
    
            <center><button><input type="submit" class="tombol_tambah" name="tambah"></button></center>

            <br/>
            <center>
                <a class="link" href="../CRUD/CRUD.PHP">KEMBALI</a>
            </center>
        </form>
        
    </div>
    <footer>
        <div class="container">
            <small>@Copyright 2022 - Pramox71 - Made with HTML - CSS</small>
        </div>
    </footer>
    <script src="main.js"></script>
    <script>
        var tombol = document.getElementById("tombol");
        tombol.onclick = function(){
            document.body.classList.toggle("black-mode");
        }
    </script>
</body>
</html>