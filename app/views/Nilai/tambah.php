<?php
require_once '../../model/Karyawan.php';

use app\model\Karyawan;

$karyawan = new Karyawan();

if(isset($_POST["submit"])){
    $result = $karyawan->post($_POST);
    if($result > 0){
        header('Location: '.BASEURL);
        exit;
    }
}
?>
<?php require_once "../template/header.php"; ?>
<main class="container contain">
    <a href="<?=BASEURL?>" class="back">Back To Home</a>
    <div class="wrapper form-wrap">
        <h2>Tambah Nilai</h2>
        <form action="" method="POST">
            <div class="wrap">
                <label for="nama"></label>
                <input type="text" inputmode="numeric" id="nama" name="nama" required>
            </div>
            <div class="wrap">
                <label for="nik">Nik</label>
                <input type="text" inputmode="numeric" id="nik" name="nik" inputmode="numeric" minlength="16" maxlength="16" required>
            </div>
            <div class="wrap">
                <label for="alamat">Alamat</label>
                <input type="text" inputmode="numeric" id="nik" name="nik" inputmode="numeric" minlength="16" maxlength="16" required>
            </div>
            <button type="submit" name="submit" class="add-btn">Tambah</button>
        </form>
    </div>
</main>
<?php require_once "../template/footer.php"; ?>