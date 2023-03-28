<?php

if (isset($_POST["kaydet"])) {
    try {
        include "connect.php";
        $sql = "INSERT INTO `ogrenci` (`ogrno`, `ograd`, `ogrsoyad`, `cinsiyet`, `dtarih`, `sinif`, `puan`) VALUES (NULL, ?, ?, ?, ?, ?, '0');";
        $dizi = [
            $_POST["ad"],
            $_POST["sad"],
            $_POST["cins"],
            $_POST["dtarih"],
            $_POST["sinif"]
        ];

        $sth = $baglan->prepare($sql);
        $sonuc = $sth->execute($dizi);
        header("Location:index.php");
    } catch (PDOException $e) {
        echo 'Bağlantı kurulamadı: ' . $e->getMessage();
    }

}

?>
<!DOCTYPE html>
<html lang="tr">

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
                <div class="col-6">
                    <label for="ad" class="form-label">Adınız</label>
                    <input type="text" class="form-control" name="ad">
                </div>
                <div class="col-6">
                    <label for="sad" class="form-label">Soyadınız</label>
                    <input type="text" class="form-control" name="sad">
                </div>
                <div class="col-6">
                    <label for="sinif" class="form-label">Sınıf</label>
                    <input type="text" class="form-control" name="sinif">
                </div>
                <div class="col-6">
                    <label for="dtarih" class="form-label">Doğum Tarihi</label>
                    <input type="date" class="form-control" name="dtarih">
                </div>
                <div class="col">
                    <label for="" class="form-label">Kız
                        <input type="radio" name="cins" value="K">
                    </label>
                    <label for="" class="form-label">Erkek
                        <input type="radio" name="cins" value="E">
                    </label>
                </div>
                <button type="submit" name="kaydet" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>