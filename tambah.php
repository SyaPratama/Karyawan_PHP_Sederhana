<?php
require_once __DIR__ . '/model/Karyawan.php';

use model\Karyawan;

$karyawan = new Karyawan();

if(isset($_POST["submit"])){
    $result = $karyawan->addKaryawan($_POST);
    if($result > 0){
        header('Location: '.BASEURL);
        exit;
    }
}
?>
<?php require_once __DIR__ . "/template/header.php"; ?>
<main class="container">
    <a href="<?=BASEURL?>" class="back">Back To Home</a>
    <div class="wrapper form-wrap">
        <h2>Tambah Karyawan</h2>
        <form action="" method="POST">
            <div class="wrap">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="wrap">
                <label for="nik">Nik</label>
                <input type="text" id="nik" name="nik" inputmode="numeric" minlength="16" maxlength="16" required>
            </div>
            <div class="wrap">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" required></textarea >
            </div>
            <button type="submit" name="submit" class="add-btn">Tambah</button>
        </form>
    </div>
</main>
<?php require_once __DIR__ . "/template/footer.php"; ?>