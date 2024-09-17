<?php
require_once __DIR__ . '/model/Karyawan.php';

use model\Karyawan;

$karyawan = new Karyawan();
$result = $karyawan->getKaryawan();
$maxPage = 25;
$totalData = count($result);
$totalPage = ceil($totalData / $maxPage);
$activePage = isset($_GET["page"]) ? $_GET["page"] : 1;
$first_page = ($maxPage * $activePage) - $maxPage;
$result = $karyawan->pageKaryawan($first_page, $maxPage);
?>

<?php require_once __DIR__ . "/template/header.php"; ?>

<body>
    <main class="container">
        <div class="wrapper">
            <button><a href="tambah.php">Tambah Karyawan</a></button>
            <table class="table-contain" border="1">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td>NIK</td>
                        <td>NAMA</td>
                        <td>ALAMAT</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($result as $k) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $k["nik"] ?></td>
                            <td><?= $k["nama"] ?></td>
                            <td><?= $k["alamat"] ?></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                    <?php if (isset($_GET["page"]) && $_GET["page"] == $i) : ?>
                        <a href="?page=<?= $i ?>" class="active"><?= $i ?></a>
                    <?php else : ?>
                        <a href="?page=<?= $i ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </main>

    <?php require_once __DIR__ . "/template/footer.php"; ?>