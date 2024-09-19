<?php
session_start();

require_once "../template/header.php"; 
?>


<?php if(isset($_SESSION["alert"])) : ?>
    <div class="alert">
        <?= $_SESSION["alert"] ?>
    </div>
    <?php unset($_SESSION["alert"]) ?>
<?php endif; ?>

<main class="container contain">
    <a href="<?=BASEURL?>" class="back">Back To Home</a>
    <div class="wrapper form-wrap">
        <h2>Tambah Karyawan</h2>
        <form action="add-logic.php" id="form-add" method="POST">
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
            <button type="submit" class="add-btn">Tambah</button>
        </form>
    </div>
</main>
<?php require_once "../template/footer.php"; ?>