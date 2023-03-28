<?php

include "connect.php";

if (isset($_POST['guncelle'])) {
    try {
        $sql = "UPDATE `ogrenci` 
    SET `ograd` = ?, 
        `ogrsoyad` = ?, 
        `dtarih` = ?, 
        `sinif` = ? WHERE `ogrenci`.`ogrno` = ?";
        $dizi = [
            $_POST['ad'],
            $_POST['sad'],
            $_POST['dtarih'],
            $_POST['sinif'],
            $_POST['ogrno']
        ];
        $sorgu = $baglan->prepare($sql);
        $sorgu->execute($dizi);

        header("Location:index.php");
    } catch (PDOException $e) {
        echo 'Bağlantı kurulamadı: ' . $e->getMessage();
    }

}

$sql = "SELECT * FROM ogrenci WHERE ogrno = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET['ogrno']
]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berat Oztruk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Berat Oztruk</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="index.php" class="btn btn-outline-primary">Tüm Öğrenciler</a>
                        <a href="add.php" class="btn btn-outline-primary">Öğrenci Ekle</a>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <main>
        <div class="container">
            <form action="" method="post" class="row mt-4 g-3">
                <input type="hidden" name="ogrno" value="<?= $satir['ogrno'] ?>">
                <div class="col-6">
                    <label for="ad" class="form-label">Adınız</label>
                    <input type="text" class="form-control" name="ad" value="<?= $satir['ograd'] ?>">
                </div>
                <div class="col-6">
                    <label for="sad" class="form-label">Soyadınız</label>
                    <input type="text" class="form-control" name="sad" value="<?= $satir['ogrsoyad'] ?>">
                </div>
                <div class="col-6">
                    <label for="sinif" class="form-label">Sınıf</label>
                    <input type="text" class="form-control" name="sinif" value="<?= $satir['sinif'] ?>">
                </div>
                <div class="col-6">
                    <label for="dtarih" class="form-label">Doğum Tarihi</label>
                    <input type="date" class="form-control" name="dtarih" value="<?= $satir['dtarih'] ?>">
                </div>
                <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>