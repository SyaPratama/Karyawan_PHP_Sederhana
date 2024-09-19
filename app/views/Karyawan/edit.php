<?php
require_once '../../model/Karyawan.php';

use app\model\Karyawan;

if (isset($_GET["id"])) {

    $karyawan = new Karyawan();

    $matchKaryawan = $karyawan->get();

    $findId = array_filter($matchKaryawan, fn($data) => hash('sha256', $data["id"]) == $_GET["id"]);

    if (count($findId) === 0) {
        header("Location: " . BASEURL, true);
        exit;
    }
} else {
    header('Location: ' . BASEURL, true);
    exit;
}
?>
<?php require_once "../template/header.php"; ?>
<main class="containe contain">
    <a href="<?= BASEURL ?>" class="back">Back To Home</a>
    <div class="wrapper form-wrap">
        <h2>Edit Karyawan</h2>
        <?php foreach ($findId as $detail) : ?>
            <form action="edit-logic.php" method="POST" id="form-edit">
                <input type="hidden" name="id" value="<?= $detail["id"] ?>">
                <div class="wrap">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?= $detail["nama"] ?>" required>
                </div>
                <div class="wrap">
                    <label for="nik">Nik</label>
                    <input type="text" id="nik" name="nik" inputmode="numeric" minlength="16" maxlength="16" value="<?= $detail["nik"] ?>" required>
                </div>
                <div class="wrap">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" required><?= $detail["alamat"] ?></textarea>
                </div>
                <button type="submit" class="add-btn">Edit</button>
            </form>
        <?php endforeach; ?>
    </div>
</main>
<?php require_once "../template/footer.php"; ?>