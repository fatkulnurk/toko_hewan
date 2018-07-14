<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Katalog Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--
<html>
<head>

    <meta charset="utf-8">
    <style type="text/css">
        .judulutama{
            color: white;
            /*font-style: bold;*/
            font-size: 100pt;
            margin-top: 400px;
        }
        .judul{
            color: white;
            font-style: bold;
        }
        @font-face {
            font-family: fontku;
            src: url(gyparody-hv.ttf);
        }
        .fontpar {
            font-family: fontku;
        }
        @font-face {
            font-family: fontkub;
            src: url(AdventPro-Thin.ttf);
        }
        @font-face {
            font-family: fontkuc;
            src: url(AlfaSlabOne-Regular.ttf);
        }
        .fontparb {
            font-family: fontkub;
        }
        .fontparc {
            font-family: Roboto;
        }
        .fontpard {
            font-family: fontkuc;
        }
        .jumbotron{
            background-repeat: no-repeat;
            background-size: cover;
            color: #1E90FF;
            /*padding: 60px 50px;*/
            font-family:fontkub;
            min-height: 650px;
        }
        .bgjumbo{
            background-image: url(gambar/bahan1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .putih{
            color: white;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 5px;
            margin: 0px;
        }
        .cardbarang{
            height:300px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        img {
            border-radius: 5px 5px 0 0;

        }
        .gbr{
            height: 130px;
        }

        .container {
            padding: 2px 4px;
        }
        .gambar{
            width: 300px;
            height: 300px;
        }
        .kaki {
            /*position: fixed;*/
            left: 0;
            bottom: -10;
            width: 100%;
            background-color: black;
            color: white;
            text-align: center;
            font-family: fontkub;
        }
        .logo{
            width: 20px;
            height: 20px;
        }
    </style>
    <link rel="stylesheet" href="awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Produk</title>
</head>
<body>
-->
<style>
    .gbr{
        max-width: 200px;
        max-height: 200px;
    }
    .card{
        border: solid 2px silver;
    }
</style>
<div class="container" name="isi"id="isi">

    <?php
    foreach($data as $row) {
        ?>
        <div class="row">
            <div class="col-md-3 text-center">
                <a href="detail?id=<?= $row['id'] ?>">
                    <?php echo Html::img('@web/../../backend/web/uploads/'.$row['gambar'], ['class' => 'gbr']); ?>
                </a>
            </div>
            <div class="col-md-6">
                <h3><b><?= $row['nama'] ?></b></h3>
                <b><h4>Rp <?= $row['harga'] ?> | Spesies <?= $row['spesies'] ?> | Berat <?= $row['berat'] ?></h4></b>
                <p><?php
                    $deskripsi = substr($row['deskripsi'],0,210);
                    echo $deskripsi; ?></p>
            </div>
            <div class="col-md-3">
                <br/>
                <br/>
                <?= Html::a('Belanja', ['add-to-cart', 'id' => $row->id], ['class' => 'btn btn-info btn-lg text-lg']) ?>
            </div>
        </div>
        <hr>
    <?php } ?>
<!--
    <div class="row" style="padding-top:20px">
        <?php
        foreach($data as $row) {
            ?>
            <div class="col-md-3 card cardbarang btn">
                <a href="detail?id=<?= $row['id'] ?>">
                    <?php echo Html::img('@web/../../backend/web/uploads/'.$row['gambar'], ['class' => 'gbr']); ?>
                </a>
                <h4><b><?= $row['nama'] ?></b></h4>
                <b><p>Rp <?= $row['harga'] ?></p></b>
                <?= Html::a('Beli', ['add-to-cart', 'id' => $row->id], ['class' => 'btn btn-success']) ?>
            </div>
        <?php } ?>
    </div>
    -->
</div>
</body>
</html>