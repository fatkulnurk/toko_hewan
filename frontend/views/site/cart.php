<?php
use yii\helpers\Html;

$this->title = 'Cart';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .gbr{
        max-width: 80%;
        max-height: 80%;
    }
</style>
<div class="container" name="isi"id="isi">
    <?php
    foreach($data as $row) {
        ?>
        <div class="row">
            <div class="col-md-4 text-center">
                <a href="detail?id=<?= $row['id'] ?>">
                    <?php echo Html::img('@web/../../backend/web/uploads/'.$row['gambar'], ['class' => 'gbr']); ?>
                </a>
            </div>
            <div class="col-md-8">
                <h3><b><?= $row['nama'] ?></b></h3>
                <b><h4>Rp <?= $row['harga'] ?> | Spesies <?= $row['spesies'] ?> | Berat <?= $row['berat'] ?></h4></b>
                <p><?php
                    $deskripsi = substr($row['deskripsi'],0,210);
                    echo $deskripsi; ?></p>
            </div>
        </div>
        <hr>
    <?php } ?>
</div>

<div class="item-index">
    <?= Html::a('Check Out', ['checkout']) ?>
</div>